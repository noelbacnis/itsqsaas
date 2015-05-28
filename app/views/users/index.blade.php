@extends('default.client_navbar')

@section('content2')


<!-- Page Heading -->
    <div class="row">
       	<div class="col-lg-12">
            <h1 class="page-header"> Users </h1>
            <ol class="breadcrumb">
                <li> <i class="fa fa-dashboard"></i>  <a href="{{ action('client_dashboard') }}">Dashboard</a> </li>
               	<li class="active"> <i class="fa fa-table"></i> Users </li>
            </ol>
        </div>
    </div>

    <div class="row bottom-padding">
	    <div class="col-md-2">
	        {{ link_to_route('users.create', 'Add a User', $value=null, array('class' => 'btn btn-info col-md-12', 'style' => 'margin-right:5px')) }}
	        <br>
	    </div>
	    <div class="col-md-10"></div>
	</div>


	<div class="row">
	    <div class="col-md-12">
	    	@if (Session::has('flash_notice'))
		        <div class="alert alert-danger" id="msg" style="">{{ Session::get('flash_notice') }}</div>
		    @endif
			
			 <table class="table table-striped table-bordered">
			 	<thead>
			 		<tr>
			 			<th>ID</th>
			 			<th>Name</th>
			 			<th>Action</th>
			 		</tr>
			 	</thead>
			 	<tbody>
			 		@if ($users)
			 			@if ($users->count())
			 				@foreach ($users as $u)
				 				@if (!$u->username == 'admin')
				 					<tr>
					 					<td>{{ $u->id }}</td>
					 					<td></td>
					 					<td></td>
					 				</tr>
				 				@endif
				 			@endforeach
			 			@else
			 				<tr>
	                    		<td colspan="3"><center>There are no users</center></td>
	                    	</tr>
			 			@endif
			 		@endif
			 	</tbody>

			 </table>


		    <div class="pull-right">
	                {{ $users->links(); }}
	            </div>
		</div>
	</div>


@stop