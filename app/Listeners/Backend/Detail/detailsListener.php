<?php

namespace App\Listeners\Backend\Detail;

use App\Events\Backend\Detail\details;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class detailsListener
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
     * @param  details  $event
     * @return void
     */
    public function handle(details $event)
    {
        //
    }
}
