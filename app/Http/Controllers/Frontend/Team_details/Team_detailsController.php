<?php

namespace App\Http\Controllers\Frontend\Team_details;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

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
    	

         // $data['data'] = DB::table('users')
         //        ->join('player_information', 'users.id', '=', 'player_information.users_id')
               
         //        ->select('users.id','player_information.*')
         //        ->where('users.id',$users_id) // else it will get all rows
         //        ->get();
           
        // $data['data'] = "select `users`.`first_name`, `teams`.`Team_name` from `bid` left join `users` on `users`.`id` = `bid`.`user_id` left join `teams` on `teams`.`id` = `bid`.`user_id`";
           //->leftJoin('users', 'users.id', '=', 'player_information.users_id')
            $data['data'] = DB::table('bid')
                ->leftjoin('users', 'users.id', '=', 'bid.users_id')
                ->leftjoin('teams', 'teams.id', '=', 'bid.teams_id')
                ->select('users.first_name','teams.Team_name')
               
                ->get();





            if(count ($data)>0){
                return view('frontend.Team_details.Teamdetails',$data);
            }
            else
            {
                return view('pdf/publicationpdf');
            }

    }
}
