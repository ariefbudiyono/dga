<?php

namespace App\Models\purchaseorderdetail\Traits;

/**
 * Class PurchaseorderdetailAttribute.
 */
trait PurchaseorderdetailAttribute
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
                '.$this->getEditButtonAttribute("edit-purchaseorderdetail", "admin.purchaseorderdetails.edit").'
                '.$this->getDeleteButtonAttribute("delete-purchaseorderdetail", "admin.purchaseorderdetails.destroy").'
                </div>';
    }
}
