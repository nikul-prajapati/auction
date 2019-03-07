<?php

namespace App\Http\Responses\Backend\Player;

use Illuminate\Contracts\Support\Responsable;

class EditResponse implements Responsable
{
    /**
     * @var App\Models\Player\Player
     */
    protected $players;

    /**
     * @param App\Models\Player\Player $players
     */
    public function __construct($players)
    {
        $this->players = $players;
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
        return view('backend.players.edit')->with([
            'players' => $this->players
        ]);
    }
}