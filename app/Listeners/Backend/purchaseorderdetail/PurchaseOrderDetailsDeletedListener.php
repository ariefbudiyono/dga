<?php

namespace App\Listeners\Backend\purchaseorderdetail;

use App\Events\Backend\purchaseorderdetail\PurchaseOrderDetailsDeleted;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class PurchaseOrderDetailsDeletedListener
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
     * @param  PurchaseOrderDetailsDeleted  $event
     * @return void
     */
    public function handle(PurchaseOrderDetailsDeleted $event)
    {
        //
    }
}
