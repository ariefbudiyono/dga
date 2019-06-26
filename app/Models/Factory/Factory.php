<?php

namespace App\Models\Factory;

use App\Models\ModelTrait;
use Illuminate\Database\Eloquent\Model;
use App\Models\BaseModel;
use App\Models\Factory\Traits\FactoryAttribute;
use App\Models\Factory\Traits\FactoryRelationship;

class Factory extends BaseModel
{
    use ModelTrait,
        FactoryAttribute,
    	FactoryRelationship {
            // FactoryAttribute::getEditButtonAttribute insteadof ModelTrait;
        }

    /**
     * NOTE : If you want to implement Soft Deletes in this model,
     * then follow the steps here : https://laravel.com/docs/5.4/eloquent#soft-deleting
     */

    /**
     * The database table used by the model.
     * @var string
     */
    protected $table = 'factories';

    /**
     * Mass Assignable fields of model
     * @var array
     */
    protected $fillable = [
            'name',   
    ];

    

    /**
     * Constructor of Model
     * @param array $attributes
     */
    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        $this->table = config('module.factories.table');
    }
}
