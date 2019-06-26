<?php

namespace App\Models\CustomerOrderDetail\Traits;

/**
 * Class CustomerorderdetailAttribute.
 */
trait CustomerOrderDetailAttribute
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
                '.$this->getEditButtonAttribute("edit-customerorderdetail", "admin.customerorderdetails.edit").'
                '.$this->getDeleteButtonAttribute("delete-customerorderdetail", "admin.customerorderdetails.destroy").'
                </div>';
    }
}
