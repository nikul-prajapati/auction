<?php

namespace App\Http\Controllers\Frontend\Teams;

use App\Http\Controllers\Controller;
<<<<<<< HEAD
=======
use Illuminate\Support\Facades\DB;

>>>>>>> 55c23f9494778265069a19130fc7d08b35dca405

/**
 * Class AccountController.
 */
class TeamsController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
<<<<<<< HEAD
        return view('frontend.teams.teams_name');
=======

    	$teams = DB::table('teams')->select('Team_name')->get();
        return view('frontend.teams.teams_name')->with('teams',$teams);
>>>>>>> 55c23f9494778265069a19130fc7d08b35dca405
    }
}
