@extends('layouts.master')

@section('content')

{{ HTML::style('assets/css/stylish-portfolio.css'); }}


<!-- Navigation -->
    <a id="menu-toggle" href="#" class="btn btn-dark btn-lg toggle"><i class="fa fa-bars"></i></a>
    <nav id="sidebar-wrapper">
        <ul class="sidebar-nav">
            <a id="menu-close" href="#" class="btn btn-light btn-lg pull-right toggle"><i class="fa fa-times"></i></a>
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
            <h1>Restaurant</h1>
            <h3>Ordering</h3>
            <br>
        </div>
    </header>

    <!-- About -->
    <section id="about" class="about">
        <div class="container">
            <div class="row">
                

				<div class="row">
					<div class="col-md-8" style="">
						<div class="row" style="margin: -10px 0px 5px 0px">
	                        <div style="height: 100%;line-height: 50px;float: left;font-family: impact;font-size: 20px;">STEP</div>
	                        <div style="height: 100%;line-height: 40px;margin: 0px 5px 0px 5px;float: left;font-family: impact;font-size: 30px;font-weight: bold;border-radius: 500px;border:4px solid;width: 50px;height: 50px;text-align: center;">1</div> 
	                        <div style="height: 100%;line-height: 50px;float: left;font-family: verdana;font-size: 15px">Choose your order from the categories below</div>
	                    </div>
						
						<div class="panel panel-primary">
							<div class="panel-heading">
								<div class="panel-title">Products</div>
							</div>
							<div class="panel-body" style="color:black">


								@if($categories->count())
									@foreach($categories as $category)
										{{$category->name}} <br>
										@foreach($category->products as $prod)
											@if($prod->image != '')
												{{ HTML::image('uploads/'.$client_name.'/'.$prod->image,'', array( 'width' => 120)) }} 
											@else
												{{ HTML::image('assets/images/default_img_1.png', '', array( 'width' => 120)) }} 
											@endif
											<a href="{{ route('view_product', $prod->id) }}">
												{{$prod->name}}
											</a>
											<br>
											
										@endforeach
									@endforeach
								@else
									No Products Yet
								@endif
							</div>
						</div>
					</div>


				<div class="col-md-4" style="">
					<div class="row" style="margin: -10px 0px 5px 0px">
                        <div style="height: 100%;line-height: 50px;float: left;font-family: impact;font-size: 20px;">STEP</div>
                        <div style="height: 100%;line-height: 40px;margin: 0px 5px 0px 5px;float: left;font-family: impact;font-size: 30px;font-weight: bold;border-radius: 500px;border:4px solid;width: 50px;height: 50px;text-align: center;">2</div> 
                        <div style="height: 100%;line-height: 50px;float: left;font-family: verdana;font-size: 15px">Input Quantity</div>
                    </div>
					{{ Form::open(array('route' => 'addorder' ,'class' => '', 'id' => '')); }}
					<div class="panel panel-primary">
						<div class="panel-heading">
							<div class="panel-title">Product Preview</div>
						</div>
						<div class="panel-body">
							@if(isset($product))
								@foreach($product as $p)
									<div class="col-md-6" style="">
										@if($p->image != '')
											{{ HTML::image('uploads/'.$client_name.'/'.$p->image,'', array( 'width' => 120)) }} 
										@else
											{{ HTML::image('assets/images/default_img_1.png', '', array( 'width' => 120)) }} 
										@endif
									</div>
									<div class="col-md-6" style="color:black">
										{{ Form::hidden('id', $p->id ); }}
										<h3>{{ $p->name }}</h3>
										<small>{{ $p->description }}</small> <br>
										<small>{{ $p->price }}</small>
										{{ Form::hidden('price', $p->price) }}
									</div>
								@endforeach
							@endif
						</div>
						<div class="panel-footer" style="">
							<div class="row">
								<div class="col-md-4" style="padding:0px">{{ Form::label('quantity', 'Quantity'); }}</div>
								<div class="col-md-4" style="padding:0px">{{ Form::number('quantity', '1', array('class' => 'form-control', 'placeholder' => '1')); }}</div>
								<div class="col-md-4" style="padding:0px"><button type="submit" class="btn btn-success form-control">Add Order</button></div>
							</div>
						</div>
					</div>
					{{ Form::close(); }}

					<div class="row" style="margin: -10px 0px 5px 0px">
                        <div style="height: 100%;line-height: 50px;float: left;font-family: impact;font-size: 20px;">STEP</div>
                        <div style="height: 100%;line-height: 40px;margin: 0px 5px 0px 5px;float: left;font-family: impact;font-size: 30px;font-weight: bold;border-radius: 500px;border:4px solid;width: 50px;height: 50px;text-align: center;">3</div> 
                        <div style="height: 100%;line-height: 50px;float: left;font-family: verdana;font-size: 15px">Review your orders</div>
                    </div>
					<div class="panel panel-primary">
						<div class="panel-heading">
							<div class="panel-title">My Orders</div>
						</div>
						<div class="panel-body">
							<table style="width:100%; color:black">
								<tr>
									<td style="width:40%">Name</td>
									<td style="width:15%">Quantity</td>
									<td style="width:15%">Price</td>
									<td style="width:20%">Subtotal</td>
                                    <td style="width:10%">Remove</td>
								</tr>
								<?php $total = 0;?>
								@if (isset($order_products))
									@foreach($order_products as $op)
										<?php 
											$subtotal = 0;
											$subtotal = $op->product->price * $op->quantity;
											$total += $subtotal;
										?>
										<tr>
											<td style="width:40%">{{ $op->product->name }}</td>
											<td style="width:15%">{{ $op->quantity }}</td>
											<td style="width:15%">{{ $op->product->price }}</td>
											<td style="width:15%">{{ $subtotal }}</td>
		                                    <td style="width:10%">{{ link_to_route('remove_order', 'X', array($op->id)) }}</td>
										</tr>
									@endforeach
								@endif
								
							</table>
						</div>
						<div class="panel-footer" style="color:black">
							<div class="row">
								<div class="col-md-6" style="padding:0px">Total:</div>
								<div class="col-md-6" style="padding:0px">Php {{ $total }}</div>
							</div>
						</div>
					</div>
				</div>

			</div> <!--/row-->


			<div class="row">
				<div class="col-md-12" style="">

					<div class="row" style="margin: -10px 0px 5px 0px">
                        <div style="height: 100%;line-height: 50px;float: left;font-family: impact;font-size: 20px;">STEP</div>
                        <div style="height: 100%;line-height: 40px;margin: 0px 5px 0px 5px;float: left;font-family: impact;font-size: 30px;font-weight: bold;border-radius: 500px;border:4px solid;width: 50px;height: 50px;text-align: center;">4</div> 
                        <div style="height: 100%;line-height: 50px;float: left;font-family: verdana;font-size: 15px">Fill in the delivery information</div>
                    </div>
					<div class="panel panel-primary">
						<div class="panel-heading">
							<div class="panel-title">Delivery Details</div>
						</div>
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


			            <!-- DELIVERY FORM -->
			            @if (isset($customer_info))
			            	{{ Form::model($customer_info, array('method' => 'POST', 'class' => 'form-horizontal', 'route' => 'customer_order_validate')) }}
			            	<?php $email = $customer_info->user->username ?>
			            @else
							{{ Form::open(array('route' => 'customer_order_validate' , 'class' => 'form-horizontal')) }}
			            	<?php $email = '' ?>
			            @endif
			            	{{ Form::hidden('status', 'FOR APPROVAL') }}
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
			                    <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
			                    {{ Form::email('email', $email, array('class' => 'form-control' , 'placeholder' => 'Enter Email')) }}
			                  </div>
			                </div>

			                <div class="form-group">
			                  <div class="input-group">
			                    <span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>
			                    {{ Form::number('cash', $value=null, array('class' => 'form-control' , 'placeholder' => 'Change For')) }}
			                  </div>
			                </div>

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

			                <div class="form-group">
			                  <div class="input-group">
			                    <span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>
			                		{{ Form::textarea('del_message', $value=null, array('class' => 'form-control')) }}
			                  </div>
			                </div>



			                <div class="col-xs-12" style="padding:0px">
			                  <button type="submit" class="btn btn-primary" style="width:100%">Submit Order</button>
			                  <hr>
			                </div>
			            {{Form::close()}}
			          	<!-- END DELIVERY FORM -->

						</div>
						<div class="panel-footer" style="color:black">
							<div class="row">
								
							</div>
						</div>

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