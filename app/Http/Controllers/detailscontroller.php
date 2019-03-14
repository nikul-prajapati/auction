<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\details;
use App\Repositories\frontend\access\user\detailsRepository;





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
      //   $request->validate([
      //   'match'=> 'required|integer',
      //   'runs' => 'required|integer',
      //   'wickets' => 'required|integer'
      // ]);
      // $details = new details([
      //   'p_match' => $request->get('match'),
      //   'p_run'=> $request->get('runs'),
      //   'p_wickets'=> $request->get('wickets'),  
      //    'type'=> $request->get('type'),
      //     'batsman'=> $request->get('batsman'),
      //      'bowler'=> $request->get('bowler'),
      // ]);
      // $details->save();
      // return redirect('/login');


         $request->validate([
        'match'=> 'required|integer',
        'runs' => 'required|integer',
        'wickets' => 'required|integer',
        'age' => 'required|integer'
      ]);

      $details = new playerinformation([
        'played_match' => $request->get('match'),
        'total_run'=> $request->get('runs'),
        'total_wickets'=> $request->get('wickets'),  
        'speciality'=> $request->get('type'),
        'batsman_type'=> $request->get('batsman'),
        'bowler_type'=> $request->get('bowler'),
        'age'=>$request->get('age')
      ]);
      $details->save();
      return redirect('/dashboard');

         //$details = self::MODEL;
        // $details = new $details();
        // $details->p_match = $request['match'];
        // $details->p_runs = $request['runs'];
        // $details->p_wickets = $request['wickets'];
        // $details->type = $request['type'];
        // $details->batsman = $request['batsman'];
        // $details->bowler = $request['bowler'];
        // $details->save();
        // return redirect('/aboutus');

        // $details = $this->details->create($request->only('match', 'runs', 'wickets', 'type', 'batsman','bowler'));

        
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
