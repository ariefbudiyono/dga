<?php

namespace App\Models\supplier\Traits;

/**
 * Class SupplierAttribute.
 */
trait SupplierAttribute
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
                '.$this->getEditButtonAttribute("edit-supplier", "admin.suppliers.edit").'
                '.$this->getDeleteButtonAttribute("delete-supplier", "admin.suppliers.destroy").'
                </div>';
    }
}
