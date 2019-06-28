<?php

namespace App\Listeners\Backend\purchaseorder;

use App\Events\Backend\purchaseorder\PurchaseOrdersEdited;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class PurchaseOrdersEditedListener
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
     * @param  PurchaseOrdersEdited  $event
     * @return void
     */
    public function handle(PurchaseOrdersEdited $event)
    {
        //
    }
}
