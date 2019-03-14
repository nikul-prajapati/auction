<?php

namespace App\Http\Responses\Backend\Player_Information;

use Illuminate\Contracts\Support\Responsable;

class EditResponse implements Responsable
{
    /**
     * @var App\Models\Player_Information\Playerinformation
     */
    protected $playerinformations;

    /**
     * @param App\Models\Player_Information\Playerinformation $playerinformations
     */
    public function __construct($playerinformations)
    {
        $this->playerinformations = $playerinformations;
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
        return view('backend.playerinformations.edit')->with([
            'playerinformations' => $this->playerinformations
        ]);
    }
}