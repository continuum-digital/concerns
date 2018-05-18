<?php

namespace App\Concerns\Models;

use DavidIanBonner\Enumerated\Enum;
use Illuminate\Database\Eloquent\Builder;

trait HasAStatus
{
    /**
     * Scope the status column.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @param \DavidIanBonner\Enumerated\Enum|int   $status
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeStatus(Builder $query, $status): Builder
    {
        if ($status instanceof Enum) {
            $status = $status->value();
        }

        return $query->where('status', $status);
    }
}
