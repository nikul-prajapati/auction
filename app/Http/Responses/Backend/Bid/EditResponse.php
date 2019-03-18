<?php

namespace App\Http\Responses\Backend\Bid;

use Illuminate\Contracts\Support\Responsable;

class EditResponse implements Responsable
{
    /**
     * @var App\Models\Bid\Bid
     */
    protected $bids;

    /**
     * @param App\Models\Bid\Bid $bids
     */
    public function __construct($bids)
    {
        $this->bids = $bids;
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
        return view('backend.bids.edit')->with([
            'bids' => $this->bids
        ]);
    }
}