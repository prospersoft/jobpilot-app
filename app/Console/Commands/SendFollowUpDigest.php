<?php
namespace App\Console\Commands;

use App\Models\User;
use App\Notifications\DailyFollowUpDigest;
use Illuminate\Console\Command;

class SendFollowUpDigest extends Command
{
    protected $signature = 'followups:digest';
    protected $description = 'Send daily follow-up digest to users';

    public function handle()
    {
        User::whereHas('followUps', function ($query) {
            $query->where('follow_up_date', today())
                  ->where('completed', false)
                  ->whereNull('reminder_sent_at');
        })->each(function ($user) {
            $followUps = $user->followUps()
                ->with('application')
                ->where('follow_up_date', today())
                ->where('completed', false)
                ->whereNull('reminder_sent_at')
                ->get();

            if ($followUps->isNotEmpty()) {
                $user->notify(new DailyFollowUpDigest($followUps));
                
                // Mark reminders as sent
                $followUps->each(function ($followUp) {
                    $followUp->update(['reminder_sent_at' => now()]);
                });
            }
        });

        $this->info('Daily follow-up digest sent successfully.');
    }

    protected function schedule(Schedule $schedule)
{
    // ...existing schedules...
    
    // Send daily follow-up digest at 9 AM
    $schedule->command('followups:digest')->dailyAt('09:00');
}
}