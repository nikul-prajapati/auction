<?php

namespace App\Http\Responses\Backend\Playerrecords_User;

use Illuminate\Contracts\Support\Responsable;

class EditResponse implements Responsable
{
    /**
     * @var App\Models\Playerrecords_User\Playerrecordsuser
     */
    protected $playerrecordsusers;

    /**
     * @param App\Models\Playerrecords_User\Playerrecordsuser $playerrecordsusers
     */
    public function __construct($playerrecordsusers)
    {
        $this->playerrecordsusers = $playerrecordsusers;
    }

    /**
     * To Response
     *
     * @param \App\Http\Requests\Request $request
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function toResponse($request)
    {
        return view('backend.playerrecordsusers.edit')->with([
            'playerrecordsusers' => $this->playerrecordsusers
        ]);
    }
}