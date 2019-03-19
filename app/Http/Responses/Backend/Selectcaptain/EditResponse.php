<?php

namespace App\Http\Responses\Backend\Selectcaptain;

use Illuminate\Contracts\Support\Responsable;

class EditResponse implements Responsable
{
    /**
     * @var App\Models\Selectcaptain\Selectcaptain
     */
    protected $selectcaptains;

    /**
     * @param App\Models\Selectcaptain\Selectcaptain $selectcaptains
     */
    public function __construct($selectcaptains)
    {
        $this->selectcaptains = $selectcaptains;
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
            'selectcaptains' => $this->selectcaptains
        ]);
    }
}