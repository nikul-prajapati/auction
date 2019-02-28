<?php

namespace App\Http\Responses\Backend\Neeraj;

use Illuminate\Contracts\Support\Responsable;

class EditResponse implements Responsable
{
    /**
     * @var App\Models\Neeraj\Neeraj
     */
    protected $neerajs;

    /**
     * @param App\Models\Neeraj\Neeraj $neerajs
     */
    public function __construct($neerajs)
    {
        $this->neerajs = $neerajs;
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
        return view('backend.neerajs.edit')->with([
            'neerajs' => $this->neerajs
        ]);
    }
}