<?php

namespace App\Http\Controllers\Backend\Select_Captain;

use App\Models\Select_Captain\Selectcaptain;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Responses\RedirectResponse;
use App\Http\Responses\ViewResponse;
use App\Http\Responses\Backend\Select_Captain\CreateResponse;
use App\Http\Responses\Backend\Select_Captain\EditResponse;
use App\Repositories\Backend\Select_Captain\SelectcaptainRepository;
use App\Http\Requests\Backend\Select_Captain\ManageSelectcaptainRequest;
use App\Http\Requests\Backend\Select_Captain\CreateSelectcaptainRequest;
use App\Http\Requests\Backend\Select_Captain\StoreSelectcaptainRequest;
use App\Http\Requests\Backend\Select_Captain\EditSelectcaptainRequest;
use App\Http\Requests\Backend\Select_Captain\UpdateSelectcaptainRequest;
use App\Http\Requests\Backend\Select_Captain\DeleteSelectcaptainRequest;

/**
 * SelectcaptainsController
 */
class SelectcaptainsController extends Controller
{
    /**
     * variable to store the repository object
     * @var SelectcaptainRepository
     */
    protected $repository;

    /**
     * contructor to initialize repository object
     * @param SelectcaptainRepository $repository;
     */
    public function __construct(SelectcaptainRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Display a listing of the resource.
     *
     * @param  App\Http\Requests\Backend\Select_Captain\ManageSelectcaptainRequest  $request
     * @return \App\Http\Responses\ViewResponse
     */
    public function index(ManageSelectcaptainRequest $request)
    {
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
=======
        return new ViewResponse('backend.selectcaptains.index');
=======
=======
>>>>>>> 17f82779687ee3bfbaab57f8361b3568ccd52353
>>>>>>> 2b2f9ad3c988260e939e75cdcdd48dfa7c1dff54
<<<<<<< HEAD
        return new ViewResponse('backend.select_captains.index');
=======
        return new ViewResponse('backend.selectcaptains.index');
>>>>>>> ac05c5a21c931d217e05f9713175aa9a694eef49
<<<<<<< HEAD
=======
        return new ViewResponse('backend.select_captains.index');
>>>>>>> 1b2bcb318986bf170d1d914d210e5ea5a5c07ebe
=======
        return new ViewResponse('backend.select_captains.index');
=======
<<<<<<< HEAD
        return new ViewResponse('backend.select_captains.index');
=======
        return new ViewResponse('backend.selectcaptains.index');
>>>>>>> ac05c5a21c931d217e05f9713175aa9a694eef49
>>>>>>> c9875c7e617d975787fdba417acf59bdba1bab18
>>>>>>> bb6b7a3caca2fa16be769a8c4a37b829daa7d0ad
=======
<<<<<<< HEAD
>>>>>>> c9875c7e617d975787fdba417acf59bdba1bab18
=======
=======
        return new ViewResponse('backend.select_captains.index');
>>>>>>> 1b2bcb318986bf170d1d914d210e5ea5a5c07ebe
>>>>>>> 17f82779687ee3bfbaab57f8361b3568ccd52353
>>>>>>> 2b2f9ad3c988260e939e75cdcdd48dfa7c1dff54
    }
    /**
     * Show the form for creating a new resource.
     *
     * @param  CreateSelectcaptainRequestNamespace  $request
     * @return \App\Http\Responses\Backend\Select_Captain\CreateResponse
     */
    public function create(CreateSelectcaptainRequest $request)
    {
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
=======
        return new CreateResponse('backend.selectcaptains.create');
=======
=======
>>>>>>> 17f82779687ee3bfbaab57f8361b3568ccd52353
>>>>>>> 2b2f9ad3c988260e939e75cdcdd48dfa7c1dff54
<<<<<<< HEAD
        return new CreateResponse('backend.select_captains.create');
=======
        return new CreateResponse('backend.selectcaptains.create');
>>>>>>> ac05c5a21c931d217e05f9713175aa9a694eef49
<<<<<<< HEAD
=======
        return new CreateResponse('backend.select_captains.create');
>>>>>>> 1b2bcb318986bf170d1d914d210e5ea5a5c07ebe
=======
        return new CreateResponse('backend.select_captains.create');
=======
<<<<<<< HEAD
        return new CreateResponse('backend.select_captains.create');
=======
        return new CreateResponse('backend.selectcaptains.create');
>>>>>>> ac05c5a21c931d217e05f9713175aa9a694eef49
>>>>>>> c9875c7e617d975787fdba417acf59bdba1bab18
>>>>>>> bb6b7a3caca2fa16be769a8c4a37b829daa7d0ad
=======
<<<<<<< HEAD
>>>>>>> c9875c7e617d975787fdba417acf59bdba1bab18
=======
=======
        return new CreateResponse('backend.select_captains.create');
>>>>>>> 1b2bcb318986bf170d1d914d210e5ea5a5c07ebe
>>>>>>> 17f82779687ee3bfbaab57f8361b3568ccd52353
>>>>>>> 2b2f9ad3c988260e939e75cdcdd48dfa7c1dff54
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  StoreSelectcaptainRequestNamespace  $request
     * @return \App\Http\Responses\RedirectResponse
     */
    public function store(StoreSelectcaptainRequest $request)
    {
        //Input received from the request
        $input = $request->except(['_token']);
        //Create the model using repository create method
        $this->repository->create($input);
        //return with successfull message
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
=======
        return new RedirectResponse(route('admin.selectcaptains.index'), ['flash_success' => trans('alerts.backend.selectcaptains.created')]);
=======
=======
>>>>>>> 17f82779687ee3bfbaab57f8361b3568ccd52353
>>>>>>> 2b2f9ad3c988260e939e75cdcdd48dfa7c1dff54
<<<<<<< HEAD
        return new RedirectResponse(route('admin.select_captains.index'), ['flash_success' => trans('alerts.backend.selectcaptains.created')]);
=======
        return new RedirectResponse(route('admin.selectcaptains.index'), ['flash_success' => trans('alerts.backend.selectcaptains.created')]);
>>>>>>> ac05c5a21c931d217e05f9713175aa9a694eef49
<<<<<<< HEAD
=======
        return new RedirectResponse(route('admin.select_captains.index'), ['flash_success' => trans('alerts.backend.selectcaptains.created')]);
>>>>>>> 1b2bcb318986bf170d1d914d210e5ea5a5c07ebe
=======
        return new RedirectResponse(route('admin.select_captains.index'), ['flash_success' => trans('alerts.backend.selectcaptains.created')]);
=======
<<<<<<< HEAD
        return new RedirectResponse(route('admin.select_captains.index'), ['flash_success' => trans('alerts.backend.selectcaptains.created')]);
=======
        return new RedirectResponse(route('admin.selectcaptains.index'), ['flash_success' => trans('alerts.backend.selectcaptains.created')]);
>>>>>>> ac05c5a21c931d217e05f9713175aa9a694eef49
>>>>>>> c9875c7e617d975787fdba417acf59bdba1bab18
>>>>>>> bb6b7a3caca2fa16be769a8c4a37b829daa7d0ad
=======
<<<<<<< HEAD
>>>>>>> c9875c7e617d975787fdba417acf59bdba1bab18
=======
=======
        return new RedirectResponse(route('admin.select_captains.index'), ['flash_success' => trans('alerts.backend.selectcaptains.created')]);
>>>>>>> 1b2bcb318986bf170d1d914d210e5ea5a5c07ebe
>>>>>>> 17f82779687ee3bfbaab57f8361b3568ccd52353
>>>>>>> 2b2f9ad3c988260e939e75cdcdd48dfa7c1dff54
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  App\Models\Select_Captain\Selectcaptain  $selectcaptain
     * @param  EditSelectcaptainRequestNamespace  $request
     * @return \App\Http\Responses\Backend\Select_Captain\EditResponse
     */
    public function edit(Selectcaptain $selectcaptain, EditSelectcaptainRequest $request)
    {
        return new EditResponse($selectcaptain);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  UpdateSelectcaptainRequestNamespace  $request
     * @param  App\Models\Select_Captain\Selectcaptain  $selectcaptain
     * @return \App\Http\Responses\RedirectResponse
     */
    public function update(UpdateSelectcaptainRequest $request, Selectcaptain $selectcaptain)
    {
        //Input received from the request
        $input = $request->except(['_token']);
        //Update the model using repository update method
        $this->repository->update( $selectcaptain, $input );
        //return with successfull message
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
        return new RedirectResponse(route('admin.select_captains.index'), ['flash_success' => trans('alerts.backend.selectcaptains.updated')]);
=======
        return new RedirectResponse(route('admin.selectcaptains.index'), ['flash_success' => trans('alerts.backend.selectcaptains.updated')]);
>>>>>>> ac05c5a21c931d217e05f9713175aa9a694eef49
=======
        return new RedirectResponse(route('admin.select_captains.index'), ['flash_success' => trans('alerts.backend.selectcaptains.updated')]);
>>>>>>> 1b2bcb318986bf170d1d914d210e5ea5a5c07ebe
=======
        return new RedirectResponse(route('admin.select_captains.index'), ['flash_success' => trans('alerts.backend.selectcaptains.updated')]);
=======
=======
        return new RedirectResponse(route('admin.selectcaptains.index'), ['flash_success' => trans('alerts.backend.selectcaptains.updated')]);
=======
=======
>>>>>>> 17f82779687ee3bfbaab57f8361b3568ccd52353
>>>>>>> 2b2f9ad3c988260e939e75cdcdd48dfa7c1dff54
<<<<<<< HEAD
        return new RedirectResponse(route('admin.select_captains.index'), ['flash_success' => trans('alerts.backend.selectcaptains.updated')]);
=======
        return new RedirectResponse(route('admin.selectcaptains.index'), ['flash_success' => trans('alerts.backend.selectcaptains.updated')]);
>>>>>>> ac05c5a21c931d217e05f9713175aa9a694eef49
<<<<<<< HEAD
>>>>>>> c9875c7e617d975787fdba417acf59bdba1bab18
>>>>>>> bb6b7a3caca2fa16be769a8c4a37b829daa7d0ad
=======
<<<<<<< HEAD
>>>>>>> c9875c7e617d975787fdba417acf59bdba1bab18
=======
=======
        return new RedirectResponse(route('admin.select_captains.index'), ['flash_success' => trans('alerts.backend.selectcaptains.updated')]);
>>>>>>> 1b2bcb318986bf170d1d914d210e5ea5a5c07ebe
>>>>>>> 17f82779687ee3bfbaab57f8361b3568ccd52353
>>>>>>> 2b2f9ad3c988260e939e75cdcdd48dfa7c1dff54
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  DeleteSelectcaptainRequestNamespace  $request
     * @param  App\Models\Select_Captain\Selectcaptain  $selectcaptain
     * @return \App\Http\Responses\RedirectResponse
     */
    public function destroy(Selectcaptain $selectcaptain, DeleteSelectcaptainRequest $request)
    {
        //Calling the delete method on repository
        $this->repository->delete($selectcaptain);
        //returning with successfull message
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
=======
        return new RedirectResponse(route('admin.selectcaptains.index'), ['flash_success' => trans('alerts.backend.selectcaptains.deleted')]);
=======
=======
>>>>>>> 17f82779687ee3bfbaab57f8361b3568ccd52353
>>>>>>> 2b2f9ad3c988260e939e75cdcdd48dfa7c1dff54
<<<<<<< HEAD
        return new RedirectResponse(route('admin.select_captains.index'), ['flash_success' => trans('alerts.backend.selectcaptains.deleted')]);
=======
        return new RedirectResponse(route('admin.selectcaptains.index'), ['flash_success' => trans('alerts.backend.selectcaptains.deleted')]);
>>>>>>> ac05c5a21c931d217e05f9713175aa9a694eef49
<<<<<<< HEAD
=======
        return new RedirectResponse(route('admin.select_captains.index'), ['flash_success' => trans('alerts.backend.selectcaptains.deleted')]);
>>>>>>> 1b2bcb318986bf170d1d914d210e5ea5a5c07ebe
=======
        return new RedirectResponse(route('admin.select_captains.index'), ['flash_success' => trans('alerts.backend.selectcaptains.deleted')]);
=======
<<<<<<< HEAD
        return new RedirectResponse(route('admin.select_captains.index'), ['flash_success' => trans('alerts.backend.selectcaptains.deleted')]);
=======
        return new RedirectResponse(route('admin.selectcaptains.index'), ['flash_success' => trans('alerts.backend.selectcaptains.deleted')]);
>>>>>>> ac05c5a21c931d217e05f9713175aa9a694eef49
>>>>>>> c9875c7e617d975787fdba417acf59bdba1bab18
>>>>>>> bb6b7a3caca2fa16be769a8c4a37b829daa7d0ad
=======
<<<<<<< HEAD
>>>>>>> c9875c7e617d975787fdba417acf59bdba1bab18
=======
=======
        return new RedirectResponse(route('admin.select_captains.index'), ['flash_success' => trans('alerts.backend.selectcaptains.deleted')]);
>>>>>>> 1b2bcb318986bf170d1d914d210e5ea5a5c07ebe
>>>>>>> 17f82779687ee3bfbaab57f8361b3568ccd52353
>>>>>>> 2b2f9ad3c988260e939e75cdcdd48dfa7c1dff54
    }
    
}
