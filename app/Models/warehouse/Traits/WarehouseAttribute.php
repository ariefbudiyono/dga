<?php

namespace App\Models\warehouse\Traits;

/**
 * Class WarehouseAttribute.
 */
trait WarehouseAttribute
{
    // Make your attributes functions here
    // Further, see the documentation : https://laravel.com/docs/5.4/eloquent-mutators#defining-an-accessor


    /**
     * Action Button Attribute to show in grid
     * @return string
     */
    public function getActionButtonsAttribute()
    {
        return '<div class="btn-group action-btn">
                '.$this->getEditButtonAttribute("edit-warehouse", "admin.warehouses.edit").'
                '.$this->getDeleteButtonAttribute("delete-warehouse", "admin.warehouses.destroy").'
                </div>';
    }
}
