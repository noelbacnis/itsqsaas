@extends('default.client_navbar')

@section('content2')

	<!-- Page Heading -->
    <div class="row">
       	<div class="col-lg-12">
            <h1 class="page-header"> Orders </h1>
            <ol class="breadcrumb">
                <li> <i class="fa fa-dashboard"></i>  <a href="{{ action('client_dashboard') }}">Dashboard</a> </li>
               	<li class="active"> <i class="fa fa-table"></i> Orders </li>
            </ol>
        </div>
    </div>
    <!-- /.row -->

	<!-- Heading Buttons -->
	<!-- <div class="row bottom-padding">
	    <div class="col-md-2">
	        {{ link_to_route('orders.create', 'Add an Order', $value=null, array('class' => 'btn btn-info col-md-12', 'style' => 'margin-right:5px')) }}
	        <br>
	    </div>
	    <div class="col-md-10"></div>
	</div> -->
	<!-- /.Heading Buttons -->

	<div class="row">
	    <div class="col-md-12">
	    	@if (Session::has('flash_notice'))
		        <div class="alert alert-danger" id="msg" style="">{{ Session::get('flash_notice') }}</div>
		    @endif
		    
	      
	            <table class="table table-striped table-bordered">
	                <thead>
	                    <tr>
	                        <th>Order Number</th>
	                        <th>Date Created</th>
	                        <th>Date Updated</th>
	                        <th>Total</th>
	                        <th>Change For</th>
	                        <th>Customer Name</th>
	                        <th>Status</th>
	                        <th>Action</th>
	                    </tr>
	                </thead>
	                <tbody>
	                	@if ($orders->count())
		                    @foreach ($orders as $order)
		                        <tr>
		                            <td class="col-md-1">{{ $order->id }}</td>
		                            <td class="col-md-2">{{ $order->created_at }}</td>
		                            <td class="col-md-2">{{ $order->updated_at }}</td>
		                            <td class="col-md-2">{{ $order->total }}</td>
		                            <td class="col-md-1">{{ $order->cash }}</td>
		                            <td class="col-md-1">{{ $order->customer['first_name'].' '.$order['customer->last_name'] }}</td>
		                            <td class="col-md-1">{{ $order->status }}</td>

		                            <td class="col-md-3">
		                                {{ link_to_route('orders.show', 'View', array($order->id), array('class' => 'btn btn-info col-md-5', 'style' => 'margin-right:5px')) }}
		                                
		                                @if ($order->status == 'FOR APPROVAL' || $order->status == 'REJECTED' )
		                                	{{ link_to_route('order_change_status', 'Approve', array($order->id,'APPROVED'), array('class' => 'btn btn-info col-md-5', 'style' => 'margin-right:5px')) }}
			                            @elseif ($order->status == 'APPROVED')                   
			                                {{ link_to_route('order_change_status', 'Reject', array($order->id,'REJECTED'), array('class' => 'btn btn-info col-md-5', 'style' => 'margin-right:5px')) }}
		                                @endif
		                            </td>
		                        </tr>
		                    @endforeach
	                    @else
	                    	<tr>
	                    		<td colspan="8"><center>There are no orders</center></td>
	                    	</tr>
				        @endif
	                </tbody>
	            </table>

	            <div class="pull-right">
	                {{ $orders->links(); }}
	            </div>
	            
	    </div>
	</div>



@stop