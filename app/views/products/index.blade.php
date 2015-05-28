@extends('default.client_navbar')

@section('content2')

	<!-- Page Heading -->
    <div class="row">
       	<div class="col-lg-12">
            <h1 class="page-header"> Products </h1>
            <ol class="breadcrumb">
                <li> <i class="fa fa-dashboard"></i>  <a href="{{ action('client_dashboard') }}">Dashboard</a> </li>
               	<li class="active"> <i class="fa fa-table"></i> Products </li>
            </ol>
        </div>
    </div>
    <!-- /.row -->

	<!-- Heading Buttons -->
	<div class="row bottom-padding">
	    <div class="col-md-2">
	        {{ link_to_route('products.create', 'Add a Product', $value=null, array('class' => 'btn btn-info col-md-12', 'style' => 'margin-right:5px')) }}
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
		    
	        @if ($products->count())
	            <table class="table table-striped table-bordered">
	                <thead>
	                    <tr>
	                        <th>Product Name</th>
	                        <th>Price</th>
	                        <th>Photo</th>
	                        <th>Category</th>
	                        <th>Status</th>
	                        <th>Action</th>
	                    </tr>
	                </thead>
	                <tbody>
	                    @foreach ($products as $product)
	                    	<!-- <pre>
	                    	<?php print_r($product)?>
	                        </pre> -->
	                        <tr>
	                            <td class="col-md-2">{{ $product->name }}</td>
	                            <td class="col-md-1">{{ $product->price }}</td>
	                            <td class="col-md-2"> </td>
	                            <td class="col-md-2">{{ $product->category['name'] }}</td>
	                            <td class="col-md-2">{{ $product->status }}</td>

	                            <td class="col-md-3">
	                                {{ link_to_route('products.edit', 'Edit', array($product->id), array('class' => 'btn btn-info col-md-5', 'style' => 'margin-right:5px')) }}
	                                
	                                @if ($product->orderProducts->count() == 0)
	                                	{{ Form::open(array('method'=> 'DELETE', 'route' => array('products.destroy', $product->id))) }}    
	                                		{{ Form::submit('Delete', array('class'=> 'btn btn-danger col-md-5')) }}
		                                {{ Form::close() }}
		                            @elseif ($product->orderProducts->count() > 0)                      
		                                {{ Form::submit('Delete', array('class'=> 'btn btn-danger col-md-5', 'style' => '', 'disabled')) }}
	                                @endif
	                                
	                            </td>
	                        </tr>
	                    @endforeach
	                </tbody>
	            </table>

	            <div class="pull-right">
	                {{ $products->links(); }}
	            </div>
	            
	        @else
	            There are no products
	        @endif
	    </div>
	</div>



@stop