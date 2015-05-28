@extends('default.client_navbar')

@section('content2')

<!-- Page Heading -->
    <div class="row">
       	<div class="col-lg-12">
            <h1 class="page-header"> Your Restaurant </h1>
            <ol class="breadcrumb">
                <li> <i class="fa fa-dashboard"></i>  <a href="{{ action('client_dashboard') }}">Dashboard</a> </li>
               	<li class="active"> <i class="fa fa-table"></i> Client </li>
            </ol>
        </div>
    </div>
    <!-- /.row -->

	<!-- Heading Buttons -->
	<div class="row bottom-padding">
	    
	    <div class="col-md-6">
	    	
	    	<table class="table table-striped table-bordered">
	    		<tr>
	    			<td><b>Restaurant Name:</b></td>
	    			<td>@if ($clients->name) {{ $clients->name }} @else {{ 'Not set' }} @endif</td>
	    		</tr>
	    		<tr>
	    			<td><b>Subscription Type:</b></td>
	    			<td>@if ($clients->subscription->subscription_type_id) {{ $clients->subscription->subscription_type_id }} @else {{ 'Not set' }} @endif</td>
	    		</tr>
	    		<tr>
	    			<td><b>Period:</b></td>
	    			<td>From {{ $clients->subscription->start_period }} <br>
	    				To {{ $clients->subscription->end_period }}</td>
	    		</tr>
	    		<tr>
	    			<td colspan="2">{{ link_to_route('clients.edit', 'Edit', array($clients->id), array('class' => 'btn btn-info col-md-5', 'style' => 'margin-right:5px')) }}</td>
	    		</tr>
	    	</table>
	    </div>
	</div>


@stop