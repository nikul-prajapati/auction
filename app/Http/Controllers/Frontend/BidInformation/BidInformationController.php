<?php

namespace App\Http\Controllers\Frontend\BidInformation;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\Frontend\User\DashboardViewRequest;


/**
 * Class AccountController.
 */
class BidInformationController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
    	

        
            $data['data'] = DB::table('bid')
                ->leftjoin('users', 'users.id', '=', 'bid.users_id')
                ->select('users.first_name','bid.price')
                ->get();





            if(count ($data)>0){
                return view('frontend.BidInformation.Bid_Info',$data);
            }
            else
            {
                return view('frontend.user.dashboard');
               
            }

    }
}
