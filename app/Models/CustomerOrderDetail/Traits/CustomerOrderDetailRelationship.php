<?php

namespace App\Models\CustomerOrderDetail\Traits;

use App\Models\CustomerOrder\CustomerOrder;
use App\Models\Product\Product;

/**
 * Class CustomerorderdetailRelationship
 */
trait CustomerOrderDetailRelationship
{
    /*
    * put you model relationships here
    * Take below example for reference
    */
    /*
    public function users() {
        //Note that the below will only work if user is represented as user_id in your table
        //otherwise you have to provide the column name as a parameter
        //see the documentation here : https://laravel.com/docs/5.4/eloquent-relationships
        $this->belongsTo(User::class);
    }
     */

     function customerOrder()
     {
         return $this->belongsTo(CustomerOrder::class,'customer_order_id');
     }

     function product()
     {
         return $this->belongsTo(Product::class,'product_id');
     }
}
