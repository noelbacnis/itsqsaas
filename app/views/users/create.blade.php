
@extends('default.client_navbar')

@section('content2')

<!-- Page Heading -->
    <div class="row">
       	<div class="col-lg-12">
            <h1 class="page-header"> Add a User </h1>
            <ol class="breadcrumb">
                <li> <i class="fa fa-dashboard"></i>  <a href="{{ action('client_dashboard') }}">Dashboard</a> </li>
                <li> <i class="fa fa-dashboard"></i>  <a href="{{ action('products.index') }}">Users</a> </li>
               	<li class="active"> <i class="fa fa-table"></i> Add a User </li>
            </ol>
        </div>
    </div>
    <!-- /.row -->

	<!-- Heading Buttons -->
	<div class="row bottom-padding">
	    <div class="col-md-2">
	    	<a href="{{ action('users.index') }}" class="btn btn-info col-md-12"> <i class="fa fa-caret-left"></i> Back</a>
	        <br>
	    </div>
	    <div class="col-md-10"></div>
	</div>



@stop