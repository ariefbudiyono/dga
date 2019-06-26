<?php

namespace App\Models\CustomerOrder\Traits;

/**
 * Class CustomerorderAttribute.
 */
trait CustomerOrderAttribute
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
                '.$this->getEditButtonAttribute("edit-customerorder", "admin.customerorders.edit").'
                '.$this->getDeleteButtonAttribute("delete-customerorder", "admin.customerorders.destroy").'
                </div>';
    }
}
