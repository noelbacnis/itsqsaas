@extends('layouts.master')



@section('content')

{{ HTML::style('assets/css/default.css'); }}

<div class="row">
<div class="container">
	<div class="col-md-7" style="background-color:none"></div>

	<div class="col-md-5" style="background-color:none">
		<div class="panel panel-default">
		  <div class="panel-body">

		    <!-- NOTIFICATIONS -->
              @if (Session::has('flash_notice'))
                   <div class="alert alert-danger" id="msg" style="">{{ Session::get('flash_notice') }}</div>
              @endif
             
            <!-- END OF NOTIFICATIONS -->


            <!-- LOGIN FORM -->
            {{Form::open(array('route'=>'client_authenticate'))}}
                {{ Form::hidden('user_type', 'client') }}
                <p class="lead" style="margin-bottom:5px;color:white">Login</p>
                <div class="form-group">
                  <div class="input-group">
                    <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
                    {{ Form::text('username', $value=null, array('class' => 'form-control' , 'placeholder' => 'Enter Username')) }}
                  </div>
                </div>

                <div class="form-group">
                  <div class="input-group">
                    <span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>
                    {{ Form::password('password', array('class' => 'form-control' , 'placeholder' => 'Password')) }}
                  </div>
                </div>

                <div class="col-xs-12" style="padding:0px">
                  <button type="submit" class="btn btn-primary" id="btnlogin" style="width:100%"  data-loading-text="Logging in..." >Login</button>
                  <hr>
                </div>
            {{Form::close()}}
          <!-- END LOGIN FORM -->

		  </div>
		</div>

	</div>

</div>
</div>

@stop