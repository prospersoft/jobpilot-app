<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Illuminate\Support\Str;

class LinkedInController extends Controller
{
    public function redirectToLinkedIn()
    {
        return Socialite::driver('linkedin')->redirect();
    }

    public function handleLinkedInCallback()
    {
        $linkedinUser = Socialite::driver('linkedin')->user();

        $user = User::firstOrCreate([
            'email' => $linkedinUser->getEmail(),
        ], [
            'name' => $linkedinUser->getName() ?? $linkedinUser->getNickname() ?? 'LinkedIn User',
            'password' => bcrypt(Str::random(24)),
        ]);

        Auth::login($user, true);

        return redirect()->route('dashboard');
    }
}
