<?php

namespace App\Models\supplier;

use App\Models\ModelTrait;
use App\Models\BaseModel;
use App\Models\supplier\Traits\SupplierAttribute;
use App\Models\supplier\Traits\SupplierRelationship;

class Supplier extends BaseModel
{
    use ModelTrait,
        SupplierAttribute,
    	SupplierRelationship {
            // SupplierAttribute::getEditButtonAttribute insteadof ModelTrait;
        }

    /**
     * NOTE : If you want to implement Soft Deletes in this model,
     * then follow the steps here : https://laravel.com/docs/5.4/eloquent#soft-deleting
     */

    /**
     * The database table used by the model.
     * @var string
     */
    protected $table = 'suppliers';

    /**
     * Mass Assignable fields of model
     * @var array
     */
    protected $fillable = [
        'name',
        'alamat'
    ];

    

    

    /**
     * Constructor of Model
     * @param array $attributes
     */
    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        $this->table = config('module.suppliers.table');
    }
}
