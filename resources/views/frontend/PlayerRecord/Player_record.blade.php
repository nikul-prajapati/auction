@extends('frontend.layouts.app')

@section('content')


<table class="table table-striped table-hover">

	<h4>Name: {{ Auth::user()->first_name }}</h4>
   
        
        @foreach($data as $value)
        <tr>
          
        	<th><td>{{ trans('Match Played') }}</td></th>
            <td>{{$value->played_match}}</td></tr>
           <tr>	<th><td>{{ trans('Total Runs') }}</td></th>
            <td>{{$value->total_runs}}</td></tr>
          <tr><th><td>{{ trans('Total Wickets') }}</td></th>
            <td>{{$value->total_wickets}}</td></tr>
            <tr><th><td>{{ trans('Speciality') }}</td></th>
            <td>{{$value->speciality}}</td></tr>
           <tr><th><td>{{ trans('Batsman Type') }}</td></th>
            <td>{{$value->batsman_type}}</td></tr>
            <tr><th><td>{{ trans('Bowler Type') }}</td></th>
            <td>{{$value->bowler_type}}</td></tr>
            <tr><th><td>{{ trans('Age') }}</td></th>
            <td>{{$value->age}}</td>
        </tr>
        @endforeach
@endsection