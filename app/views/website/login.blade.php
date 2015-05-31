@extends('layouts.master')

@section('content')

{{ HTML::style('assets/css/stylish-portfolio.css'); }}

<!-- Navigation -->
    <a id="menu-toggle" href="#" class="btn btn-dark btn-lg toggle"><i class="fa fa-bars">Menu</i></a>
    <nav id="sidebar-wrapper">
        <ul class="sidebar-nav">
            <a id="menu-close" href="#" class="btn btn-light btn-lg pull-right toggle"><i class="fa fa-times">Close</i></a>
            <li class="sidebar-brand">
                <a href="#top"  onclick = $("#menu-close").click(); >Welcome</a>
            </li>
            <li>
                <a href="{{ action('client_website') }}" onclick = $("#menu-close").click(); >Return to Home</a>
            </li>

            <li>
                <a href="{{ action('customer_ordering') }}" >Ordering</a>
            </li>
            @if(!Auth::check())
            <li><a href="{{ action('customer_login') }}">Login</a></li>
            <li><a href="{{ action('customer_register') }}">Register</a></li>
            @else
            <li>{{ link_to_route('customer_logout','Logout') }}</li>
            @endif
            </ul>
    </nav>

	<!-- Header -->
    <header id="top" class="header" style="height:250px">
        <div class="text-vertical-center">
            <span>{{ HTML::image('uploads/'.$client_cms->name.'/'.$client_cms->image, '', array( 'class' => '', 'style'=>'width: 100px;')) }}</span>
            <h1>{{ $client_cms->name }}</h1>
            <h3>Login</h3>
            <br>
        </div>
    </header>


	<!-- About -->
    <section id="about" class="about">
        <div class="container">
            <div class="row">


				<div class="col-md-5" style="background-color:none">
					<div class="panel panel-default">
					  <div class="panel-body">

					    <!-- NOTIFICATIONS -->
			              @if (Session::has('flash_notice'))
			                   <div class="alert alert-danger" id="msg" style="">{{ Session::get('flash_notice') }}</div>
			              @endif
			             
			            <!-- END OF NOTIFICATIONS -->


			            <!-- LOGIN FORM -->
			            {{Form::open(array('route'=>'authenticate'))}}
			                {{ Form::hidden('user_type', 'customer') }}
			                <p class="lead" style="margin-bottom:5px;color:white">Login</p>
			                <div class="form-group">
			                  <div class="input-group">
			                    <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
			                    {{ Form::text('username', $value=null, array('class' => 'form-control' , 'placeholder' => 'Enter Email')) }}
			                  </div>
			                </div>

			                <div class="form-group">
			                  <div class="input-group">
			                    <span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>
			                    {{ Form::password('password', array('class' => 'form-control' , 'placeholder' => 'Password')) }}
			                  </div>
			                </div>

			                <div class="col-xs-12" style="padding:0px">
			                  <button type="submit" class="btn" id="btnlogin" style="width:100%;border-color:#{{ $client_cms->primary_color }};background-color:#{{ $client_cms->primary_color }};color:#fff" data-loading-text="Logging in..." >Login</button>
			                  <hr>
			                </div>
			            {{Form::close()}}
			          <!-- END LOGIN FORM -->

					  </div>
					</div>

				</div>



        	</div>
            <!-- /.row -->
        </div>
        <!-- /.container -->
    </section>



    <!-- Custom Theme JavaScript -->
    <script>
    // Closes the sidebar menu
    $("#menu-close").click(function(e) {
        e.preventDefault();
        $("#sidebar-wrapper").toggleClass("active");
    });

    // Opens the sidebar menu
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#sidebar-wrapper").toggleClass("active");
    });

    // Scrolls to the selected menu item on the page
    $(function() {
        $('a[href*=#]:not([href=#])').click(function() {
            if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') || location.hostname == this.hostname) {

                var target = $(this.hash);
                target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
                if (target.length) {
                    $('html,body').animate({
                        scrollTop: target.offset().top
                    }, 1000);
                    return false;
                }
            }
        });
    });
    </script>


@stop