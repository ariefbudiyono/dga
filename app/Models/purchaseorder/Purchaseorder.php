<?php

namespace App\Models\purchaseorder;

use App\Models\ModelTrait;
use App\Models\BaseModel;
use App\Models\purchaseorder\Traits\PurchaseorderAttribute;
use App\Models\purchaseorder\Traits\PurchaseorderRelationship;

class Purchaseorder extends BaseModel
{
    use ModelTrait,
        PurchaseorderAttribute,
    	PurchaseorderRelationship {
            // PurchaseorderAttribute::getEditButtonAttribute insteadof ModelTrait;
        }

    /**
     * NOTE : If you want to implement Soft Deletes in this model,
     * then follow the steps here : https://laravel.com/docs/5.4/eloquent#soft-deleting
     */

    /**
     * The database table used by the model.
     * @var string
     */
    protected $table = 'purchase_orders';

    /**
     * Mass Assignable fields of model
     * @var array
     */
    protected $fillable = [
        'supplier_id',
        'po_code',
        'tgl',
        'payment_term',
        'delivery_term',
        'etd',
        'partial_first_delivery'

    ];

    /**
     * Constructor of Model
     * @param array $attributes
     */
    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        $this->table = config('module.purchaseorders.table');
    }
}
