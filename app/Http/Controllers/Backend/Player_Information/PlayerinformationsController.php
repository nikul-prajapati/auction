<?php

namespace App\Http\Controllers\Backend\Player_Information;

use App\Models\Player_Information\Playerinformation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Responses\RedirectResponse;
use App\Http\Responses\ViewResponse;
use App\Http\Responses\Backend\Player_Information\CreateResponse;
use App\Http\Responses\Backend\Player_Information\EditResponse;
use App\Repositories\Backend\Player_Information\PlayerinformationRepository;
use App\Http\Requests\Backend\Player_Information\ManagePlayerinformationRequest;
use App\Http\Requests\Backend\Player_Information\CreatePlayerinformationRequest;
use App\Http\Requests\Backend\Player_Information\StorePlayerinformationRequest;
use App\Http\Requests\Backend\Player_Information\EditPlayerinformationRequest;
use App\Http\Requests\Backend\Player_Information\UpdatePlayerinformationRequest;
use App\Http\Requests\Backend\Player_Information\DeletePlayerinformationRequest;

/**
 * PlayerinformationsController
 */
class PlayerinformationsController extends Controller
{
    /**
     * variable to store the repository object
     * @var PlayerinformationRepository
     */
    protected $repository;

    /**
     * contructor to initialize repository object
     * @param PlayerinformationRepository $repository;
     */
    public function __construct(PlayerinformationRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Display a listing of the resource.
     *
     * @param  App\Http\Requests\Backend\Player_Information\ManagePlayerinformationRequest  $request
     * @return \App\Http\Responses\ViewResponse
     */
    public function index(ManagePlayerinformationRequest $request)
    {
        return new ViewResponse('backend.playerinformations.index');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @param  CreatePlayerinformationRequestNamespace  $request
     * @return \App\Http\Responses\Backend\Player_Information\CreateResponse
     */
    public function create(CreatePlayerinformationRequest $request)
    {
        
        return new CreateResponse('backend.playerinformations.create');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  StorePlayerinformationRequestNamespace  $request
     * @return \App\Http\Responses\RedirectResponse
     */
    public function store(StorePlayerinformationRequest $request)
    {
        //Input received from the request
        $input = $request->except(['_token']);
        //Create the model using repository create method
        $this->repository->create($input);
        //return with successfull message
        return new RedirectResponse(route('admin.playerinformations.index'), ['flash_success' => trans('alerts.backend.playerinformations.created')]);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  App\Models\Player_Information\Playerinformation  $playerinformation
     * @param  EditPlayerinformationRequestNamespace  $request
     * @return \App\Http\Responses\Backend\Player_Information\EditResponse
     */
    public function edit(Playerinformation $playerinformation, EditPlayerinformationRequest $request)
    {
        return new EditResponse($playerinformation);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  UpdatePlayerinformationRequestNamespace  $request
     * @param  App\Models\Player_Information\Playerinformation  $playerinformation
     * @return \App\Http\Responses\RedirectResponse
     */
    public function update(UpdatePlayerinformationRequest $request, Playerinformation $playerinformation)
    {
        //Input received from the request
        $input = $request->except(['_token']);
        //Update the model using repository update method
        $this->repository->update( $playerinformation, $input );
        //return with successfull message
        return new RedirectResponse(route('admin.playerinformations.index'), ['flash_success' => trans('alerts.backend.playerinformations.updated')]);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  DeletePlayerinformationRequestNamespace  $request
     * @param  App\Models\Player_Information\Playerinformation  $playerinformation
     * @return \App\Http\Responses\RedirectResponse
     */
    public function destroy(Playerinformation $playerinformation, DeletePlayerinformationRequest $request)
    {
        //Calling the delete method on repository
        $this->repository->delete($playerinformation);
        //returning with successfull message
        return new RedirectResponse(route('admin.playerinformations.index'), ['flash_success' => trans('alerts.backend.playerinformations.deleted')]);
    }
    
}
