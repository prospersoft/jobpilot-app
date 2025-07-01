<?php

namespace App\Policies;

use App\Models\Resume;
use App\Models\User;

class ResumePolicy
{
    /**
     * Determine if the given resume can be viewed by the user.
     */
    public function view(User $user, Resume $resume)
    {
        return $resume->user_id === $user->id;
    }

    /**
     * Determine if the given resume can be updated by the user.
     */
    public function update(User $user, Resume $resume)
    {
        return $resume->user_id === $user->id;
    }

    /**
     * Determine if the given resume can be deleted by the user.
     */
    public function delete(User $user, Resume $resume)
    {
        return $resume->user_id === $user->id;
    }
}
