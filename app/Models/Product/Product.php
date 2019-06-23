<?php

namespace App\Models\Product;

use App\Models\ModelTrait;
use App\Models\BaseModel;
use App\Models\Product\Traits\ProductAttribute;
use App\Models\Product\Traits\ProductRelationship;

class Product extends BaseModel
{
    use ModelTrait,
        ProductAttribute,
    	ProductRelationship {
            // ProductAttribute::getEditButtonAttribute insteadof ModelTrait;
        }

    /**
     * NOTE : If you want to implement Soft Deletes in this model,
     * then follow the steps here : https://laravel.com/docs/5.4/eloquent#soft-deleting
     */

    /**
     * The database table used by the model.
     * @var string
     */
    protected $table = 'products';

    /**
     * Mass Assignable fields of model
     * @var array
     */
    protected $fillable = [
            'name',            
            'created_by', 
            'updated_by'
    ];

    

    /**
     * Constructor of Model
     * @param array $attributes
     */
    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        $this->table = config('module.products.table');
    }
}
