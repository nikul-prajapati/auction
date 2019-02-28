<?php

namespace App\Http\Controllers\Backend\Neeraj;

use App\Models\Neeraj\Neeraj;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Responses\RedirectResponse;
use App\Http\Responses\ViewResponse;
use App\Http\Responses\Backend\Neeraj\CreateResponse;
use App\Http\Responses\Backend\Neeraj\EditResponse;
use App\Repositories\Backend\Neeraj\NeerajRepository;
use App\Http\Requests\Backend\Neeraj\ManageNeerajRequest;
use App\Http\Requests\Backend\Neeraj\CreateNeerajRequest;
use App\Http\Requests\Backend\Neeraj\StoreNeerajRequest;
use App\Http\Requests\Backend\Neeraj\EditNeerajRequest;
use App\Http\Requests\Backend\Neeraj\UpdateNeerajRequest;
use App\Http\Requests\Backend\Neeraj\DeleteNeerajRequest;

/**
 * NeerajsController
 */
class NeerajsController extends Controller
{
    /**
     * variable to store the repository object
     * @var NeerajRepository
     */
    protected $repository;

    /**
     * contructor to initialize repository object
     * @param NeerajRepository $repository;
     */
    public function __construct(NeerajRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Display a listing of the resource.
     *
     * @param  App\Http\Requests\Backend\Neeraj\ManageNeerajRequest  $request
     * @return \App\Http\Responses\ViewResponse
     */
    public function index(ManageNeerajRequest $request)
    {
        return new ViewResponse('backend.neerajs.index');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @param  CreateNeerajRequestNamespace  $request
     * @return \App\Http\Responses\Backend\Neeraj\CreateResponse
     */
    public function create(CreateNeerajRequest $request)
    {
        return new CreateResponse('backend.neerajs.create');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  StoreNeerajRequestNamespace  $request
     * @return \App\Http\Responses\RedirectResponse
     */
    public function store(StoreNeerajRequest $request)
    {
        //Input received from the request
        $input = $request->except(['_token']);
        //Create the model using repository create method
        $this->repository->create($input);
        //return with successfull message
        return new RedirectResponse(route('admin.neerajs.index'), ['flash_success' => trans('alerts.backend.neerajs.created')]);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  App\Models\Neeraj\Neeraj  $neeraj
     * @param  EditNeerajRequestNamespace  $request
     * @return \App\Http\Responses\Backend\Neeraj\EditResponse
     */
    public function edit(Neeraj $neeraj, EditNeerajRequest $request)
    {
        return new EditResponse($neeraj);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  UpdateNeerajRequestNamespace  $request
     * @param  App\Models\Neeraj\Neeraj  $neeraj
     * @return \App\Http\Responses\RedirectResponse
     */
    public function update(UpdateNeerajRequest $request, Neeraj $neeraj)
    {
        //Input received from the request
        $input = $request->except(['_token']);
        //Update the model using repository update method
        $this->repository->update( $neeraj, $input );
        //return with successfull message
        return new RedirectResponse(route('admin.neerajs.index'), ['flash_success' => trans('alerts.backend.neerajs.updated')]);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  DeleteNeerajRequestNamespace  $request
     * @param  App\Models\Neeraj\Neeraj  $neeraj
     * @return \App\Http\Responses\RedirectResponse
     */
    public function destroy(Neeraj $neeraj, DeleteNeerajRequest $request)
    {
        //Calling the delete method on repository
        $this->repository->delete($neeraj);
        //returning with successfull message
        return new RedirectResponse(route('admin.neerajs.index'), ['flash_success' => trans('alerts.backend.neerajs.deleted')]);
    }
    
}
