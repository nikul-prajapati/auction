<?php

namespace App\Http\Controllers\Backend\Selectcaptain;
use DB;
use App\Models\Selectcaptain\Selectcaptain;
use App\Models\Team\team;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Responses\RedirectResponse;
use App\Http\Responses\ViewResponse;
use App\Http\Responses\Backend\Selectcaptain\CreateResponse;
use App\Http\Responses\Backend\Selectcaptain\EditResponse;
use App\Repositories\Backend\Selectcaptain\SelectcaptainRepository;
use App\Repositories\Backend\Team\TeamRepository;
use App\Repositories\Backend\Access\User\UserRepository;
use App\Http\Requests\Backend\Selectcaptain\ManageSelectcaptainRequest;
use App\Http\Requests\Backend\Selectcaptain\CreateSelectcaptainRequest;
use App\Http\Requests\Backend\Selectcaptain\StoreSelectcaptainRequest;
use App\Http\Requests\Backend\Selectcaptain\EditSelectcaptainRequest;
use App\Http\Requests\Backend\Selectcaptain\UpdateSelectcaptainRequest;
use App\Http\Requests\Backend\Selectcaptain\DeleteSelectcaptainRequest;

/**
 * SelectcaptainsController
 */
class SelectcaptainsController extends Controller
{
    /**
     * variable to store the repository object
     * @var SelectcaptainRepository
     */
    protected $repository;

    /**
     * contructor to initialize repository object
     * @param SelectcaptainRepository $repository;
     */
    public function __construct(SelectcaptainRepository $repository,TeamRepository $team, UserRepository $user)
    {
        $this->repository = $repository;
        $this->team = $team;
        $this->user = $user;
    }

    /**
     * Display a listing of the resource.
     *
     * @param  App\Http\Requests\Backend\Selectcaptain\ManageSelectcaptainRequest  $request
     * @return \App\Http\Responses\ViewResponse
     */
    public function index(ManageSelectcaptainRequest $request)
    {
        return new ViewResponse('backend.selectcaptains.index');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @param  CreateSelectcaptainRequestNamespace  $request
     * @return \App\Http\Responses\Backend\Selectcaptain\CreateResponse
     */
    public function create(CreateSelectcaptainRequest $request)
    {
        $data ['dat']=DB::select('SELECT * FROM users where (id<4) not in (select users_id from selectcaptains)');

         $data ['data']= DB::select('SELECT * FROM teams where id not in (select teamsiii954_id from selectcaptains)');
          return view('backend.selectcaptains.create',$data);

        
//$data['name']= DB::table('users')->where('users.id',notin( 'select users.id from users'))
//         ->join('selectcaptains', function ($join) {
//             $join->where('selectcaptains.users_id', '!=','users.id' );
//         })
//         ->get();

    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  StoreSelectcaptainRequestNamespace  $request
     * @return \App\Http\Responses\RedirectResponse
     */
    public function store(StoreSelectcaptainRequest $request)
    {
        //Input received from the request
        $input = $request->except(['_token']);
        //Create the model using repository create method
        $this->repository->create($input);
        //return with successfull message
        return new RedirectResponse(route('admin.selectcaptains.index'), ['flash_success' => trans('alerts.backend.selectcaptains.created')]);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  App\Models\Selectcaptain\Selectcaptain  $selectcaptain
     * @param  EditSelectcaptainRequestNamespace  $request
     * @return \App\Http\Responses\Backend\Selectcaptain\EditResponse
     */
    public function edit(Selectcaptain $selectcaptain, EditSelectcaptainRequest $request)
    {
         // $data ['data']=DB::table('teams')->first();
         // $data ['name']=DB::table('users')->where('users.id','>',2)->first();
        $user=$this->user->getAll();
        $team=$this->team->getAll();

        return new EditResponse($selectcaptain,$user,$team);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  UpdateSelectcaptainRequestNamespace  $request
     * @param  App\Models\Selectcaptain\Selectcaptain  $selectcaptain
     * @return \App\Http\Responses\RedirectResponse
     */
    public function update(UpdateSelectcaptainRequest $request, Selectcaptain $selectcaptain)
    {
        //Input received from the request
        $input = $request->except(['_token']);
        //Update the model using repository update method
        $this->repository->update( $selectcaptain, $input );
        //return with successfull message
        return new RedirectResponse(route('admin.selectcaptains.index'), ['flash_success' => trans('alerts.backend.selectcaptains.updated')]);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  DeleteSelectcaptainRequestNamespace  $request
     * @param  App\Models\Selectcaptain\Selectcaptain  $selectcaptain
     * @return \App\Http\Responses\RedirectResponse
     */
    public function destroy(Selectcaptain $selectcaptain, DeleteSelectcaptainRequest $request)
    {
        //Calling the delete method on repository
        $this->repository->delete($selectcaptain);
        //returning with successfull message
        return new RedirectResponse(route('admin.selectcaptains.index'), ['flash_success' => trans('alerts.backend.selectcaptains.deleted')]);
    }
    
}
