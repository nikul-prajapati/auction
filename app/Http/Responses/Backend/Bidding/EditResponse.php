<?php

namespace App\Http\Responses\Backend\Bidding;

use Illuminate\Contracts\Support\Responsable;

class EditResponse implements Responsable
{
    /**
     * @var App\Models\Bidding\Bidding
     */
    protected $biddings;

    /**
     * @param App\Models\Bidding\Bidding $biddings
     */
    public function __construct($biddings)
    {
        $this->biddings = $biddings;
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
        return view('backend.biddings.edit')->with([
            'biddings' => $this->biddings
        ]);
    }
}