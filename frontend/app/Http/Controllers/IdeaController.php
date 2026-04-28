<?php

namespace App\Http\Controllers;

use App\Models\Idea;
use App\Models\IdeaComment;
use App\Models\IdeaVote;
use Illuminate\Http\Request;

class IdeaController extends Controller
{
    public function index()
    {
        $ideas = Idea::where('status', 'approved')->with('user')->latest()->paginate(9);
        return view('ideas.index', compact('ideas'));
    }

    public function create()
    {
        return view('ideas.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'category' => 'required|string|max:100',
        ]);

        $validated['user_id'] = auth()->id();
        $validated['status'] = 'pending';

        Idea::create($validated);

        return redirect()->route('ideas.index')->with('success', 'Idea submitted successfully! It will be reviewed by an admin.');
    }

    public function show(Idea $idea)
    {
        $idea->load(['user', 'comments.user', 'votes']);
        return view('ideas.show', compact('idea'));
    }

    public function vote(Idea $idea)
    {
        $existingVote = IdeaVote::where('idea_id', $idea->id)->where('user_id', auth()->id())->first();

        if ($existingVote) {
            $existingVote->delete();
            return back()->with('success', 'Vote removed.');
        }

        IdeaVote::create([
            'idea_id' => $idea->id,
            'user_id' => auth()->id(),
        ]);

        return back()->with('success', 'Idea voted successfully!');
    }

    public function comment(Request $request, Idea $idea)
    {
        $validated = $request->validate([
            'content' => 'required|string',
        ]);

        IdeaComment::create([
            'idea_id' => $idea->id,
            'user_id' => auth()->id(),
            'content' => $validated['content'],
        ]);

        return back()->with('success', 'Comment added successfully!');
    }

    public function myIdeas()
    {
        $ideas = Idea::where('user_id', auth()->id())->latest()->paginate(10);
        return view('ideas.my-ideas', compact('ideas'));
    }
}
