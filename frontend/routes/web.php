<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\IdeaController;
use App\Http\Controllers\VolunteerController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ChatbotController;
use Illuminate\Support\Facades\Route;

// Public Routes
Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/about', function () {
    return view('about');
})->name('about');

Route::get('/contact', function () {
    return view('contact');
})->name('contact');

Route::get('/mission', function () {
    return view('mission');
})->name('mission');

// Dashboard
Route::get('/dashboard', [HomeController::class, 'dashboard'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

// Ideas Routes
Route::get('/ideas', [IdeaController::class, 'index'])->name('ideas.index');
Route::get('/ideas/{idea}', [IdeaController::class, 'show'])->name('ideas.show');

Route::middleware('auth')->group(function () {
    Route::get('/ideas/create', [IdeaController::class, 'create'])->name('ideas.create');
    Route::post('/ideas', [IdeaController::class, 'store'])->name('ideas.store');
    Route::post('/ideas/{idea}/vote', [IdeaController::class, 'vote'])->name('ideas.vote');
    Route::post('/ideas/{idea}/comments', [IdeaController::class, 'comment'])->name('ideas.comment');
    Route::get('/my-ideas', [IdeaController::class, 'myIdeas'])->name('ideas.my');
});

// Volunteer Routes
Route::get('/volunteer', [VolunteerController::class, 'index'])->name('volunteer.index');
Route::get('/volunteer/{activity}', [VolunteerController::class, 'show'])->name('volunteer.show');

Route::middleware('auth')->group(function () {
    Route::get('/volunteer/{activity}/apply', [VolunteerController::class, 'apply'])->name('volunteer.apply');
    Route::post('/volunteer/{activity}/apply', [VolunteerController::class, 'applyStore'])->name('volunteer.apply.store');
    Route::get('/my-applications', [VolunteerController::class, 'myApplications'])->name('volunteer.my-applications');
});

// Events Routes
Route::get('/events', [EventController::class, 'index'])->name('events.index');
Route::get('/events/{event}', [EventController::class, 'show'])->name('events.show');

// Chatbot Route
Route::post('/api/chat', [ChatbotController::class, 'chat'])
    ->middleware(['auth'])
    ->name('chat');

// Profile Routes
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Admin Routes
Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('dashboard');
    
    // Admin Ideas Management
    Route::get('/ideas', [AdminController::class, 'ideas'])->name('ideas');
    Route::get('/ideas/{idea}', [AdminController::class, 'ideaShow'])->name('ideas.show');
    Route::patch('/ideas/{idea}/status', [AdminController::class, 'ideaUpdateStatus'])->name('ideas.status');
    
    // Admin Volunteer Activities
    Route::get('/volunteer/activities', [AdminController::class, 'volunteerActivities'])->name('volunteer.activities');
    Route::get('/volunteer/activities/create', [AdminController::class, 'volunteerActivityCreate'])->name('volunteer.activities.create');
    Route::post('/volunteer/activities', [AdminController::class, 'volunteerActivityStore'])->name('volunteer.activities.store');
    Route::get('/volunteer/activities/{activity}', [AdminController::class, 'volunteerActivityShow'])->name('volunteer.activities.show');
    Route::get('/volunteer/activities/{activity}/edit', [AdminController::class, 'volunteerActivityEdit'])->name('volunteer.activities.edit');
    Route::patch('/volunteer/activities/{activity}', [AdminController::class, 'volunteerActivityUpdate'])->name('volunteer.activities.update');
    Route::delete('/volunteer/activities/{activity}', [AdminController::class, 'volunteerActivityDestroy'])->name('volunteer.activities.destroy');
    
    // Admin Volunteer Applications
    Route::get('/volunteer/applications', [AdminController::class, 'volunteerApplications'])->name('volunteer.applications');
    Route::post('/volunteer/applications/{application}/approve', [AdminController::class, 'approveApplication'])->name('volunteer.applications.approve');
    Route::post('/volunteer/applications/{application}/reject', [AdminController::class, 'rejectApplication'])->name('volunteer.applications.reject');
    
    // Admin Reports
    Route::get('/reports', [AdminController::class, 'reports'])->name('reports');
});

require __DIR__.'/auth.php';
