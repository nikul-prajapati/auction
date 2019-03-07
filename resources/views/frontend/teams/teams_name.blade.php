@extends('frontend.layouts.app')

@section('content')



<table class="table table-striped table-hover">
    
    <tr>
        <th>{{ trans('Team name') }}</th>
      </tr> 

        <tr>
        	<?php 
        		$tm = DB::table('teams')->select('Team_name')->get();
        		foreach ($tm as $res) {
        			?>
        		<tr>
        			<td>
        			{{ $res->Team_name }}
        		</td>
        		</tr>
        		<?php }

        		//dd($res)
        	?>
        </tr>
        	<!-- @section('after-scripts')
        	 {{-- For DataTables --}}
    {{ Html::script(mix('js/dataTable.js')) }}

    <script>
        //Below written line is short form of writing $(document).ready(function() { })
        $(function() {
            var dataTable = $('#teams-table').dataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: '{{ route("admin.team_fr.get") }}',
                    type: 'post'
                },
                columns: [
                    
                    {data: 'Team_name', name: '{{config('module.teams.table')}}.Team_name'},
                    
                ],
                
            });

            Backend.DataTableSearch.init(dataTable);
        });
    </script>
@endsection -->
       

        <!-- <td>{{ !empty($logged_in_user->first_name) ? $logged_in_user->first_name : '' }}</td>
    --> 

</table>

@endsection