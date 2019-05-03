<?php

namespace App\Http\Controllers\Frontend\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\Frontend\User\DashboardViewRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;	

/**
 * Class DashboardController.
 */
class DashboardController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(DashboardViewRequest $request)
    {
        $users_id = Auth::user()->id;
         
            $data['data'] = DB::table('users')
                ->join('player_information', 'users.id', '=', 'player_information.users_id')
               
                ->select('users.id','player_information.*')
                ->where('users.id',$users_id) // else it will get all rows
                ->get();
        return view('frontend.user.dashboard',$data);
    }
}
