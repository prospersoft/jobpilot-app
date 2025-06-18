<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Interview; 

class InterviewController extends Controller
{
    public function calendar(Request $request)
    {
        $month = $request->input('month', now()->month);
        $year = $request->input('year', now()->year);

        $startOfMonth = \Carbon\Carbon::create($year, $month, 1);
        $daysInMonth = $startOfMonth->daysInMonth;
        $firstDayOfWeek = $startOfMonth->dayOfWeekIso; // 1 (Mon) - 7 (Sun)

        // Fetch only the current user's interviews for this month, grouped by day
        $interviews = \App\Models\Interview::where('user_id', auth()->id())
            ->whereMonth('scheduled_at', $month)
            ->whereYear('scheduled_at', $year)
            ->get()
            ->groupBy(function($i) { return $i->scheduled_at->day; });

        return view('interviews.calendar', compact('month', 'year', 'daysInMonth', 'firstDayOfWeek', 'interviews'));
    }

    public function create(Request $request)
    {
        // Optionally pass a pre-selected date from the calendar
        $date = $request->input('date');
        return view('interviews.create', compact('date'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'scheduled_at' => 'required|date',
            'notes' => 'nullable|string',
        ]);

        $validated['user_id'] = auth()->id();

        Interview::create($validated);

        return redirect()->route('interviews.calendar')->with('success', 'Interview scheduled!');
    }

    public function edit(Interview $interview)
    {
        return view('interviews.edit', compact('interview'));
    }

    public function update(Request $request, Interview $interview)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'scheduled_at' => 'required|date',
            'notes' => 'nullable|string',
        ]);
        $interview->update($validated);
        return redirect()->route('interviews.calendar')->with('success', 'Interview updated!');
    }

    public function destroy(Interview $interview)
    {
        $interview->delete();
        return redirect()->route('interviews.calendar')->with('success', 'Interview deleted!');
    }

}
