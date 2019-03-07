<?php

namespace App\Http\Controllers\Backend\Player;

use App\Models\Player\Player;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Responses\RedirectResponse;
use App\Http\Responses\ViewResponse;
use App\Http\Responses\Backend\Player\CreateResponse;
use App\Http\Responses\Backend\Player\EditResponse;
use App\Repositories\Backend\Player\PlayerRepository;
use App\Http\Requests\Backend\Player\ManagePlayerRequest;
use App\Http\Requests\Backend\Player\EditPlayerRequest;
use App\Http\Requests\Backend\Player\UpdatePlayerRequest;
use App\Http\Requests\Backend\Player\DeletePlayerRequest;

/**
 * PlayersController
 */
class PlayersController extends Controller
{
    /**
     * variable to store the repository object
     * @var PlayerRepository
     */
    protected $repository;

    /**
     * contructor to initialize repository object
     * @param PlayerRepository $repository;
     */
    public function __construct(PlayerRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Display a listing of the resource.
     *
     * @param  App\Http\Requests\Backend\Player\ManagePlayerRequest  $request
     * @return \App\Http\Responses\ViewResponse
     */
    public function index(ManagePlayerRequest $request)
    {
        return new ViewResponse('backend.players.index');
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  App\Models\Player\Player  $player
     * @param  EditPlayerRequestNamespace  $request
     * @return \App\Http\Responses\Backend\Player\EditResponse
     */
    public function edit(Player $player, EditPlayerRequest $request)
    {
        return new EditResponse($player);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  UpdatePlayerRequestNamespace  $request
     * @param  App\Models\Player\Player  $player
     * @return \App\Http\Responses\RedirectResponse
     */
    public function update(UpdatePlayerRequest $request, Player $player)
    {
        //Input received from the request
        $input = $request->except(['_token']);
        //Update the model using repository update method
        $this->repository->update( $player, $input );
        //return with successfull message
        return new RedirectResponse(route('admin.players.index'), ['flash_success' => trans('alerts.backend.players.updated')]);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  DeletePlayerRequestNamespace  $request
     * @param  App\Models\Player\Player  $player
     * @return \App\Http\Responses\RedirectResponse
     */
    public function destroy(Player $player, DeletePlayerRequest $request)
    {
        //Calling the delete method on repository
        $this->repository->delete($player);
        //returning with successfull message
        return new RedirectResponse(route('admin.players.index'), ['flash_success' => trans('alerts.backend.players.deleted')]);
    }
    
}
