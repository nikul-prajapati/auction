<?php

namespace App\Http\Controllers\Backend\Bid;


use DB;
use App\Models\Bid\Bid;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Responses\RedirectResponse;
use App\Http\Responses\ViewResponse;
use App\Http\Responses\Backend\Bid\CreateResponse;
use App\Http\Responses\Backend\Bid\EditResponse;
use App\Repositories\Backend\Bid\BidRepository;
use App\Http\Requests\Backend\Bid\ManageBidRequest;
use App\Http\Requests\Backend\Bid\CreateBidRequest;
use App\Http\Requests\Backend\Bid\StoreBidRequest;
use App\Http\Requests\Backend\Bid\EditBidRequest;
use App\Http\Requests\Backend\Bid\UpdateBidRequest;
use App\Http\Requests\Backend\Bid\DeleteBidRequest;

/**
 * BidsController
 */
class BidsController extends Controller
{
    /**
     * variable to store the repository object
     * @var BidRepository
     */
    protected $repository;

    /**
     * contructor to initialize repository object
     * @param BidRepository $repository;
     */
    public function __construct(BidRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Display a listing of the resource.
     *
     * @param  App\Http\Requests\Backend\Bid\ManageBidRequest  $request
     * @return \App\Http\Responses\ViewResponse
     */
    public function index(ManageBidRequest $request)
    {
        $data['data']=DB::table('teams')->get();
        return view('backend.bids.index',$data);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @param  CreateBidRequestNamespace  $request
     * @return \App\Http\Responses\Backend\Bid\CreateResponse
     */
    public function create(CreateBidRequest $request)
    {
        return new CreateResponse('backend.bids.create');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  StoreBidRequestNamespace  $request
     * @return \App\Http\Responses\RedirectResponse
     */
    public function store(StoreBidRequest $request)
    {
        //Input received from the request
        // $input = $request->except(['_token']);
        //Create the model using repository create method
        // $this->repository->create($input);
        //return with successfull message
        // return new RedirectResponse(route('admin.bids.index'), ['flash_success' => trans('alerts.backend.bids.created')]);

        $request->validate(['pprice'=>'required|integer']);

        $bids = new newbids([
            'pprice'=>$request->get('price')
            // ''=>$request->get(''),
            // ''=>$request->get('')
        ]);

        $bids->save();
        return redirect('');
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  App\Models\Bid\Bid  $bid
     * @param  EditBidRequestNamespace  $request
     * @return \App\Http\Responses\Backend\Bid\EditResponse
     */
    public function edit(Bid $bid, EditBidRequest $request)
    {
        return new EditResponse($bid);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  UpdateBidRequestNamespace  $request
     * @param  App\Models\Bid\Bid  $bid
     * @return \App\Http\Responses\RedirectResponse
     */
    public function update(UpdateBidRequest $request, Bid $bid)
    {
        //Input received from the request
        $input = $request->except(['_token']);
        //Update the model using repository update method
        $this->repository->update( $bid, $input );
        //return with successfull message
        return new RedirectResponse(route('admin.bids.index'), ['flash_success' => trans('alerts.backend.bids.updated')]);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  DeleteBidRequestNamespace  $request
     * @param  App\Models\Bid\Bid  $bid
     * @return \App\Http\Responses\RedirectResponse
     */
    public function destroy(Bid $bid, DeleteBidRequest $request)
    {
        //Calling the delete method on repository
        $this->repository->delete($bid);
        //returning with successfull message
        return new RedirectResponse(route('admin.bids.index'), ['flash_success' => trans('alerts.backend.bids.deleted')]);
    }
    
}