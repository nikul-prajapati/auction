<?php

namespace App\Http\Responses\Backend\Select_Captain;

use Illuminate\Contracts\Support\Responsable;

class CreateResponse implements Responsable
{
    /**
     * To Response
     *
     * @param \App\Http\Requests\Request $request
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function toResponse($request)
    {
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
        return view('backend.select_captains.create');
=======
        return view('backend.selectcaptains.create');
>>>>>>> ac05c5a21c931d217e05f9713175aa9a694eef49
=======
        return view('backend.select_captains.create');
>>>>>>> 1b2bcb318986bf170d1d914d210e5ea5a5c07ebe
=======
        return view('backend.select_captains.create');
=======
<<<<<<< HEAD
        return view('backend.select_captains.create');
=======
        return view('backend.selectcaptains.create');
>>>>>>> ac05c5a21c931d217e05f9713175aa9a694eef49
>>>>>>> c9875c7e617d975787fdba417acf59bdba1bab18
>>>>>>> bb6b7a3caca2fa16be769a8c4a37b829daa7d0ad
    }
}