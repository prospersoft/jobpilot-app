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
use App\Http\Controllers\Auth\LinkedInController;
use App\Http\Controllers\ResumeController;

// Route::get('/', [HomeController::class, 'index']);
Route::get('/home', [HomeController::class, 'home'])->name('home');
Route::get('/about', [AboutController::class, 'about'])->name('about');
Route::get('/contact', [ContactController::class, 'contact'])->name('contact');
Route::get('/features', [FeaturesController::class, 'features'])->name('features');
Route::get('/testimonials', [TestimonialsController::class, 'testimonials'])->name('testimonials');
Route::get('/policy', [PolicyController::class, 'policy'])->name('policy');
Route::get('/terms', [TermsController::class, 'terms'])->name('terms');
Route::get('/cookies', [CookiesController::class, 'cookies'])->name('cookies');
Route::get('/data', [DataController::class, 'data'])->name('data');
Route::get('/faqs', [FaqsController::class, 'faqs'])->name('faqs');

// Route::get('/register', [RegisterController::class, 'register'])->name('register');

// Route::get('/', function () {
//     return view('home');
// })->name('home');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware(['auth'])->group(function () {
    Route::redirect('settings', 'settings/profile');

    Volt::route('settings/profile', 'settings.profile')->name('settings.profile');
    Volt::route('settings/password', 'settings.password')->name('settings.password');
    Volt::route('settings/appearance', 'settings.appearance')->name('settings.appearance');
});


Route::middleware(['auth'])->group(function () {
    // Dashboard
    Route::get('/dashboard', DashboardController::class)->name('dashboard');
    
    // // Wishlists Resource Routes
    Route::resource('wishlists', WishlistController::class);


     Route::get('/wishlists', [WishlistController::class, 'index'])->name('wishlists.index');
    
    Route::get('/applications/board', KanbanBoard::class)->name('applications.board');
    
    // Applications Resource Routes
    Route::resource('applications', ApplicationController::class);
    
    // Application Documents
    Route::get('/applications/documents/{document}/download', [ApplicationController::class, 'downloadDocument'])
        ->name('applications.documents.download');
    
    Route::delete('/applications/documents/{document}', [ApplicationController::class, 'destroyDocument'])
        ->name('applications.documents.destroy');
        
    // Interviews
    Route::get('/interviews', [InterviewController::class, 'index'])->name('interviews.index');

    Route::get('/interviews/calendar', [InterviewController::class, 'calendar'])->name('interviews.calendar');

    // Contacts
    Route::get('/contacts', [ContactController::class, 'index'])->name('contacts.index');

    
});


Route::put('/applications/{application}', [ApplicationController::class, 'update'])->name('applications.update');

// interviews
Route::get('/interviews/calendar', [InterviewController::class, 'calendar'])->name('interviews.calendar');

Route::get('/interviews/create', [InterviewController::class, 'create'])->name('interviews.create');

Route::post('/interviews', [InterviewController::class, 'store'])->name('interviews.store');

Route::post('/logout',      [AuthenticatedSessionController::class, 'destroy'])
    ->name('logout')
    ->middleware('auth');


Route::middleware('guest')->group(function () {
    Route::get('/', function () {
        return view('home');
    })->name('home');
});



Route::middleware(['auth'])->group(function () {
    Route::get('/interviews/{interview}/edit', [InterviewController::class, 'edit'])->name('interviews.edit');
    Route::put('/interviews/{interview}', [InterviewController::class, 'update'])->name('interviews.update');
    Route::delete('/interviews/{interview}', [InterviewController::class, 'destroy'])->name('interviews.destroy');
    
    Route::get('/resume/create', [ResumeController::class, 'create'])->name('resume.create');
});

// Resume CRUD
Route::middleware(['auth'])->group(function () {
    Route::get('/resume/create', [ResumeController::class, 'create'])->name('resume.create');
    Route::post('/resume/store', [ResumeController::class, 'store'])->name('resume.store');
    Route::get('/resume/{resume}', [ResumeController::class, 'show'])->name('resume.show');
    Route::get('/resume/{resume}/edit', [ResumeController::class, 'edit'])->name('resume.edit');
    Route::put('/resume/{resume}', [ResumeController::class, 'update'])->name('resume.update');
    Route::delete('/resume/{resume}', [ResumeController::class, 'destroy'])->name('resume.destroy');
    Route::delete('/resume/{resume}', [ResumeController::class, 'pdf'])->name('resume.pdf');
    Route::get('/resume/{resume}/download', [ResumeController::class, 'download'])->name('resume.download');
    Route::get('/resume', [ResumeController::class, 'index'])->name('resume.index');
});

Route::post('/resume/ai-generate', [ResumeController::class, 'aiGenerate']);


Route::middleware(['auth', 'admin'])->group(function () {
    // Admin-only routes here
    Route::get('/dashboard/users', [UserController::class, 'index'])->name('users.index');
    Route::patch('/dashboard/users/{user}/role', [UserController::class, 'updateRole'])->name('users.updateRole');
    Route::delete('/dashboard/users/{user}', [UserController::class, 'destroy'])->name('users.destroy');
});

// LinkedIn OAuth
Route::get('auth/linkedin', [LinkedInController::class, 'redirectToLinkedIn'])->name('auth.linkedin');
Route::get('auth/linkedin/callback', [LinkedInController::class, 'handleLinkedInCallback']);

require __DIR__.'/auth.php';
