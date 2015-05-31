@extends('default.admin_navbar')

@section('content2')


<!-- Page Heading -->
    <div class="row">
       	<div class="col-lg-12">
            <h1 class="page-header"> Subscriptions </h1>
            <ol class="breadcrumb">
                <li> <i class="fa fa-dashboard"></i>  <a href="{{ action('client_dashboard') }}">Dashboard</a> </li>
               	<li class="active"> <i class="fa fa-table"></i> Subscriptions </li>
            </ol>
        </div>
    </div>
    <!-- /.row -->

	<!-- Heading Buttons -->
	<div class="row bottom-padding">
	    <div class="col-md-2">
	        {{ link_to_route('subscriptions.create', 'Add a Subscription', $value=null, array('class' => 'btn btn-info col-md-12', 'style' => 'margin-right:5px')) }}
	        <br>
	    </div>
	    <div class="col-md-10"></div>
	</div>
	<!-- /.Heading Buttons -->
	
	<div class="row">
	    <div class="col-md-12">
	    	@if (Session::has('flash_notice'))
		        <div class="alert alert-danger" id="msg" style="">{{ Session::get('flash_notice') }}</div>
		    @endif

		    <table class="table table-striped table-bordered">
		    	<thead>
		    		<tr>
		    			<th>ID</th>
		    			<th>Subscription Type</th>
		    			<th>Transaction Number</th>
		    			<th>Total Amount</th>
		    			<th>Start Date</th>
		    			<th>End Date</th>
		    			<th>Actions</th>
		    		</tr>
		    	</thead>
		    	<tbody>
		    		@if ($subscriptions->count())
						@foreach ($subscriptions as $s)
							<tr>
								<td>{{ $s->id }}</td>
								<td>{{ $s->subscription_type_id }}</td>
								<td>{{ $s->transaction_number }}</td>
								<td>{{ $s->total_amount }}</td>
								<td>{{ $s->start_period }}</td>
								<td>{{ $s->end_period }}</td>
								<td>
									{{ link_to_route('subscriptions.edit', 'Edit', array($s->id), array('class' => 'btn btn-info col-md-5', 'style' => 'margin-right:5px')) }}
	                                
	                               
	                                	
		                          
								</td>
							</tr>
						@endforeach
					@endif
		    	</tbody>
		    </table>
			
			
		</div>
	</div>
@stop