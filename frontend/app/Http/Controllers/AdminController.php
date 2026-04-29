<?php

namespace App\Http\Controllers;

use App\Models\Idea;
use App\Models\IdeaComment;
use App\Models\IdeaVote;
use App\Models\User;
use App\Models\VolunteerActivity;
use App\Models\VolunteerApplication;
use App\Models\Notification;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'admin']);
    }

    public function index()
    {
        $stats = [
            'total_users' => User::count(),
            'total_ideas' => Idea::count(),
            'pending_ideas' => Idea::where('status', 'pending')->count(),
            'total_volunteer_activities' => VolunteerActivity::count(),
            'total_volunteer_applications' => VolunteerApplication::count(),
            'pending_applications' => VolunteerApplication::where('status', 'pending')->count(),
        ];

        return view('admin.dashboard', compact('stats'));
    }

    public function ideas()
    {
        $ideas = Idea::with('user')
            ->orderByRaw("FIELD(status, 'pending', 'approved', 'rejected')")
            ->latest()
            ->paginate(10);
        return view('admin.ideas', compact('ideas'));
    }

    public function ideaShow(Idea $idea)
    {
        return view('admin.idea-show', compact('idea'));
    }

    public function ideaUpdateStatus(Request $request, Idea $idea)
    {
        $request->validate(['status' => 'required|in:pending,approved,rejected']);
        
        $idea->update(['status' => $request->status]);
        
        // Notify user
        Notification::create([
            'user_id' => $idea->user_id,
            'title' => 'Idea Status Updated',
            'message' => "Your idea '{$idea->title}' has been {$request->status}.",
        ]);

        return back()->with('success', "Idea status updated to {$request->status}");
    }

    public function volunteerActivities()
    {
        $activities = VolunteerActivity::with('creator')->latest()->paginate(10);
        return view('admin.volunteer-activities', compact('activities'));
    }

    public function volunteerActivityShow(VolunteerActivity $activity)
    {
        $activity->load('applications.user');
        return view('admin.volunteer-activity-show', compact('activity'));
    }

    public function volunteerActivityCreate()
    {
        return view('admin.volunteer-activity-create');
    }

    public function volunteerActivityStore(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'location' => 'required|string|max:255',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'max_volunteers' => 'required|integer|min:1',
        ]);

        $validated['created_by'] = auth()->id();
        $validated['status'] = 'active';

        VolunteerActivity::create($validated);

        return redirect()->route('admin.volunteer.activities')->with('success', 'Volunteer activity created successfully.');
    }

    public function volunteerActivityEdit(VolunteerActivity $activity)
    {
        return view('admin.volunteer-activity-edit', compact('activity'));
    }

    public function volunteerActivityUpdate(Request $request, VolunteerActivity $activity)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'location' => 'required|string|max:255',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'max_volunteers' => 'required|integer|min:1',
            'status' => 'required|in:active,completed,cancelled',
        ]);

        $activity->update($validated);

        return redirect()->route('admin.volunteer.activities')->with('success', 'Volunteer activity updated successfully.');
    }

    public function volunteerActivityDestroy(VolunteerActivity $activity)
    {
        $activity->delete();
        return redirect()->route('admin.volunteer.activities')->with('success', 'Volunteer activity deleted successfully.');
    }

    public function volunteerApplications()
    {
        $applications = VolunteerApplication::with(['user', 'activity'])->latest()->paginate(10);
        return view('admin.volunteer-applications', compact('applications'));
    }

    public function approveApplication(VolunteerApplication $application)
    {
        $application->update(['status' => 'approved']);
        
        Notification::create([
            'user_id' => $application->user_id,
            'title' => 'Application Approved',
            'message' => "Your application for '{$application->activity->title}' has been approved!",
        ]);

        return back()->with('success', 'Application approved successfully.');
    }

    public function rejectApplication(VolunteerApplication $application)
    {
        $application->update(['status' => 'rejected']);
        
        Notification::create([
            'user_id' => $application->user_id,
            'title' => 'Application Rejected',
            'message' => "Your application for '{$application->activity->title}' has been rejected.",
        ]);

        return back()->with('success', 'Application rejected successfully.');
    }

    public function reports()
    {
        // User stats
        $totalUsers = User::count();
        $usersThisMonth = User::whereMonth('created_at', Carbon::now()->month)->count();
        
        // Idea stats
        $totalIdeas = Idea::count();
        $ideasThisMonth = Idea::whereMonth('created_at', Carbon::now()->month)->count();
        
        // Engagement stats
        $totalVotes = IdeaVote::count();
        $totalComments = IdeaComment::count();
        
        // Volunteer stats
        $totalActivities = VolunteerActivity::count();
        $totalApplications = VolunteerApplication::count();
        
        // Recent activity
        $recentIdeas = Idea::with('user')->latest()->take(5)->get();
        $recentApplications = VolunteerApplication::with(['user', 'activity'])->latest()->take(5)->get();

        return view('admin.reports', compact(
            'totalUsers', 'usersThisMonth',
            'totalIdeas', 'ideasThisMonth',
            'totalVotes', 'totalComments',
            'totalActivities', 'totalApplications',
            'recentIdeas', 'recentApplications'
        ));
    }
}
