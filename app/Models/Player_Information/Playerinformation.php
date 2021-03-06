<?php

namespace App\Models\Player_Information;

use App\Models\ModelTrait;
use Illuminate\Database\Eloquent\Model;
use App\Models\Player_Information\Traits\PlayerinformationAttribute;
use App\Models\Player_Information\Traits\PlayerinformationRelationship;

class Playerinformation extends Model
{
    use ModelTrait,
        PlayerinformationAttribute,
    	PlayerinformationRelationship {
            // PlayerinformationAttribute::getEditButtonAttribute insteadof ModelTrait;
        }

    /**
     * NOTE : If you want to implement Soft Deletes in this model,
     * then follow the steps here : https://laravel.com/docs/5.4/eloquent#soft-deleting
     */

    /**
     * The database table used by the model.
     * @var string
     */
    protected $table = 'player_information';

    /**
     * Mass Assignable fields of model
     * @var array
     */
    protected $fillable = [
        'played_match','total_runs','total_wickets','speciality','batsman_type','bowler_type','age','Is_captain','users_id','created_at','updated_at'
    ];

    /**
     * Default values for model fields
     * @var array
     */
    protected $attributes = [

    ];

    /**
     * Dates
     * @var array
     */
    protected $dates = [
        'created_at',
        'updated_at'
    ];

    /**
     * Guarded fields of model
     * @var array
     */
    protected $guarded = [
        'id'
    ];

    /**
     * Constructor of Model
     * @param array $attributes
     */
    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
    }
}
