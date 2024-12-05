<?php

// app/Policies/MessagePolicy.php
namespace App\Policies;

use App\Models\Message;
use App\Models\User;

class MessagePolicy
{
    // Allow only admins to view or manage messages
    public function viewAny(User $user)
    {
        return $user->is_admin;
    }

    public function delete(User $user, Message $message)
    {
        return $user->is_admin;
    }
}

