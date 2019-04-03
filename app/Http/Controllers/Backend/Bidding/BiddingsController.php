<?php

namespace App\Http\Controllers\Backend\Bidding;

use App\Models\Bidding\Bidding;
use DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Responses\RedirectResponse;
use App\Http\Responses\ViewResponse;
use App\Http\Responses\Backend\Bidding\CreateResponse;
use App\Http\Responses\Backend\Bidding\EditResponse;
use App\Repositories\Backend\Bidding\BiddingRepository;
use App\Http\Requests\Backend\Bidding\ManageBiddingRequest;
use App\Http\Requests\Backend\Bidding\CreateBiddingRequest;
use App\Http\Requests\Backend\Bidding\StoreBiddingRequest;
use App\Http\Requests\Backend\Bidding\EditBiddingRequest;
use App\Http\Requests\Backend\Bidding\UpdateBiddingRequest;
use App\Http\Requests\Backend\Bidding\DeleteBiddingRequest;

/**
 * BiddingsController
 */
class BiddingsController extends Controller
{
    /**
     * variable to store the repository object
     * @var BiddingRepository
     */
    protected $repository;

    /**
     * contructor to initialize repository object
     * @param BiddingRepository $repository;
     */
    public function __construct(BiddingRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Display a listing of the resource.
     *
     * @param  App\Http\Requests\Backend\Bidding\ManageBiddingRequest  $request
     * @return \App\Http\Responses\ViewResponse
     */
    public function index(ManageBiddingRequest $request)
    {
        return new ViewResponse('backend.biddings.index');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @param  CreateBiddingRequestNamespace  $request
     * @return \App\Http\Responses\Backend\Bidding\CreateResponse
     */
    public function create(CreateBiddingRequest $request)
    {
        $data['data'] = DB::table('teams')->get();
        $users['users'] = DB::table('users')->paginate(1)->onEachSide(2);
        return view('backend.biddings.create',$data,$users);
        //return new CreateResponse('backend.biddings.create',$data);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  StoreBiddingRequestNamespace  $request
     * @return \App\Http\Responses\RedirectResponse
     */
    public function store(StoreBiddingRequest $request)
    {
        //Input received from the request
        $input = $request->except(['_token']);
        //Create the model using repository create method
        $this->repository->create($input);
        //return with successfull message
        return new RedirectResponse(route('admin.biddings.index'), ['flash_success' => trans('alerts.backend.biddings.created')]);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  App\Models\Bidding\Bidding  $bidding
     * @param  EditBiddingRequestNamespace  $request
     * @return \App\Http\Responses\Backend\Bidding\EditResponse
     */
    public function edit(Bidding $bidding, EditBiddingRequest $request)
    {
        return new EditResponse($bidding);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  UpdateBiddingRequestNamespace  $request
     * @param  App\Models\Bidding\Bidding  $bidding
     * @return \App\Http\Responses\RedirectResponse
     */
    public function update(UpdateBiddingRequest $request, Bidding $bidding)
    {
        //Input received from the request
        $input = $request->except(['_token']);
        //Update the model using repository update method
        $this->repository->update( $bidding, $input );
        //return with successfull message
        return new RedirectResponse(route('admin.biddings.index'), ['flash_success' => trans('alerts.backend.biddings.updated')]);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  DeleteBiddingRequestNamespace  $request
     * @param  App\Models\Bidding\Bidding  $bidding
     * @return \App\Http\Responses\RedirectResponse
     */
    public function destroy(Bidding $bidding, DeleteBiddingRequest $request)
    {
        //Calling the delete method on repository
        $this->repository->delete($bidding);
        //returning with successfull message
        return new RedirectResponse(route('admin.biddings.index'), ['flash_success' => trans('alerts.backend.biddings.deleted')]);
    }
    
}
