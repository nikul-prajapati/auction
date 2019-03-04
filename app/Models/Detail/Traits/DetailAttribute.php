<?php

namespace App\Models\Detail\Traits;

/**
 * Class DetailAttribute.
 */
trait DetailAttribute
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
                '.$this->getEditButtonAttribute("edit-detail", "admin.details.edit").'
                '.$this->getDeleteButtonAttribute("delete-detail", "admin.details.destroy").'
                </div>';
    }
}
