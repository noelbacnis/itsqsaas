@extends('default.client_navbar')

@section('content2')

	<!-- Page Heading -->
    <div class="row">
       	<div class="col-lg-12">
            <h1 class="page-header"> Customers </h1>
            <ol class="breadcrumb">
                <li> <i class="fa fa-dashboard"></i>  <a href="{{ action('client_dashboard') }}">Dashboard</a> </li>
               	<li class="active"> <i class="fa fa-table"></i> Customers </li>
            </ol>
        </div>
    </div>
    <!-- /.row -->

	<!-- Heading Buttons -->
	<div class="row bottom-padding">
	    <div class="col-md-2">
	        {{ link_to_route('customers.create', 'Add a Customer', $value=null, array('class' => 'btn btn-info col-md-12', 'style' => 'margin-right:5px')) }}
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
		    
	        @if ($customers->count())
	            <table class="table table-striped table-bordered">
	                <thead>
	                    <tr>
	                        <th>Last Name</th>
	                        <th>First Name</th>
	                        <th>Gender</th>
	                        <th>Contact Number</th>
	                        <th>Status</th>
	                        <th>Action</th>
	                    </tr>
	                </thead>
	                <tbody>
	                    @foreach ($customers as $customer)
	                        <tr>
	                            <td class="col-md-2">{{ $customer->last_name }}</td>
	                            <td class="col-md-2">{{ $customer->first_name }}</td>
	                            <td class="col-md-2">{{ $customer->gender }}</td>
	                            <td class="col-md-1">{{ $customer->del_contact_number }}</td>
	                            <td class="col-md-2">{{ $customer->status }}</td>

	                            <td class="col-md-3">
	                                {{ link_to_route('customers.edit', 'Edit', array($customer->id), array('class' => 'btn btn-info col-md-5', 'style' => 'margin-right:5px')) }}
	                                
	                                @if ($customer->orders->count() == 0)
	                                	{{ Form::open(array('method'=> 'DELETE', 'route' => array('customers.destroy', $customer->id))) }}    
	                                		{{ Form::submit('Delete', array('class'=> 'btn btn-danger col-md-5')) }}
		                                {{ Form::close() }}
		                            @elseif ($customer->orderCustomers->count() > 0)                      
		                                {{ Form::submit('Delete', array('class'=> 'btn btn-danger col-md-5', 'style' => '', 'disabled')) }}
	                                @endif
	                                
	                            </td>
	                        </tr>
	                    @endforeach
	                </tbody>
	            </table>

	            <div class="pull-right">
	                {{ $customers->links(); }}
	            </div>
	            
	        @else
	            There are no customers
	        @endif
	    </div>
	</div>



@stop