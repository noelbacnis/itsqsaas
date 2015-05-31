@extends('default.admin_navbar')

@section('content2')

	<!-- Page Heading -->
    <div class="row">
       	<div class="col-lg-12">
            <h1 class="page-header"> Subscription </h1>
           <ol class="breadcrumb">
                <li> <i class="fa fa-dashboard"></i>  <a href="{{ action('admin_dashboard') }}">Dashboard</a> </li>
               	<li> <i class="fa fa-table"></i> Subscriptions </li>
               	<li class="active"> <i class="fa fa-table"></i> View </li>
            </ol>
        </div>
    </div>
    <!-- /.row -->

	<!-- Heading Buttons -->
	<div class="row bottom-padding">
	    <div class="col-md-2">
	    	<a href="{{ action('subscriptions.index') }}" class="btn btn-info col-md-12"> <i class="fa fa-caret-left"></i> Back</a>
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
		    

		   <!--  <th>ID</th>
		    			<th>Subscription Type</th>
		    			<th>Payment Transaction Number</th>
		    			<th>Total Amount</th>
		    			<th>Start Date</th>
		    			<th>End Date</th>
		    			<th>Status</th>
		    			<th>Actions</th> -->
	            <table class="table table-striped table-bordered">
	                <tbody>
	                    <tr>
	                        <td>Subscription Number</td>
	                        <td>{{ $subscription->id }}</td>
	                    </tr>

	                    <tr>
	                        <td>Subscription Type</td>
	                        <td>{{ $subscription->subscriptionsType->name }}</td>
	                    </tr>
						<tr>
	                        <td>Payment Transaction Number</td>
	                        <td>{{ $subscription->transaction_number }}</td>
	                    </tr>
	                    <tr>
	                        <td>Email</td>
	                        <td>{{ $subscription->clients->email }}</td>
	                    </tr>
	                    <tr>
	                        <td>Total Amount</td>
	                        <td>{{ $subscription->total_amount }}</td>
	                    </tr>
	                    <tr>
	                        <td>Start Date</td>
	                        <td>{{ $subscription->start_period }}</td>
	                    </tr>
	                    <tr>
	                        <td>End Date</td>
	                        <td>{{ $subscription->end_period }}</td>
	                    </tr>
	                    <tr>
	                        <td>Status</td>
	                        <td>{{ $subscription->clients->status }}</td>
	                    </tr>
	                </tbody>
	               
	            </table>




	         
	    </div>
	</div>



@stop