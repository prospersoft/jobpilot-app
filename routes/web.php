<?php

use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\FeaturesController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\InterviewController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Livewire\KanbanBoard;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WishlistController;
use App\Http\Controllers\TestimonialsController;
use App\Http\Controllers\PolicyController;
use App\Http\Controllers\TermsController;
use App\Http\Controllers\CookiesController;
use App\Http\Controllers\DataController;
use App\Http\Controllers\FaqsController;

// Public pages
Route::get('/', function () {
    return view('home');
})->name('home');
Route::get('/home', [HomeController::class, 'home']);
Route::get('/about', [AboutController::class, 'about'])->name('about');
Route::get('/contact', [ContactController::class, 'contact'])->name('contact');
Route::get('/features', [FeaturesController::class, 'features'])->name('features');
Route::get('/testimonials', [TestimonialsController::class, 'testimonials'])->name('testimonials');
Route::get('/policy', [PolicyController::class, 'policy'])->name('policy');
Route::get('/terms', [TermsController::class, 'terms'])->name('terms');
Route::get('/cookies', [CookiesController::class, 'cookies'])->name('cookies');
Route::get('/data', [DataController::class, 'data'])->name('data');
Route::get('/faqs', [FaqsController::class, 'faqs'])->name('faqs');

// Authenticated user routes
Route::middleware(['auth'])->group(function () {
    // Dashboard
    Route::get('/dashboard', DashboardController::class)->name('dashboard');

    // Settings (Volt)
    Route::redirect('settings', 'settings/profile');
    Volt::route('settings/profile', 'settings.profile')->name('settings.profile');
    Volt::route('settings/password', 'settings.password')->name('settings.password');
    Volt::route('settings/appearance', 'settings.appearance')->name('settings.appearance');

    // Wishlists
    Route::resource('wishlists', WishlistController::class);

    // Kanban Board
    Route::get('/applications/board', KanbanBoard::class)->name('applications.board');

    // Applications
    Route::resource('applications', ApplicationController::class);
    Route::get('/applications/documents/{document}/download', [ApplicationController::class, 'downloadDocument'])->name('applications.documents.download');
    Route::delete('/applications/documents/{document}', [ApplicationController::class, 'destroyDocument'])->name('applications.documents.destroy');
    Route::put('/applications/{application}', [ApplicationController::class, 'update'])->name('applications.update');

    // Interviews
    Route::get('/interviews', [InterviewController::class, 'index'])->name('interviews.index');
    Route::get('/interviews/calendar', [InterviewController::class, 'calendar'])->name('interviews.calendar');
    Route::get('/interviews/create', [InterviewController::class, 'create'])->name('interviews.create');
    Route::post('/interviews', [InterviewController::class, 'store'])->name('interviews.store');
    Route::get('/interviews/{interview}/edit', [InterviewController::class, 'edit'])->name('interviews.edit');
    Route::put('/interviews/{interview}', [InterviewController::class, 'update'])->name('interviews.update');
    Route::delete('/interviews/{interview}', [InterviewController::class, 'destroy'])->name('interviews.destroy');

    // Contacts
    Route::get('/contacts', [ContactController::class, 'index'])->name('contacts.index');

    // Logout
    Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');
});

// Admin-only routes
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/dashboard/users', [UserController::class, 'index'])->name('users.index');
    Route::patch('/dashboard/users/{user}/role', [UserController::class, 'updateRole'])->name('users.updateRole');
    Route::delete('/dashboard/users/{user}', [UserController::class, 'destroy'])->name('users.destroy');
});

require __DIR__.'/auth.php';
