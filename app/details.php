<?php

namespace App;

use Illuminate\Database\Eloquent\Model;



class details extends Model
{


   protected $fillable = [
        'p_match',
        'p_run',
        'p_wickets',
        'type',
        'batsman',
        'bowler',
    ];

    

}
