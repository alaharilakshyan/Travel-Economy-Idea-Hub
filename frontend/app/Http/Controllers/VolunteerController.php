<?php

namespace App\Http\Controllers;

use App\Models\VolunteerActivity;
use App\Models\VolunteerApplication;
use Illuminate\Http\Request;

class VolunteerController extends Controller
{
    public function index()
    {
        $activities = VolunteerActivity::where('status', 'active')->latest()->paginate(9);
        return view('volunteer.index', compact('activities'));
    }

    public function show(VolunteerActivity $activity)
    {
        $activity->load('applications.user');
        $hasApplied = VolunteerApplication::where('activity_id', $activity->id)
            ->where('user_id', auth()->id())
            ->exists();
        
        return view('volunteer.show', compact('activity', 'hasApplied'));
    }

    public function apply(VolunteerActivity $activity)
    {
        $existing = VolunteerApplication::where('activity_id', $activity->id)
            ->where('user_id', auth()->id())
            ->first();

        if ($existing) {
            return redirect()->route('volunteer.my-applications')->with('error', 'You have already applied for this activity.');
        }

        return view('volunteer.apply', compact('activity'));
    }

    public function applyStore(Request $request, VolunteerActivity $activity)
    {
        $existing = VolunteerApplication::where('activity_id', $activity->id)
            ->where('user_id', auth()->id())
            ->first();

        if ($existing) {
            return redirect()->route('volunteer.my-applications')->with('error', 'You have already applied for this activity.');
        }

        $validated = $request->validate([
            'message' => 'nullable|string|max:500',
        ]);

        VolunteerApplication::create([
            'activity_id' => $activity->id,
            'user_id' => auth()->id(),
            'message' => $validated['message'] ?? null,
            'status' => 'pending',
        ]);

        return redirect()->route('volunteer.my-applications')->with('success', 'Application submitted successfully!');
    }

    public function myApplications()
    {
        $applications = VolunteerApplication::where('user_id', auth()->id())
            ->with('activity')
            ->latest()
            ->paginate(10);
        
        return view('volunteer.my-applications', compact('applications'));
    }
}
