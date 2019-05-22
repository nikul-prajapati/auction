@extends('frontend.layouts.app')

@section('content')


<table class="table table-striped table-hover">

	
        
      @foreach($data as $value)
        <tr>
            <td>{{$value->first_name}}</td>
            <td>{{$value->price}}</td>
        </tr>
      @endforeach
        
</table>

@endsection