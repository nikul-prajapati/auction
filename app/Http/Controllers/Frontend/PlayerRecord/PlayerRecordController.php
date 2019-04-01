<?php

namespace App\Http\Controllers\Frontend\PlayerRecord;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

/**
 * Class AccountController.
 */
class PlayerRecordController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
    	


         $users_id = Auth::user()->id;
            $data['data'] = DB::table('users')
                ->join('player_information', 'users.id', '=', 'player_information.users_id')
               
                ->select('users.id','player_information.*')
                ->where('users.id',$users_id) // else it will get all rows
                ->get();
            if(count ($data)>0){
                return view('frontend.PlayerRecord.Player_record',$data)->with($users_id);
            }
            else
            {
                return view('frontend.index');
            }

    }
}
