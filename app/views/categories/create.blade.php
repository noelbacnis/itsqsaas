
@extends('default.client_navbar')

@section('content2')

	<!-- Page Heading -->
    <div class="row">
       	<div class="col-lg-12">
            <h1 class="page-header"> Add a Category </h1>
            <ol class="breadcrumb">
                <li> <i class="fa fa-dashboard"></i>  <a href="{{ action('client_dashboard') }}">Dashboard</a> </li>
                <li> <i class="fa fa-dashboard"></i>  <a href="{{ action('categories.index') }}">Categories</a> </li>
               	<li class="active"> <i class="fa fa-table"></i> Add a Category </li>
            </ol>
        </div>
    </div>
    <!-- /.row -->

	<!-- Heading Buttons -->
	<div class="row bottom-padding">
	    <div class="col-md-2">
	    	<a href="{{ action('categories.index') }}" class="btn btn-info col-md-12"> <i class="fa fa-caret-left"></i> Back</a>
	        <br>
	    </div>
	    <div class="col-md-10"></div>
	</div>
	<!-- /.Heading Buttons -->

	<div class="row">
		<div class="col-md-12">
			{{ Form::open(array('route' => 'categories.store' , 'class' => 'form-horizontal')) }}
			<div class="panel panel-default">
		        <div class="panel-body" style="padding:50px 100px 15px 100px;">

		            @if ($errors->any())
		                <div class="alert alert-danger alert-dismissable" id="" style="">
		                    {{ implode('', $errors->all(':message <br>')) }}
		                </div>
		               
		            @endif
		            
		                <div class="form-group">
		                    {{ Form::label('name', 'Category Name', array('class' => 'col-sm-3 control-label')) }}
		                    <div class="col-sm-9">
		                        {{ Form::text('name', $value=null, array('class' => 'form-control' , 'placeholder' => '')) }}
		                    </div>
		                </div>
		        </div>

		        <div class="panel-footer panel-footer-btn">
		            <div class="form-group">
		                    <div class="col-sm-offset-2 col-sm-10">
		                        {{ link_to_route('categories.index', 'Cancel', $value=null, array('class' => 'btn btn-info pull-right col-xs-2', 'style' => 'margin:5px')) }}
		                        {{ Form::reset('Clear', array('class' => 'btn btn-info pull-right col-xs-2', 'style' => 'margin:5px')) }}
		                        {{ Form::submit('Add', array('class' => 'btn btn-info pull-right col-xs-2', 'style' => 'margin:5px')) }}
		                    </div>
		            </div>
		        </div>

		         
		    </div>
		    {{ Form::close() }}
		</div>
	</div>



@stop