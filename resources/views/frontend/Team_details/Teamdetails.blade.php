@extends('frontend.layouts.app')

@section('content')


<table class="table table-striped table-hover" style="background-color: #99e6ff;color: black;border-radius: 10px;">

		<tr>
        <th>{{ trans('Team name') }}</th>
        <th>{{ trans('Name') }}</th>
        <th>{{ trans('Price') }}</th>
      	</tr> 
        
      @foreach($data as $value)
        <tr>
        	
            <td>{{$value->Team_name}}</td>
            <td>{{$value->first_name}}</td>
             <td>{{$value->price}}</td>
        </tr>
      @endforeach
        
</table>

@endsection