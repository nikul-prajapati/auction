<?php

namespace App\Http\Responses\Backend\Selectcaptain;

use Illuminate\Contracts\Support\Responsable;
//use Illuminate\Http\Response;

class EditResponse implements Responsable
{
    /**
     * @var App\Models\Selectcaptain\Selectcaptain
     */
    protected $selectcaptains;
    protected $data;

    /**
     * @param App\Models\Selectcaptain\Selectcaptain $selectcaptains
     */
    public function __construct($selectcaptains,$user,$team)
    {
        $this->selectcaptains = $selectcaptains;
        $this->user= $user;
        $this->team= $team;
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
        return view('backend.selectcaptains.edit')->with([
            'selectcaptains' => $this->selectcaptains,
            'team'=>$this->team,
            'user'=>$this->user
        ]);
    }
}