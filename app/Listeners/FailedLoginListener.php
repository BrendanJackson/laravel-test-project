<?php

namespace App\Listeners;

use Illuminate\Auth\Events\Failed;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class FailedLoginListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle(Failed $event)
    {
        $event->user->user_actions()->create([
            'title' => 'Failed Login',
            'description' => 'Login attempt from IP '.$_SERVER['REMOTE_ADDR'],
            'severity' => 'warning'
        ]);
    }
}
