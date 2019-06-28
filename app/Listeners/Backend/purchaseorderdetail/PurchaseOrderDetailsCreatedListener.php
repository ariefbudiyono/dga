<?php

namespace App\Listeners\Backend\purchaseorderdetail;

use App\Events\Backend\purchaseorderdetail\PurchaseOrderDetailsCreated;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class PurchaseOrderDetailsCreatedListener
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
     * @param  PurchaseOrderDetailsCreated  $event
     * @return void
     */
    public function handle(PurchaseOrderDetailsCreated $event)
    {
        //
    }
}
