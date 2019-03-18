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
        return new ViewResponse('backend.select_captains.index');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @param  CreateSelectcaptainRequestNamespace  $request
     * @return \App\Http\Responses\Backend\Select_Captain\CreateResponse
     */
    public function create(CreateSelectcaptainRequest $request)
    {
        return new CreateResponse('backend.select_captains.create');
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
        return new RedirectResponse(route('admin.select_captains.index'), ['flash_success' => trans('alerts.backend.selectcaptains.created')]);
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
        return new RedirectResponse(route('admin.select_captains.index'), ['flash_success' => trans('alerts.backend.selectcaptains.updated')]);
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
        return new RedirectResponse(route('admin.select_captains.index'), ['flash_success' => trans('alerts.backend.selectcaptains.deleted')]);
    }
    
}
