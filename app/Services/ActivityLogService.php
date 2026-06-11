<?php

namespace App\Services;

use App\Models\ActivityLog;

class ActivityLogService
{
    public static function log(string $action): void
    {
        ActivityLog::create([
            'user_id' => auth()->id(),
            'action' => $action,
            'ip_address' => request()->ip(),
        ]);
    }
}