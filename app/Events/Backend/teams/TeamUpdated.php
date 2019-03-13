<?php

namespace App\Events\Backend\teams;

use Illuminate\Queue\SerializesModels;

/**
 * Class BlogCategoryUpdated.
 */
class TeamUpdated
{
    use SerializesModels;

    /**
     * @var
     */
    public $teams;

    /**
     * @param $blogcategory
     */
    public function __construct($teams)
    {
        $this->teams = $teams;
    }
}
