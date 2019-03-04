<?php

namespace App\Http\Responses\Backend\Detail;

use Illuminate\Contracts\Support\Responsable;

class EditResponse implements Responsable
{
    /**
     * @var App\Models\Detail\Detail
     */
    protected $details;

    /**
     * @param App\Models\Detail\Detail $details
     */
    public function __construct($details)
    {
        $this->details = $details;
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
        return view('backend.details.edit')->with([
            'details' => $this->details
        ]);
    }
}