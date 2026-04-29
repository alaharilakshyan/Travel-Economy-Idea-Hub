<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function index()
    {
        $events = \App\Models\Event::with('spot')->latest()->paginate(9);
        return view('events.index', compact('events'));
    }

    public function show(\App\Models\Event $event)
    {
        $event->load('spot');
        return view('events.show', compact('event'));
    }
}
