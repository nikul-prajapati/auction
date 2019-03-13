<?php

namespace App\Http\Responses\Backend\Player_Record;

use Illuminate\Contracts\Support\Responsable;

class EditResponse implements Responsable
{
    /**
     * @var App\Models\Player_Record\Playerrecord
     */
    protected $playerrecords;

    /**
     * @param App\Models\Player_Record\Playerrecord $playerrecords
     */
    public function __construct($playerrecords)
    {
        $this->playerrecords = $playerrecords;
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
        return view('backend.playerrecords.edit')->with([
            'playerrecords' => $this->playerrecords
        ]);
    }
}