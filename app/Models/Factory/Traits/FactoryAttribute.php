<?php

namespace App\Models\Factory\Traits;

/**
 * Class FactoryAttribute.
 */
trait FactoryAttribute
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
                '.$this->getEditButtonAttribute("edit-factory", "admin.factories.edit").'
                '.$this->getDeleteButtonAttribute("delete-factory", "admin.factories.destroy").'
                </div>';
    }
}
