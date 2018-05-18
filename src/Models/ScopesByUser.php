<?php

namespace App\Concerns\Models;

use App\Users\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Builder;

trait ScopesByUser
{
    /**
     * Scope by a user model/ID.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @param \App\Users\User|int $userId
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeForUser(Builder $query, $userId)
    {
        return $query->where(
            'user_id',
            '=',
            $userId instanceof User ? $userId->id : $userId
        );
    }

    /**
     * Scope by the current user model/ID.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @param \App\Users\User|int $userId
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeForCurrentUser(Builder $query)
    {
        return $this->scopeForUser($query, Auth::user());
    }
}
