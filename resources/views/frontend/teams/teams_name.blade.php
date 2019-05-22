@extends('frontend.layouts.app')

@section('content')




<table class="table table-hover" style="
    background-color: #99e6ff;
    color: black;
    border-radius: 10px;">
    
    <tr style="background-color: white;">
        <th>{{ trans('Team name') }}</th>
      </tr> 

        

        @foreach($teams as $value)

        <tr>
        <td>{{ $value->Team_name }}</td>
        </tr>

        @endforeach


</table>

@endsection