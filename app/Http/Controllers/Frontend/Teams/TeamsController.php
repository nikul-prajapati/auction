<?php

namespace App\Http\Controllers\Frontend\Teams;

use App\Http\Controllers\Controller;

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
        return view('frontend.teams.teams_name');
    }
}
