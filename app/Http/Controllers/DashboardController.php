<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Application;
use App\Models\Interview;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function __invoke()
    {
        $user = auth()->user();
        $userId = $user->id;
        
        // Get application statistics
        $totalApplications = Application::where('user_id', $userId)->count();
        $weeklyApplications = Application::where('user_id', $userId)
            ->whereBetween('created_at', [now()->startOfWeek(), now()->endOfWeek()])
            ->count();
        $weeklyIncrease = $this->calculateWeeklyIncrease($user);

        // Get application pipeline stats
        $applied = $user->applications()->where('status', 'applied')->count();
        $screening = $user->applications()->where('status', 'screening')->count();
        $interviewing = $user->applications()->where('status', 'interviewing')->count();
        $offers = $user->applications()->where('status', 'offer')->count();
        $rejected = $user->applications()->where('status', 'rejected')->count();
        $withdrawn = $user->applications()->where('status', 'withdrawn')->count();
        $notAccepting = Application::where('status', 'not_accepting')->where('user_id', auth()->id())->count();

        
        // Calculate response rate
        $totalResponses = $screening + $interviewing + $offers + $rejected;
        $responseRate = $totalApplications > 0 ? round(($totalResponses / $totalApplications) * 100) : 0;
        
        // // Get active interviews
        // $activeInterviews = $user->applications()
        //     ->where('status', 'interviewing')
        //     ->count();
            
        // Get weekly data for chart
        $weeklyData = [];
        $weeklyLabels = [];
        
        for ($i = 7; $i >= 0; $i--) {
            $date = now()->subWeeks($i);
            $weeklyLabels[] = $date->format('M j');
            $weeklyData[] = $user->applications()
                ->whereBetween('created_at', [
                    $date->startOfWeek(),
                    $date->endOfWeek()
                ])->count();
        }
        
        // Get recent applications
        $recentApplications = $user->applications()
            ->latest()
            ->take(5)
            ->get();

        // Weekly goals (you can make these configurable later)
        $weeklyGoal = 10;
        $followupGoal = 5;
        
        // Get weekly followups
        $weeklyFollowups = $user->followUps()
            ->whereBetween('follow_up_date', [now()->startOfWeek(), now()->endOfWeek()])
            ->count();

        $activeInterviews = Interview::where('user_id', $userId)
        ->where('scheduled_at', '>=', Carbon::today())
        ->count();

        $upcomingInterviews = Interview::where('user_id', $userId)
        ->whereBetween('scheduled_at', [
            Carbon::now()->startOfDay(),
            Carbon::now()->addDays(7)->endOfDay()
        ])->count();

        $upcomingInterviewsList = Interview::where('user_id', $userId)
            ->where('scheduled_at', '>=', Carbon::now())
            ->orderBy('scheduled_at')
            ->take(5)
            ->get();

        // Get the most applied job titles (roles), grouped and counted
        $mostAppliedRoles = \App\Models\Application::select('job_title')
        ->where('user_id', $userId)
        ->groupBy('job_title')
        ->selectRaw('job_title, COUNT(*) as total')
        ->orderByDesc('total')
        ->having('total', '>', 1) // Only show roles with more than 1 application
        ->limit(5)
        ->get();

         return view('dashboard', compact(
            'totalApplications',
            'weeklyApplications',
            'weeklyIncrease',
            'applied',
            'screening',
            'interviewing',
            'offers',
            'rejected',
            'withdrawn',
            'notAccepting',
            'totalResponses',
            'responseRate',
            'activeInterviews',
            'upcomingInterviews',
            'weeklyData',
            'weeklyLabels',
            'recentApplications',
            'weeklyGoal',
            'followupGoal',
            'weeklyFollowups',
            'upcomingInterviewsList',
            'mostAppliedRoles',
        ));
    }

    private function calculateWeeklyIncrease($user)
    {
        $thisWeek = $user->applications()
            ->whereBetween('created_at', [now()->startOfWeek(), now()->endOfWeek()])
            ->count();
            
        $lastWeek = $user->applications()
            ->whereBetween('created_at', [
                now()->subWeek()->startOfWeek(),
                now()->subWeek()->endOfWeek()
            ])
            ->count();

        if ($lastWeek === 0) return 0;
        return round((($thisWeek - $lastWeek) / $lastWeek) * 100);
    }

    

        

    
    
}