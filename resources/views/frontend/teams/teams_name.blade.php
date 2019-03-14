@extends('frontend.layouts.app')

@section('content')



<table class="table table-striped table-hover">
    
    <tr>
        <th>{{ trans('Team name') }}</th>
      </tr> 

        

        @foreach($teams as $value)

        <tr>
        <td>{{ $value->Team_name }}</td>
        </tr>

        @endforeach


</table>

@endsection