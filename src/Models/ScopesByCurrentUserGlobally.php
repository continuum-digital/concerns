<?php

namespace App\Concerns\Models;

use App\Scopes\CurrentUserScope;

trait ScopesByCurrentUserGlobally
{
    /** @var string */
    protected static $currentUserIdKey = 'user_id';

    /**
     * Boot the scope.
     *
     * @return void
     */
    public static function bootScopesByCurrentUserGlobally()
    {
        static::addGlobalScope(
            app()->make(CurrentUserScope::class)->setKey(static::$currentUserIdKey)
        );
    }
}
