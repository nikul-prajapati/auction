<?php

namespace App\Http\Controllers\Frontend\PlayerRecord;

use App\Http\Controllers\Controller;

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
        return view('frontend.PlayerRecord.Player_record');
    }
}
