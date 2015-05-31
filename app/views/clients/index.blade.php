@extends('default.admin_navbar')

@section('content2')

<!-- Page Heading -->
    <div class="row">
       	<div class="col-lg-12">
            <h1 class="page-header"> Clients </h1>
            <ol class="breadcrumb">
                <li> <i class="fa fa-dashboard"></i>  <a href="{{ action('client_dashboard') }}">Dashboard</a> </li>
               	<li class="active"> <i class="fa fa-table"></i> Clients </li>
            </ol>
        </div>
    </div>
    <!-- /.row -->

	<!-- Heading Buttons -->
	<div class="row bottom-padding">
	    
	    <div class="col-md-12">
	    	 <table class="table table-striped table-bordered">
		    	<thead>
		    		<tr>
		    			<th>Name</th>
		    			<th>Domain</th>
		    			<th>Email</th>
		    			<th>Contact Number</th>
		    			<th>Status</th>
		    			<th>Date Created</th>
		    			<th>Actions</th>
		    		</tr>
		    	</thead>
		    	<tbody>
		    		@if ($clients->count())
						@foreach ($clients as $c)
							<tr>
								<td>{{ $c->name }}</td>
								<td>{{ $c->domain }}</td>
								<td>{{ $c->email }}</td>
								<td>{{ $c->contact_number }}</td>
								<td>{{ $c->status }}</td>
								<td>{{ $c->created_at }}</td>
								<td>
									{{ link_to_route('clients.show', 'View', array($c->id), array('class' => 'btn btn-info col-md-5', 'style' => 'margin-right:5px')) }}
		                                
		                                @if ($c->status == 'INACTIVE')
		                                	{{ link_to_route('client_change_status', 'Activate', array($c->id,'ACTIVE'), array('class' => 'btn btn-danger col-md-6', 'style' => 'margin-right:5px')) }}
			                            @elseif ($c->status == 'ACTIVE')                   
			                                {{ link_to_route('client_change_status', 'Deactivate', array($c->id,'INACTIVE'), array('class' => 'btn btn-success col-md-6', 'style' => 'margin-right:5px')) }}
		                                @endif
	                                	
		                          
								</td>
							</tr>
						@endforeach
					@endif
		    	</tbody>
		    </table>
	    </div>
	</div>


@stop