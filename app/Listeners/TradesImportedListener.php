<?php

namespace App\Listeners;

use App\Events\TradesImported;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class TradesImportedListener
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
     * @param  TradesImported  $event
     * @return void
     */
    public function handle(TradesImported $event)
    {
        echo 'cool event';
    }
}
