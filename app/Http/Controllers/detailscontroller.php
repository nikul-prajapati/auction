<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\details;
use App\Repositories\frontend\access\user\detailsRepository;


class detailscontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         return view('frontend.auth.details');
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
        'wickets' => 'required|integer'
      ]);
      $details = new details([
        'p_match' => $request->get('match'),
        'p_run'=> $request->get('runs'),
        'p_wickets'=> $request->get('wickets'),  
         'type'=> $request->get('type'),
          'batsman'=> $request->get('batsman'),
           'bowler'=> $request->get('bowler'),
      ]);
      $details->save();
      return redirect('/login');

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
