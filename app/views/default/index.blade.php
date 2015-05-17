@extends('layouts.master')



@section('content')

{{ HTML::style('assets/css/default.css'); }}



	<div class="wrapper">
		<div class="wrapper-inner first">
		{{ $navbar }}
			<div class="center">
				<h1>Software as a Service</h1>
				<hr>
			</div>
		</div>
	</div>

	<div class="wrapper">
		<div class="wrapper-inner second">
			<div class="container">
			<br><br>
				<div class="row" style="text-align: center;">
					<h1>SUBSCRIPTIONS</h1>
					<hr class="short">
				</div>
				<br><br>
				<div class="row" style="text-align: center;">
					<div class="col-md-4">
						<h3>FREE</h3>
						<hr class="short">
						<span class="glyphicon glyphicon-globe logo"></span>
						<h3>Web Template</h3>
						<p>Avail of our free subscription and get a prestigious website template for you restaurant!</p>
						
					</div>
					<div class="col-md-4">
						<h3>PAID</h3>
						<hr class="short">
						<span class="glyphicon glyphicon-folder-open logo"></span>
						<h3>Content Management System</h3>
						<p>Manage the content of your website with our Content Management System when you subscribe to our monthly service.</p>
						
					</div>
					<div class="col-md-4">
						<h3>PREMIUM</h3>
						<hr class="short">
						<span class="glyphicon glyphicon-shopping-cart logo"></span>
						<h3>Ordering System</h3>
						<p>Give your customers the convenience of buying your products online with our Ordering System. Available at Premium Subscription.</p>
						
					</div>
				</div>
				<br><br>
				<div class="row" style="text-align: center;">
					<div class="col-md-4">
						<a href="" class="subscribe-btn">FREE</a>
					</div>
					<div class="col-md-4">
						<a href="" class="subscribe-btn">$ 19.99</a>
					</div>
					<div class="col-md-4">
						<a href="" class="subscribe-btn">$ 59.99</a>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="wrapper">
		<div class="wrapper-inner third">
			<div class="container">
			<br><br>
				<div class="row">
					<div class="col-lg-12" style="text-align: center;">
						<h1>THE PEOPLE BEHIND</h1>
						<hr class="short">
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="wrapper">
		<div class="wrapper-inner">
			<h1>Contact Us</h1>
		</div>
	</div>
@stop