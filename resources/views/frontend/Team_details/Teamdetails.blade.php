@extends('frontend.layouts.app')

@section('content')


<table class="table table-striped table-hover">

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