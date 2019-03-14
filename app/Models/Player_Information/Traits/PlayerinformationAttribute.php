<?php

namespace App\Models\Player_Information\Traits;

/**
 * Class PlayerinformationAttribute.
 */
trait PlayerinformationAttribute
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
                '.$this->getEditButtonAttribute("edit-playerinformation", "admin.playerinformations.edit").'
                '.$this->getDeleteButtonAttribute("delete-playerinformation", "admin.playerinformations.destroy").'
                </div>';
    }
}
