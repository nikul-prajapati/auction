<?php

namespace App\Models\Player_Record\Traits;

/**
 * Class PlayerrecordAttribute.
 */
trait PlayerrecordAttribute
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
                '.$this->getEditButtonAttribute("edit-playerrecord", "admin.playerrecords.edit").'
                '.$this->getDeleteButtonAttribute("delete-playerrecord", "admin.playerrecords.destroy").'
                </div>';
    }
}
