<?php

namespace App\Concerns;

use App\Users\User;
use Illuminate\Support\Facades\Auth;

trait InteractsWithUser
{
    /**
     * Return the current user.
     *
     * @return \App\Users\User
     */
    public function user() : User
    {
        return Auth::user();
    }
}
