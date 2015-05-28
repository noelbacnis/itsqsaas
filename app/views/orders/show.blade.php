@extends('default.client_navbar')

@section('content2')

	<!-- Page Heading -->
    <div class="row">
       	<div class="col-lg-12">
            <h1 class="page-header"> Orders </h1>
            <ol class="breadcrumb">
                <li> <i class="fa fa-dashboard"></i>  <a href="{{ action('client_dashboard') }}">Dashboard</a> </li>
               	<li> <i class="fa fa-table"></i> <a href="{{ action('orders.index') }}">Orders</a> </li>
               	<li class="active"> <i class="fa fa-table"></i> View </li>
            </ol>
        </div>
    </div>
    <!-- /.row -->

		<!-- Heading Buttons -->
	<div class="row bottom-padding">
	    <div class="col-md-2">
	    	<a href="{{ action('orders.index') }}" class="btn btn-info col-md-12"> <i class="fa fa-caret-left"></i> Back</a>
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


			@if(isset($order))
		      		<div class="panel panel-default">
                    	<div class="panel-heading"  style="background-color: white">Customer Information</div>
                        <div class="panel-body"  style=" margin-bottom: -20px;">
                            <table class="table" cellpadding="5" >    
										<tr>
											<th>Firstname: </th>
											<td>{{ $order->first_name }}</td>
										</tr>
										<tr>
											<th>Lastname: </th>
											<td>{{ $order->last_name }}</td>
										</tr>
										<tr>
											<th>Contact Number: </th>
											<td>{{ $order->del_contact_number }}</td>
										</tr>
                                        <tr>
											<th>Email: </th>
											<td>{{ $order->email }}</td>
										</tr>
                                        <tr>
											<th>Address Number: </th>
											<td>{{ $order->del_address_number }}</td>
										</tr>
                                        <tr>
											<th>Baranggay: </th>
											<td>{{ $order->del_address_baranggay }}</td>
										</tr>
                                        <tr>
											<th>Province: </th>
											<td>{{ $order->del_address_province }}</td>
										</tr>
                                        <tr>
											<th>Message: </th>
											<td>{{ $order->del_message }}</td>
										</tr>
							</table>
                       	</div>
                	</div>
                	




            <div class="panel panel-default" style="background-color:#fcf8e3">
                <div class="panel-heading"  style="background-color:#fcf8e3">
                    Orders
                    <div class="pull-right"><b>( TOTAL AMOUNT - {{ $order->total }} )</b></div>
                </div>

                <div class="panel-body"  style=" margin-bottom: -20px;">
                    <table class="table" cellpadding="5" >
						<tr>
							<th>Product Name: </th>
                            <th>Unit Price: </th>
                            <th>Quantity: </th>
                            <th>Total Price: </th>
						</tr>
							@foreach($order->orderProducts as $op)
                            	<tr>
                                    <td>{{ $op->product->name }}</td>
                                    <td>{{ $op->product->price }}</td>
                                    <td>{{ $op->quantity }}</td>
                                    <td>{{ $op->product->price * $op->quantity }}</td>
								</tr>
							@endforeach
                    </table>
                </div>
            </div>
                      
	            
                           
		    
			@endif
	           
	            
	    </div>
	</div>






@stop