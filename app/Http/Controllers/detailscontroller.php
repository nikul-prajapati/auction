<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\details;
use App\Repositories\frontend\access\user\detailsRepository;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use App\Models\Player_Information\Playerinformation;
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

class detailscontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('frontend.auth.details');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         // return view('frontend.auth.details');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)

    {
      
         $request->validate([
        'match'=> 'required|integer',
        'runs' => 'required|integer',
        'wickets' => 'required|integer',
        'age' => 'required|integer', 
        ]);

        if($request->hasfile('filename'))
        {
            foreach($request->file('filename') as $image)
            {   
                //get the original name of the image
                $name=$image->getClientOriginalName();
                //path where image has to be stored
                $image->move(public_path().'/img/frontend/pics/', $name);  
                $data = $name;  
            }
         }

        
        //condition to check that records for users are stored or not   
        if (playerinformation::where('users_id', '=', $request->get('users_id'))->exists())
        {
             return redirect('/dashboard')->with(['flash_success' => trans('Record already exists')]);
   
        }
        else
        {
                 $details = new playerinformation([
                'played_match' => $request->get('match'),
                'total_runs'=> $request->get('runs'),
                'total_wickets'=> $request->get('wickets'),  
                'speciality'=> $request->get('type'),
                'batsman_type'=> $request->get('batsman'),
                'bowler_type'=> $request->get('bowler'),
                'age'=>$request->get('age'),
                'users_id'=>$request->get('users_id'),
                 ]);
                $details->filename=$data;
              
                $details->save();
                return redirect('/dashboard')->with('success', 'successfully details udm_check_stored(agent, link, doc_id)');

        }
  
    }

   

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
