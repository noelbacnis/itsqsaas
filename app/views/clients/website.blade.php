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

				
				<div class="row">

				<div class="col-md-8" style="">
					
					<div class="panel panel-primary">
						<div class="panel-heading">
							<div class="panel-title">Products</div>
						</div>
						<div class="panel-body" style="color:black">
							@if($categories->count())
								@foreach($categories as $category)
									{{$category->name}} <br>
									@foreach($category->products as $prod)
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
					{{ Form::open(array('route' => 'addorder' ,'class' => '', 'id' => '')); }}
					<div class="panel panel-primary">
						<div class="panel-heading">
							<div class="panel-title">Product Preview</div>
						</div>
						<div class="panel-body">
							@if(isset($product))
							<div class="col-md-6" style="">
								{{ HTML::image('assets/images/first.jpg','product image', array( 'width' => 120)) }}
							</div>
							<div class="col-md-6" style="color:black">
									@foreach($product as $p)
										{{ Form::hidden('id', $p->id ); }}
										<h3>{{ $p->name }}</h3>
										<small>{{ $p->description }}</small>
									@endforeach
							</div>
							@endif
						</div>
						<div class="panel-footer" style="">
							<div class="row">
								<div class="col-md-4" style="padding:0px">{{ Form::label('quantity', 'Quantity'); }}</div>
								<div class="col-md-4" style="padding:0px">{{ Form::number('quantity', '', array('class' => 'form-control')); }}</div>
								<div class="col-md-4" style="padding:0px"><button type="submit" class="btn btn-success form-control">Add Order</button></div>
							</div>
						</div>
					</div>
					{{ Form::close(); }}

					<div class="panel panel-primary">
						<div class="panel-heading">
							<div class="panel-title">My Orders</div>
						</div>
						<div class="panel-body">
							<table style="width:100%; color:black">';
								<tr>
									<td style="width:40%">Name</td>
									<td style="width:20%">Quantity</td>
									<td style="width:25%">Price</td>
                                    <td style="width:15%">Cancel</td>
								</tr>
								<tr>
									<td style="width:40%">Name</td>
									<td style="width:20%">Quantity</td>
									<td style="width:25%">Price</td>
                                    <td style="width:15%">Cancel</td>
								</tr>
							</table>
						</div>
						<div class="panel-footer" style="color:black">
							<div class="row">
								<div class="col-md-6" style="padding:0px">Total:</div>
								<div class="col-md-6" style="padding:0px">Php 999</div>
							</div>
						</div>
					</div>

					</div>

				</div> <!--/row-->
				<div class="row">
					<div class="panel panel-primary">
						<div class="panel-heading">
							<div class="panel-title">Delivery Details</div>
						</div>
						<div class="panel-body">
							
						</div>
						<div class="panel-footer" style="color:black">
							<div class="row">
								
							</div>
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


	<script>
					// $('a').click(function(evt) {
					//     evt.preventDefault();
					//     var link = $(this).attr('href');
					//     console.log(link);
					//     $.ajax({
					//         type: 'GET',
					//         url: 'viewproduct/{id}',
					//         data: { id: link },
			  //               success: function(response)
			  //               {
			  //               	console.log(response);
			  //               }
					//     });
					// });
					// .done(function(url) { // pass the url back to the client after you incremented it
					//     window.location = url;
					// });
				</script>
@stop