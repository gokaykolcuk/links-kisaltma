<?php

namespace App\Listeners;

use App\Events\UserLoggedIn;
use App\Models\AdminLog;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class LogUserLogin
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(UserLoggedIn $event): void
    {
        AdminLog::create([
            'user_id' => $event->user->id,
            'name' => $event->user->name,
            'action' => 'login',
            'ip_address' => request()->ip(),
            'access_time' => now(),
        ]);
    }
}
