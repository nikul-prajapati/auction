<?php

namespace App\Http\Controllers\Frontend\Teams;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;


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
    	// We are selecting the team name from the team table
    	$teams = DB::table('teams')->select('Team_name')->get();
        return view('frontend.teams.teams_name')->with('teams',$teams);
    }
}
