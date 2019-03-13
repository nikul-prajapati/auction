<?php

namespace App\Models\Playerrecords_User\Traits;

/**
 * Class PlayerrecordsuserAttribute.
 */
trait PlayerrecordsuserAttribute
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
                '.$this->getEditButtonAttribute("edit-playerrecordsuser", "admin.playerrecordsusers.edit").'
                '.$this->getDeleteButtonAttribute("delete-playerrecordsuser", "admin.playerrecordsusers.destroy").'
                </div>';
    }
}
