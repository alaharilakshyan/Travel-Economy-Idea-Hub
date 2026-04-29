<?php

namespace App\Http\Controllers;

use App\Models\Idea;
use App\Models\VolunteerActivity;
use App\Models\VolunteerApplication;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $featuredIdeas = Idea::where('status', 'approved')->latest()->take(3)->get();
        $featuredActivities = VolunteerActivity::where('status', 'active')->latest()->take(3)->get();
        
        return view('welcome', compact('featuredIdeas', 'featuredActivities'));
    }

    public function dashboard()
    {
        if (auth()->user()->is_admin) {
            return redirect()->route('admin.dashboard');
        }
        
        $myIdeas = Idea::where('user_id', auth()->id())->latest()->take(5)->get();
        $myApplications = VolunteerApplication::where('user_id', auth()->id())->with('activity')->latest()->take(5)->get();
        
        return view('dashboard', compact('myIdeas', 'myApplications'));
    }
}
