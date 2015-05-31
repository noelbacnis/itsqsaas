@extends('default.client_navbar')

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
		    			<th>Payment Transaction Number</th>
		    			<th>Total Amount</th>
		    			<th>Start Date</th>
		    			<th>End Date</th>
		    			<th>Status</th>
		    		</tr>
		    	</thead>
		    	<tbody>
		    		@if ($subscriptions->count())
						@foreach ($subscriptions as $s)
							@if ($s->clients->status == 'INACTIVE')
							<tr class="danger">
							@else
							<tr>
							@endif
								<td>{{ $s->id }}</td>
								<td>{{ $s->subscriptionsType->name }}</td>
								<td>{{ $s->transaction_number }}</td>
								<td>{{ $s->total_amount }}</td>
								<td>{{ $s->start_period }}</td>
								<td>{{ $s->end_period }}</td>
								<td>{{ $s->clients->status}}</td>
								
							</tr>
						@endforeach
					@endif
		    	</tbody>
		    </table>
			
			
		</div>
	</div>
@stop