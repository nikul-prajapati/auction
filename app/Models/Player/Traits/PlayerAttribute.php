<?php

namespace App\Models\Player\Traits;

/**
 * Class PlayerAttribute.
 */
trait PlayerAttribute
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
                '.$this->getEditButtonAttribute("edit-player", "admin.players.edit").'
                '.$this->getDeleteButtonAttribute("delete-player", "admin.players.destroy").'
                </div>';
    }
}
