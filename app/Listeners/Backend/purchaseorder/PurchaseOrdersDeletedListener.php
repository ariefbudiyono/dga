<?php

namespace App\Listeners\Backend\purchaseorder;

use App\Events\Backend\purchaseorder\PurchaseOrdersDeleted;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class PurchaseOrdersDeletedListener
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
     * @param  PurchaseOrdersDeleted  $event
     * @return void
     */
    public function handle(PurchaseOrdersDeleted $event)
    {
        //
    }
}
