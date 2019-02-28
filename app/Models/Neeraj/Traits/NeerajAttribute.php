<?php

namespace App\Models\Neeraj\Traits;

/**
 * Class NeerajAttribute.
 */
trait NeerajAttribute
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
                '.$this->getEditButtonAttribute("edit-neeraj", "admin.neerajs.edit").'
                '.$this->getDeleteButtonAttribute("delete-neeraj", "admin.neerajs.destroy").'
                </div>';
    }
}
