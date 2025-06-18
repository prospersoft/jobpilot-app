<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\FollowUp;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        View::composer('components.layouts.app.sidebar', function ($view) {
            $pendingFollowUps = auth()->check() ? auth()->user()->followUps()
                ->with('application')
                ->where('completed', false)
                ->whereDate('follow_up_date', '>=', now())
                ->orderBy('follow_up_date')
                ->take(5)
                ->get() : collect();

            $view->with('pendingFollowUps', $pendingFollowUps);
        });
    }
}