@extends('layouts.master')

@section('content')

{{ HTML::style('assets/css/default.css'); }}



	<div class="wrapper">
		<div class="wrapper-inner first">
		{{ $navbar }}
			<div class="center">
				<h1>Client's Website</h1>
				<hr>
			</div>
		</div>
	</div>

	<div class="wrapper">
		<div class="wrapper-inner second">
			<div class="container">
				<br><br>



				<div class="col-md-5" style="background-color:none">
					<div class="panel panel-default">
					  <div class="panel-body">

					    <!-- NOTIFICATIONS -->
			              @if (Session::has('flash_notice'))
			                   <div class="alert alert-danger" id="msg" style="">{{ Session::get('flash_notice') }}</div>
			              @endif

			              @if ($errors->any())
			                <div class="alert alert-danger alert-dismissable" id="" style="">
			                    {{ implode('', $errors->all(':message <br>')) }}
			                </div>
			            @endif
			             
			            <!-- END OF NOTIFICATIONS -->


			            <!-- REGISTER FORM -->
			            {{Form::open(array('route'=>'customer_register_validate'))}}
			                {{ Form::hidden('client_id', $client_id) }}
			                <p class="lead" style="margin-bottom:5px;color:white">Register</p>

			                <div class="form-group">
			                  <div class="input-group">
			                    <span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>
			                    {{ Form::text('first_name', $value=null, array('class' => 'form-control' , 'placeholder' => 'First Name')) }}
			                  </div>
			                </div>

			                <div class="form-group">
			                  <div class="input-group">
			                    <span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>
			                    {{ Form::text('last_name', $value=null, array('class' => 'form-control' , 'placeholder' => 'Last Name')) }}
			                  </div>
			                </div>

			                <div class="form-group">
			                  <div class="input-group">
			                    <span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>
			                    {{ Form::select('gender', array('F' => 'Female', 'M' => 'Male'), 'F', array('class' => 'form-control')) }}
			                  </div>
			                </div>

			                <div class="form-group">
			                  <div class="input-group">
			                    <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
			                    {{ Form::email('username', $value=null, array('class' => 'form-control' , 'placeholder' => 'Enter Email')) }}
			                  </div>
			                </div>

			                <div class="form-group">
			                  <div class="input-group">
			                    <span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>
			                    {{ Form::password('password', array('class' => 'form-control' , 'placeholder' => 'Password')) }}
			                  </div>
			                </div>

			                Delivery Information

			                <div class="form-group">
			                  <div class="input-group">
			                    <span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>
			                    {{ Form::text('del_contact_number', $value=null, array('class' => 'form-control' , 'placeholder' => 'Contact Number')) }}
			                  </div>
			                </div>

			                <div class="form-group">
			                  <div class="input-group">
			                    <span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>
			                    {{ Form::text('del_address_number', $value=null, array('class' => 'form-control' , 'placeholder' => 'Address Number')) }}
			                  </div>
			                </div>

			                <div class="form-group">
			                  <div class="input-group">
			                    <span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>
			                    {{ Form::text('del_address_baranggay', $value=null, array('class' => 'form-control' , 'placeholder' => 'Baranggay')) }}
			                  </div>
			                </div>

			                <div class="form-group">
			                  <div class="input-group">
			                    <span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>
			                    {{ Form::text('del_address_municipal', $value=null, array('class' => 'form-control' , 'placeholder' => 'Municipal')) }}
			                  </div>
			                </div>

			                <div class="form-group">
			                  <div class="input-group">
			                    <span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>
			                    {{ Form::text('del_address_province', $value=null, array('class' => 'form-control' , 'placeholder' => 'Province')) }}
			                  </div>
			                </div>

			                <div class="col-xs-12" style="padding:0px">
			                  <button type="submit" class="btn btn-primary" style="width:100%">Register</button>
			                  <hr>
			                </div>
			            {{Form::close()}}
			          <!-- END REGISTER FORM -->

					  </div>
					</div>

				</div>



				<br><br>
			</div>
		</div>
	</div>

	<div class="wrapper">
		<div class="wrapper-inner third">
			<div class="container">
			<br><br>
				

				<br><br>
			</div>
		</div>
	</div>

	<div class="wrapper">
		<div class="wrapper-inner">
			<h1>Contact Us</h1>
		</div>
	</div>
@stop