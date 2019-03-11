<?php

namespace App\Repositories\Frontend\Access\User;

use App\Events\Frontend\Auth\UserConfirmed;
use App\Exceptions\GeneralException;
use App\Models\Access\User\SocialLogin;
use App\Models\Access\User\User;
use App\Notifications\Frontend\Auth\UserChangedPassword;
use App\Notifications\Frontend\Auth\UserNeedsConfirmation;
use App\Repositories\Backend\Access\Role\RoleRepository;
use App\Repositories\BaseRepository;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use app\details;

/**
 * Class UserRepository.
 */
class detailsRepository extends BaseRepository
{
    /**
     * Associated Repository Model.
     */
    const MODEL = details::class;

    /**
     * @var RoleRepository
     */
    protected $role;

    /**
     * @param RoleRepository $role
     */
    public function __construct(RoleRepository $role)
    {
        $this->role = $role;
    }

    /**
     * @param $email
     *
     * @return bool
     */
  
    public function create(array $data, $provider)
    {
        $details = self::MODEL;
        $details = new $details();
        $details->p_match = $data['p_match'];
        $details->p_run = $data['p_run'];
        $details->p_wickets = $data['p_wickets'];
        $details->type = $data['type'];
        $details->batsman = $data['batsman'];
        $details->bowler = $data['bowler'];
        $details->save();
        return redirect('register/details')->route('Frontend.auth.details');
    }