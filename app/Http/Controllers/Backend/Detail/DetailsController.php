<?php

namespace App\Http\Controllers\Backend\Detail;

use App\Models\Detail\Detail;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Responses\RedirectResponse;
use App\Http\Responses\ViewResponse;
use App\Http\Responses\Backend\Detail\CreateResponse;
use App\Http\Responses\Backend\Detail\EditResponse;
use App\Repositories\Backend\Detail\DetailRepository;
use App\Http\Requests\Backend\Detail\ManageDetailRequest;
use App\Http\Requests\Backend\Detail\CreateDetailRequest;
use App\Http\Requests\Backend\Detail\StoreDetailRequest;
use App\Http\Requests\Backend\Detail\EditDetailRequest;
use App\Http\Requests\Backend\Detail\UpdateDetailRequest;
use App\Http\Requests\Backend\Detail\DeleteDetailRequest;

/**
 * DetailsController
 */
class DetailsController extends Controller
{
    /**
     * variable to store the repository object
     * @var DetailRepository
     */
    protected $repository;

    /**
     * contructor to initialize repository object
     * @param DetailRepository $repository;
     */
    public function __construct(DetailRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Display a listing of the resource.
     *
     * @param  App\Http\Requests\Backend\Detail\ManageDetailRequest  $request
     * @return \App\Http\Responses\ViewResponse
     */
    public function index(ManageDetailRequest $request)
    {
        return new ViewResponse('backend.details.index');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @param  CreateDetailRequestNamespace  $request
     * @return \App\Http\Responses\Backend\Detail\CreateResponse
     */
    public function create(CreateDetailRequest $request)
    {
        return new CreateResponse('backend.details.create');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  StoreDetailRequestNamespace  $request
     * @return \App\Http\Responses\RedirectResponse
     */
    public function store(StoreDetailRequest $request)
    {
        //Input received from the request
        $input = $request->except(['_token']);
        //Create the model using repository create method
        $this->repository->create($input);
        //return with successfull message
        return new RedirectResponse(route('admin.details.index'), ['flash_success' => trans('alerts.backend.details.created')]);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  App\Models\Detail\Detail  $detail
     * @param  EditDetailRequestNamespace  $request
     * @return \App\Http\Responses\Backend\Detail\EditResponse
     */
    public function edit(Detail $detail, EditDetailRequest $request)
    {
        return new EditResponse($detail);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  UpdateDetailRequestNamespace  $request
     * @param  App\Models\Detail\Detail  $detail
     * @return \App\Http\Responses\RedirectResponse
     */
    public function update(UpdateDetailRequest $request, Detail $detail)
    {
        //Input received from the request
        $input = $request->except(['_token']);
        //Update the model using repository update method
        $this->repository->update( $detail, $input );
        //return with successfull message
        return new RedirectResponse(route('admin.details.index'), ['flash_success' => trans('alerts.backend.details.updated')]);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  DeleteDetailRequestNamespace  $request
     * @param  App\Models\Detail\Detail  $detail
     * @return \App\Http\Responses\RedirectResponse
     */
    public function destroy(Detail $detail, DeleteDetailRequest $request)
    {
        //Calling the delete method on repository
        $this->repository->delete($detail);
        //returning with successfull message
        return new RedirectResponse(route('admin.details.index'), ['flash_success' => trans('alerts.backend.details.deleted')]);
    }
    
}
