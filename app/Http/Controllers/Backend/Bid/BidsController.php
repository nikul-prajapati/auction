<?php

namespace App\Http\Controllers\Backend\Bid;


use DB;
use App\Models\Bid\Bid;
use App\Models\Access\User\User;
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
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;


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
    protected $slug;

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


         //$id = Auth::user()->id;
       
        // $next = DB::table('users')->where('id', '>', $id)->limit(1);

        // $res['res'] = DB::table('users')
        // ->where('id', '=', $id)
       
        // ->unionAll($next)
        // ->get();


         $users['users'] = DB::table('users')->paginate(1);
         
   
        
        //return $this->art('id');

        //dd($res);
         // $nextUser = users::findNext($id);
          
         // return $this->single('slug');
         return view('backend.bids.index',$data,$users)->with('i', ($request->input('page', 1) - 1) * 5);
   
         //return view('backend.bids.index',$data,$users);

    }


    public function art($id)
    {   
        $data['data']=DB::table('teams')->get();

        $post = Post::find($id);

        // $previous = Post::where('id', '<', $post->id)->max('id');
        $next = Post::where('id', '>', $post->id)->min('id');

        return view('backend.bids.index',$data)->with('next', $next);
    }


    public function single($slug)
    {
        $data['data']=DB::table('teams')->get();
        $post = Post::where('slug', $slug)->firstOrFail();
        $next = Post::where('id', '>', $post->id)->orderBy('id')->first();
        return view('backend.bids.index',$data)->with(compact('post','next'));
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
        // //Create the model using repository create method
        // $this->repository->create($input);
        // //return with successfull message
        // return new RedirectResponse(route('admin.bids.index'), ['flash_success' => trans('alerts.backend.bids.created')]);

        // $request->validate(['pprice'=>'required|integer']);

        // $Bids = new Bids([
        //     'price'=>$request->get('pprice'),
        //     'teams_id'=> $request->get('team_id'),
        //     'id'=>$request->get('id')
        //     // ''=>$request->get(''),
        //     // ''=>$request->get('')
        // ]);

     
        // $Bids->save();
        // return redirect('');
    }

    public function bids(Request $request)
    {
        $request->validate(['pprice'=>'required|integer']);

        $Bids = new Bids([
            'price'=>$request->get('pprice'),
            'teams_id'=> $request->get('team_id'),
            'id'=>$request->get('id')
            // ''=>$request->get(''),
            // ''=>$request->get('')
        ]);

     
        $Bids->save();
        return redirect('/bids');
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
