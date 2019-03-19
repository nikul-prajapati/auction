<?php

namespace App\Http\Controllers\Frontend\Team_details;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\Frontend\User\DashboardViewRequest;


/**
 * Class AccountController.
 */
class Team_detailsController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
    	

        
            $data['data'] = DB::table('bid')
                ->leftjoin('users', 'users.id', '=', 'bid.users_id')
                ->leftjoin('teams', 'teams.id', '=', 'bid.teams_id')
                ->select('users.first_name','teams.Team_name','bid.price')
               
                ->get();





            if(count ($data)>0){
                return view('frontend.Team_details.Teamdetails',$data);
            }
            else
            {
                return view('frontend.user.dashboard');
               
            }

    }
}
