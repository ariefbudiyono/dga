<?php

namespace App\Listeners\Backend\purchaseorderdetail;

use App\Events\Backend\purchaseorderdetail\PurchaseOrderDetailsEdited;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class PurchaseOrderDetailsEditedListener
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
     * @param  PurchaseOrderDetailsEdited  $event
     * @return void
     */
    public function handle(PurchaseOrderDetailsEdited $event)
    {
        //
    }
}
