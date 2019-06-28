<?php

namespace App\Listeners\Backend\purchaseorder;

use App\Events\Backend\purchaseorder\PurchaseOrdersCreated;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class PurchaseOrdersCreatedListener
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
     * @param  PurchaseOrdersCreated  $event
     * @return void
     */
    public function handle(PurchaseOrdersCreated $event)
    {
        //
    }
}
