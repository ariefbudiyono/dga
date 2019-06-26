<?php

namespace App\Models\CustomerOrderDetail;

use App\Models\ModelTrait;
use App\Models\BaseModel;
use App\Models\CustomerOrderDetail\Traits\CustomerOrderDetailAttribute;
use App\Models\CustomerOrderDetail\Traits\CustomerOrderDetailRelationship;

class CustomerOrderDetail extends BaseModel
{
    use ModelTrait,
        CustomerOrderDetailAttribute,
    	CustomerOrderDetailRelationship {
            // CustomerorderdetailAttribute::getEditButtonAttribute insteadof ModelTrait;
        }

    /**
     * NOTE : If you want to implement Soft Deletes in this model,
     * then follow the steps here : https://laravel.com/docs/5.4/eloquent#soft-deleting
     */

    /**
     * The database table used by the model.
     * @var string
     */
    protected $table = 'customer_order_detail';

    /**
     * Mass Assignable fields of model
     * @var array
     */
    protected $fillable = [
        'customer_order_id',
        'product_id',
        'unit',
        'po_qty',
        'unit_price',
        'amount',
        'etd',
        'eta',
        'model'
    ];

    

    
    /**
     * Constructor of Model
     * @param array $attributes
     */
    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        $this->table = config('module.customerorderdetails.table');
    }
}
