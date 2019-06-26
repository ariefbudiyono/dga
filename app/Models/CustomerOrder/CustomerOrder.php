<?php

namespace App\Models\CustomerOrder;

use App\Models\ModelTrait;
use App\Models\BaseModel;
use App\Models\CustomerOrder\Traits\CustomerOrderAttribute;
use App\Models\CustomerOrder\Traits\CustomerOrderRelationship;

class CustomerOrder extends BaseModel
{
    use ModelTrait,
        CustomerOrderAttribute,
    	CustomerOrderRelationship {
            // CustomerorderAttribute::getEditButtonAttribute insteadof ModelTrait;
        }

    /**
     * NOTE : If you want to implement Soft Deletes in this model,
     * then follow the steps here : https://laravel.com/docs/5.4/eloquent#soft-deleting
     */

    /**
     * The database table used by the model.
     * @var string
     */
    protected $table = 'customer_orders';

    /**
     * Mass Assignable fields of model
     * @var array
     */
    protected $fillable = [
        'no_po',
        'factory_id',
        'tgl',
        'issue_by',
        'attention',
        'payment',
        'trade_terms',
        'trans_type',
        'npwp',
        'billing_place',
        'delivery_site',
        'incharge',
        'ass_manager',
        'manager',
        'g_manager',
        'director',
        'pres_dir',
        'rule_payment',
        ''
        
        
    ];

    

    

    /**
     * Constructor of Model
     * @param array $attributes
     */
    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        $this->table = config('module.customerorders.table');
    }
}
