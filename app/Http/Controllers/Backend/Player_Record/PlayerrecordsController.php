<?php

namespace App\Http\Controllers\Backend\Player_Record;

use App\Models\Player_Record\Playerrecord;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Responses\RedirectResponse;
use App\Http\Responses\ViewResponse;
use App\Http\Responses\Backend\Player_Record\CreateResponse;
use App\Http\Responses\Backend\Player_Record\EditResponse;
use App\Repositories\Backend\Player_Record\PlayerrecordRepository;
use App\Http\Requests\Backend\Player_Record\ManagePlayerrecordRequest;
use App\Http\Requests\Backend\Player_Record\CreatePlayerrecordRequest;
use App\Http\Requests\Backend\Player_Record\StorePlayerrecordRequest;
use App\Http\Requests\Backend\Player_Record\EditPlayerrecordRequest;
use App\Http\Requests\Backend\Player_Record\UpdatePlayerrecordRequest;
use App\Http\Requests\Backend\Player_Record\DeletePlayerrecordRequest;

/**
 * PlayerrecordsController
 */
class PlayerrecordsController extends Controller
{
    /**
     * variable to store the repository object
     * @var PlayerrecordRepository
     */
    protected $repository;

    /**
     * contructor to initialize repository object
     * @param PlayerrecordRepository $repository;
     */
    public function __construct(PlayerrecordRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Display a listing of the resource.
     *
     * @param  App\Http\Requests\Backend\Player_Record\ManagePlayerrecordRequest  $request
     * @return \App\Http\Responses\ViewResponse
     */
    public function index(ManagePlayerrecordRequest $request)
    {
        return new ViewResponse('backend.playerrecords.index');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @param  CreatePlayerrecordRequestNamespace  $request
     * @return \App\Http\Responses\Backend\Player_Record\CreateResponse
     */
    public function create(CreatePlayerrecordRequest $request)
    {
        return new CreateResponse('backend.playerrecords.create');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  StorePlayerrecordRequestNamespace  $request
     * @return \App\Http\Responses\RedirectResponse
     */
    public function store(StorePlayerrecordRequest $request)
    {
        //Input received from the request
        $input = $request->except(['_token']);
        //Create the model using repository create method
        $this->repository->create($input);
        //return with successfull message
        return new RedirectResponse(route('admin.playerrecords.index'), ['flash_success' => trans('alerts.backend.playerrecords.created')]);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  App\Models\Player_Record\Playerrecord  $playerrecord
     * @param  EditPlayerrecordRequestNamespace  $request
     * @return \App\Http\Responses\Backend\Player_Record\EditResponse
     */
    public function edit(Playerrecord $playerrecord, EditPlayerrecordRequest $request)
    {
        return new EditResponse($playerrecord);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  UpdatePlayerrecordRequestNamespace  $request
     * @param  App\Models\Player_Record\Playerrecord  $playerrecord
     * @return \App\Http\Responses\RedirectResponse
     */
    public function update(UpdatePlayerrecordRequest $request, Playerrecord $playerrecord)
    {
        //Input received from the request
        $input = $request->except(['_token']);
        //Update the model using repository update method
        $this->repository->update( $playerrecord, $input );
        //return with successfull message
        return new RedirectResponse(route('admin.playerrecords.index'), ['flash_success' => trans('alerts.backend.playerrecords.updated')]);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  DeletePlayerrecordRequestNamespace  $request
     * @param  App\Models\Player_Record\Playerrecord  $playerrecord
     * @return \App\Http\Responses\RedirectResponse
     */
    public function destroy(Playerrecord $playerrecord, DeletePlayerrecordRequest $request)
    {
        //Calling the delete method on repository
        $this->repository->delete($playerrecord);
        //returning with successfull message
        return new RedirectResponse(route('admin.playerrecords.index'), ['flash_success' => trans('alerts.backend.playerrecords.deleted')]);
    }
    
}
