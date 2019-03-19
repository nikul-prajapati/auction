<?php

namespace App\Models\Bid\Traits;

/**
 * Class BidAttribute.
 */
trait BidAttribute
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
                '.$this->getEditButtonAttribute("edit-bid", "admin.bids.edit").'
                '.$this->getDeleteButtonAttribute("delete-bid", "admin.bids.destroy").'
                </div>';
    }
}
