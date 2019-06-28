<?php

namespace App\Models\warehouse;

use App\Models\ModelTrait;

use App\Models\warehouse\Traits\WarehouseAttribute;
use App\Models\warehouse\Traits\WarehouseRelationship;
use App\Models\BaseModel;

class Warehouse extends BaseModel
{
    use ModelTrait,
        WarehouseAttribute,
    	WarehouseRelationship {
            // WarehouseAttribute::getEditButtonAttribute insteadof ModelTrait;
        }

    /**
     * NOTE : If you want to implement Soft Deletes in this model,
     * then follow the steps here : https://laravel.com/docs/5.4/eloquent#soft-deleting
     */

    /**
     * The database table used by the model.
     * @var string
     */
    protected $table = 'warehouses';

    /**
     * Mass Assignable fields of model
     * @var array
     */
    protected $fillable = [
        'name',
        'alamat'
    ];

    /**
     * Default values for model fields
     * @var array
     */
    protected $attributes = [

    ];

    /**
     * Dates
     * @var array
     */
    protected $dates = [
        'created_at',
        'updated_at'
    ];

    /**
     * Guarded fields of model
     * @var array
     */
    protected $guarded = [
        'id'
    ];

    /**
     * Constructor of Model
     * @param array $attributes
     */
    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
    }
}
