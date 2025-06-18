<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Application;
use App\Models\Interview;
use App\Models\FollowUp;
use App\Models\Document;

class UserController extends Controller
{
    // Show all users (admin only)
    public function index()
    {
        $users = User::all();
        return view('users.index', compact('users'));
    }

    // Update a user's role (admin only)
    public function updateRole(Request $request, User $user)
    {
        // Prevent admin from changing their own role
        if ($user->id === auth()->id()) {
            return back()->with('error', 'You cannot change your own role.');
        }

        $request->validate([
            'role' => 'required|in:user,admin',
        ]);

        $user->role = $request->role;
        $user->save();

        return back()->with('success', 'User role updated!');
    }

    public function destroy(User $user)
    {
        if ($user->id === auth()->id()) {
            return back()->with('error', 'You cannot delete yourself.');
        }

        // Delete related data (example: applications, interviews, etc.)
        $user->applications()->delete();
        $user->interviews()->delete();
        // Add more relations as needed

        $user->delete();

        return back()->with('success', 'User and all related data deleted.');
    }

    

}