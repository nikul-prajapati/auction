<?php

namespace App\Models\Selectcaptain;

use App\Models\ModelTrait;
use Illuminate\Database\Eloquent\Model;
use App\Models\Selectcaptain\Traits\SelectcaptainAttribute;
use App\Models\Selectcaptain\Traits\SelectcaptainRelationship;

class Selectcaptain extends Model
{
    use ModelTrait,
        SelectcaptainAttribute,
    	SelectcaptainRelationship {
            // SelectcaptainAttribute::getEditButtonAttribute insteadof ModelTrait;
        }

    /**
     * NOTE : If you want to implement Soft Deletes in this model,
     * then follow the steps here : https://laravel.com/docs/5.4/eloquent#soft-deleting
     */

    /**
     * The database table used by the model.
     * @var string
     */
    protected $table = 'selectcaptains';

    /**
     * Mass Assignable fields of model
     * @var array
     */
    protected $fillable = [
        'teams_id','users_id'
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
