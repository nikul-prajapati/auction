<?php

namespace App\Http\Controllers\Backend\Playerrecords_User;

use App\Models\Playerrecords_User\Playerrecordsuser;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Responses\RedirectResponse;
use App\Http\Responses\ViewResponse;
use App\Http\Responses\Backend\Playerrecords_User\CreateResponse;
use App\Http\Responses\Backend\Playerrecords_User\EditResponse;
use App\Repositories\Backend\Playerrecords_User\PlayerrecordsuserRepository;
use App\Http\Requests\Backend\Playerrecords_User\ManagePlayerrecordsuserRequest;
use App\Http\Requests\Backend\Playerrecords_User\CreatePlayerrecordsuserRequest;
use App\Http\Requests\Backend\Playerrecords_User\StorePlayerrecordsuserRequest;
use App\Http\Requests\Backend\Playerrecords_User\EditPlayerrecordsuserRequest;
use App\Http\Requests\Backend\Playerrecords_User\UpdatePlayerrecordsuserRequest;
use App\Http\Requests\Backend\Playerrecords_User\DeletePlayerrecordsuserRequest;

/**
 * PlayerrecordsusersController
 */
class PlayerrecordsusersController extends Controller
{
    /**
     * variable to store the repository object
     * @var PlayerrecordsuserRepository
     */
    protected $repository;

    /**
     * contructor to initialize repository object
     * @param PlayerrecordsuserRepository $repository;
     */
    public function __construct(PlayerrecordsuserRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Display a listing of the resource.
     *
     * @param  App\Http\Requests\Backend\Playerrecords_User\ManagePlayerrecordsuserRequest  $request
     * @return \App\Http\Responses\ViewResponse
     */
    public function index(ManagePlayerrecordsuserRequest $request)
    {
        return new ViewResponse('backend.playerrecordsusers.index');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @param  CreatePlayerrecordsuserRequestNamespace  $request
     * @return \App\Http\Responses\Backend\Playerrecords_User\CreateResponse
     */
    public function create(CreatePlayerrecordsuserRequest $request)
    {
        return new CreateResponse('backend.playerrecordsusers.create');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  StorePlayerrecordsuserRequestNamespace  $request
     * @return \App\Http\Responses\RedirectResponse
     */
    public function store(StorePlayerrecordsuserRequest $request)
    {
        //Input received from the request
        $input = $request->except(['_token']);
        //Create the model using repository create method
        $this->repository->create($input);
        //return with successfull message
        return new RedirectResponse(route('admin.playerrecordsusers.index'), ['flash_success' => trans('alerts.backend.playerrecordsusers.created')]);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  App\Models\Playerrecords_User\Playerrecordsuser  $playerrecordsuser
     * @param  EditPlayerrecordsuserRequestNamespace  $request
     * @return \App\Http\Responses\Backend\Playerrecords_User\EditResponse
     */
    public function edit(Playerrecordsuser $playerrecordsuser, EditPlayerrecordsuserRequest $request)
    {
        return new EditResponse($playerrecordsuser);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  UpdatePlayerrecordsuserRequestNamespace  $request
     * @param  App\Models\Playerrecords_User\Playerrecordsuser  $playerrecordsuser
     * @return \App\Http\Responses\RedirectResponse
     */
    public function update(UpdatePlayerrecordsuserRequest $request, Playerrecordsuser $playerrecordsuser)
    {
        //Input received from the request
        $input = $request->except(['_token']);
        //Update the model using repository update method
        $this->repository->update( $playerrecordsuser, $input );
        //return with successfull message
        return new RedirectResponse(route('admin.playerrecordsusers.index'), ['flash_success' => trans('alerts.backend.playerrecordsusers.updated')]);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  DeletePlayerrecordsuserRequestNamespace  $request
     * @param  App\Models\Playerrecords_User\Playerrecordsuser  $playerrecordsuser
     * @return \App\Http\Responses\RedirectResponse
     */
    public function destroy(Playerrecordsuser $playerrecordsuser, DeletePlayerrecordsuserRequest $request)
    {
        //Calling the delete method on repository
        $this->repository->delete($playerrecordsuser);
        //returning with successfull message
        return new RedirectResponse(route('admin.playerrecordsusers.index'), ['flash_success' => trans('alerts.backend.playerrecordsusers.deleted')]);
    }
    
}
