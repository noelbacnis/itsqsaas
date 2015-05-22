
@extends('default.client_navbar')

@section('content2')

	<!-- Page Heading -->
    <div class="row">
       	<div class="col-lg-12">
            <h1 class="page-header"> Add a Customer </h1>
            <ol class="breadcrumb">
                <li> <i class="fa fa-dashboard"></i>  <a href="{{ action('client_dashboard') }}">Dashboard</a> </li>
                <li> <i class="fa fa-dashboard"></i>  <a href="{{ action('customers.index') }}">Customers</a> </li>
               	<li class="active"> <i class="fa fa-table"></i> Add a Customer </li>
            </ol>
        </div>
    </div>
    <!-- /.row -->

	<!-- Heading Buttons -->
	<div class="row bottom-padding">
	    <div class="col-md-2">
	    	<a href="{{ action('customers.index') }}" class="btn btn-info col-md-12"> <i class="fa fa-caret-left"></i> Back</a>
	        <br>
	    </div>
	    <div class="col-md-10"></div>
	</div>
	<!-- /.Heading Buttons -->

	<div class="row">
		<div class="col-md-12">
			
			<div class="panel panel-default">
		        <div class="panel-body" style="padding:50px 100px 15px 100px;">

		            @if ($errors->any())
		                <div class="alert alert-danger alert-dismissable" id="" style="">
		                    {{ implode('', $errors->all(':message <br>')) }}
		                </div>
		            @endif

					{{ Form::model($customer, array('method' => 'PATCH', 'class' => 'form-horizontal', 'route' => array('customers.update', $customer->id))) }}
		                <div class="form-group">
		                    {{ Form::label('first_name', 'First Name', array('class' => 'col-sm-3 control-label')) }}
		                    <div class="col-sm-9">
		                        {{ Form::text('first_name', $value=null, array('class' => 'form-control' , 'placeholder' => '')) }}
		                    </div>
		                </div>

		                <div class="form-group">
		                    {{ Form::label('last_name', 'Last Name', array('class' => 'col-sm-3 control-label')) }}
		                    <div class="col-sm-9">
		                        {{ Form::text('last_name', $value=null, array('class' => 'form-control' , 'placeholder' => '')) }}
		                    </div>
		                </div>

		                <div class="form-group">
		                    {{ Form::label('gender', 'Gender', array('class' => 'col-sm-3 control-label')) }}
		                    <div class="col-sm-9">
		                        {{ Form::select('gender', $gender, $value=null, array('class'=>'form-control')) }}
		                    </div>
		                </div>

		                Delivery Info

		                <div class="form-group">
		                    {{ Form::label('del_contact_number', 'Contact Number', array('class' => 'col-sm-3 control-label')) }}
		                    <div class="col-sm-9">
		                        {{ Form::text('del_contact_number', $value=null, array('class' => 'form-control' , 'placeholder' => '')) }}
		                    </div>
		                </div>

		                <div class="form-group">
		                    {{ Form::label('del_address_number', 'Address Number', array('class' => 'col-sm-3 control-label')) }}
		                    <div class="col-sm-9">
		                        {{ Form::text('del_address_number', $value=null, array('class' => 'form-control' , 'placeholder' => '')) }}
		                    </div>
		                </div>

		                <div class="form-group">
		                    {{ Form::label('del_address_baranggay', 'Baranggay', array('class' => 'col-sm-3 control-label')) }}
		                    <div class="col-sm-9">
		                        {{ Form::text('del_address_baranggay', $value=null, array('class' => 'form-control' , 'placeholder' => '')) }}
		                    </div>
		                </div>

		                <div class="form-group">
		                    {{ Form::label('del_address_municipal', 'Municipal', array('class' => 'col-sm-3 control-label')) }}
		                    <div class="col-sm-9">
		                        {{ Form::text('del_address_municipal', $value=null, array('class' => 'form-control' , 'placeholder' => '')) }}
		                    </div>
		                </div>

		                <div class="form-group">
		                    {{ Form::label('del_address_province', 'Province', array('class' => 'col-sm-3 control-label')) }}
		                    <div class="col-sm-9">
		                        {{ Form::text('del_address_province', $value=null, array('class' => 'form-control' , 'placeholder' => '')) }}
		                    </div>
		                </div>

		            </div>

		        <div class="panel-footer panel-footer-btn">
		            <div class="form-group">
		                    <div class="col-sm-offset-2 col-sm-10">
		                        {{ link_to_route('customers.index', 'Cancel', $value=null, array('class' => 'btn btn-info pull-right col-xs-2', 'style' => 'margin:5px')) }}
		                        {{ Form::submit('Update', array('class' => 'btn btn-info pull-right col-xs-2', 'style' => 'margin:5px')) }}
		                    </div>
		            </div>
		        </div>
		        {{ Form::close() }}

		         
		    </div>
		 
		</div>
	</div>



@stop