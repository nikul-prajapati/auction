<?php

namespace App\Http\Controllers\Backend\Selectcaptain;

use App\Models\Selectcaptain\Selectcaptain;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Responses\RedirectResponse;
use App\Http\Responses\ViewResponse;
use App\Http\Responses\Backend\Selectcaptain\CreateResponse;
use App\Http\Responses\Backend\Selectcaptain\EditResponse;
use App\Repositories\Backend\Selectcaptain\SelectcaptainRepository;
use App\Http\Requests\Backend\Selectcaptain\ManageSelectcaptainRequest;
use App\Http\Requests\Backend\Selectcaptain\CreateSelectcaptainRequest;
use App\Http\Requests\Backend\Selectcaptain\StoreSelectcaptainRequest;
use App\Http\Requests\Backend\Selectcaptain\EditSelectcaptainRequest;
use App\Http\Requests\Backend\Selectcaptain\UpdateSelectcaptainRequest;
use App\Http\Requests\Backend\Selectcaptain\DeleteSelectcaptainRequest;

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
     * @param  App\Http\Requests\Backend\Selectcaptain\ManageSelectcaptainRequest  $request
     * @return \App\Http\Responses\ViewResponse
     */
    public function index(ManageSelectcaptainRequest $request)
    {
        return new ViewResponse('backend.selectcaptains.index');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @param  CreateSelectcaptainRequestNamespace  $request
     * @return \App\Http\Responses\Backend\Selectcaptain\CreateResponse
     */
    public function create(CreateSelectcaptainRequest $request)
    {
        return new CreateResponse('backend.selectcaptains.create');
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
        return new RedirectResponse(route('admin.selectcaptains.index'), ['flash_success' => trans('alerts.backend.selectcaptains.created')]);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  App\Models\Selectcaptain\Selectcaptain  $selectcaptain
     * @param  EditSelectcaptainRequestNamespace  $request
     * @return \App\Http\Responses\Backend\Selectcaptain\EditResponse
     */
    public function edit(Selectcaptain $selectcaptain, EditSelectcaptainRequest $request)
    {
        return new EditResponse($selectcaptain);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  UpdateSelectcaptainRequestNamespace  $request
     * @param  App\Models\Selectcaptain\Selectcaptain  $selectcaptain
     * @return \App\Http\Responses\RedirectResponse
     */
    public function update(UpdateSelectcaptainRequest $request, Selectcaptain $selectcaptain)
    {
        //Input received from the request
        $input = $request->except(['_token']);
        //Update the model using repository update method
        $this->repository->update( $selectcaptain, $input );
        //return with successfull message
        return new RedirectResponse(route('admin.selectcaptains.index'), ['flash_success' => trans('alerts.backend.selectcaptains.updated')]);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  DeleteSelectcaptainRequestNamespace  $request
     * @param  App\Models\Selectcaptain\Selectcaptain  $selectcaptain
     * @return \App\Http\Responses\RedirectResponse
     */
    public function destroy(Selectcaptain $selectcaptain, DeleteSelectcaptainRequest $request)
    {
        //Calling the delete method on repository
        $this->repository->delete($selectcaptain);
        //returning with successfull message
        return new RedirectResponse(route('admin.selectcaptains.index'), ['flash_success' => trans('alerts.backend.selectcaptains.deleted')]);
    }
    
}
