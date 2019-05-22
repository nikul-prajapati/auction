<?php

namespace App\Http\Controllers\Backend\Bidding;

use App\Models\Bidding\Bidding;
use DB;
use App\Models\Access\User\User;
use App\Models\Selectcaptain\Selectcaptain;
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
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Input;
use Illuminate\Pagination\LengthAwarePaginator;

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
        //Fetch the data of team table
        $data = DB::table('teams')->get();
        
       
        //Fetch the users_id of bidding table
        $biddingUsers = Bidding::select('users_id')->pluck('users_id')->toArray();
        //Fetch the users_is of selectcaptain table 
        $Captains = Selectcaptain::select('users_id')->pluck('users_id')->toArray();

        // $page = $request->get('page', 1);
        // //$page = Input::get('page', 1);
        // $perPage = 1;
        // $offset = ($page * $perPage) - $perPage;
       
        $users = User::select('users.*', 'player_information.filename','selectcaptains.users_id')
            ->leftjoin('player_information', 'player_information.users_id', 'users.id')
            ->leftjoin('selectcaptains', 'selectcaptains.users_id', 'users.id')
            ->whereNotIn('users.id', $biddingUsers)
            ->whereNotIn('users.id', $Captains)
            // ->offset($offset)->limit($perPage)
            ->get()->toArray();
            // whereNotIn('users.id', $Captains)->get()->toArray()

        //call to the arraypaginator function
        $users = $this->arrayPaginator($users, $request);
        
        return view('backend.biddings.create',array('data'=>$data,'users'=>$users))->render();

       
    }


    public function arrayPaginator($array, $request)
    {
        //get the pagenumber
        $page = $request->get('page', 1);
        //set the limit to show the data per page
        $perPage = 1;
        $offset = ($page * $perPage) - $perPage;

        return new LengthAwarePaginator(array_slice($array, $offset, $perPage, true), count($array), $perPage, $page,
            ['path' => $request->url(), 'query' => $request->query()]);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  StoreBiddingRequestNamespace  $request
     * @return \App\Http\Responses\RedirectResponse
     */
    public function store(StoreBiddingRequest $request)
    {
         //get the team id which we have selected
         $a=$request->get('teams_id');
         //get the price which we have entered
         $b=$request->get('price');
         //query to fetch the available points of the team selected
         $result=DB::select('select Available_points from teams where id=?',[$a]);   
         $c = $result ? $result[0]->Available_points : 0;
         
         
         if ($c <= $b) 
         {
             echo "please choose another team ";
             return view('frontend/notification');
         }
         else
         {
            //Here we are deducting the entered points from available points
              DB::update('UPDATE teams set Available_points=Available_points-? where id=?',[$b,$a]);
         }


        //Input received from the request
        $input = $request->except(['_token']);
        //Create the model using repository create method
        $this->repository->create($input);


      //   $biddingUsers = Bidding::select('users_id')->pluck('users_id')->toArray();
      //   $Captains = Selectcaptain::select('users_id')->pluck('users_id')->toArray();
        
      //   $page = $request->get('page',1);
      //   $perPage = 1;
      //   $offset = ($page * $perPage) - $perPage;
      //   //dd($Captains);
      //   $users = User::select('users.*', 'player_information.filename','selectcaptains.users_id')
      //       ->leftjoin('player_information', 'player_information.users_id', 'users.id')
      //       ->leftjoin('selectcaptains', 'selectcaptains.users_id', 'users.id')
      //       ->whereNotIn('users.id', $biddingUsers)
      //       ->whereNotIn('users.id', $Captains)
      //       ->offset($offset)->limit($perPage)
      //       ->get()->toArray();
      //       // whereNotIn('users.id', $Captains)->get()->toArray()


      //    $users = $this->arrayPaginator($users, $request);

      //   //return with successfull message
      return new RedirectResponse(route('admin.biddings.create'), ['flash_success' => trans('alerts.backend.biddings.created')]);

      //  $returnHTML = view('backend.biddings.create_form')->with('users', $users)->render();
      //  return response()->json(array('success' => true, 'html'=>$returnHTML));
      //  //return response()->json(['success' => true, 'user' => json_encode($returnHTML)]);
      // //return response()->json(['success' => true]);
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
