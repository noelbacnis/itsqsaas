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
						<br><br>
						<p><a href="{{ URL::to('subscribe').'?type=free'; }}" class="subscribe-btn">FREE</a></p>
					</div>
					<div class="col-md-4">
						<h3>PAID</h3>
						<hr class="short">
						<span class="glyphicon glyphicon-folder-open logo"></span>
						<h3>Content Management System</h3>
						<p>Manage the content of your website with our Content Management System when you subscribe to our monthly service.</p>
						<br>
						<p><a href="{{ URL::to('subscribe').'?type=paid'; }}" class="subscribe-btn">$ 19.99</a></p>
					</div>
					<div class="col-md-4">
						<h3>PREMIUM</h3>
						<hr class="short">
						<span class="glyphicon glyphicon-shopping-cart logo"></span>
						<h3>Ordering System</h3>
						<p>Give your customers the convenience of buying your products online with our Ordering System. Available at Premium Subscription.</p>
						<br>
						<p><a href="{{ URL::to('subscribe').'?type=premium'; }}" class="subscribe-btn">$ 59.99</a></p>
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
				<div class="row">
					<div class="col-lg-12" style="text-align: center;">
						<h1>THE PEOPLE BEHIND</h1>
						<hr class="short">
					</div>
				</div>
				<br><br>
				<div class="row" style="text-align: center;">
					<div class="col-md-4">
						<img src="{{ asset('assets/images/first.jpg') }}" alt="" class="img-circle">
						<h3>Dianne Delos Reyes</h3>
						<h5>Technical Lead</h5>
						<hr class="short">
					</div>
					
					<div class="col-md-4">
							<img src="{{ asset('assets/images/first.jpg') }}" alt="" class="img-circle">
							<h3>Dzoonard Cortado</h3>
							<h5>Project Manager</h5>
							<hr class="short">
					</div>
					<div class="col-md-4">
						<img src="{{ asset('assets/images/first.jpg') }}" alt="" class="img-circle">
						<h3>Noel Bacnis</h3>
						<h5>Developer/Designer</h5>
						<hr class="short">
					</div>
					
				</div>
				<div class="row" style="text-align: center;">
					<div class="col-md-4">
						<img src="{{ asset('assets/images/first.jpg') }}" alt="" class="img-circle">
						<h3>Robert Esguerra</h3>
						<h5>Developer</h5>
						<hr class="short">
					</div>
					<div class="col-md-4">
						<img src="{{ asset('assets/images/first.jpg') }}" alt="" class="img-circle">
						<h3>Nicole Padolina</h3>
						<h5>Business Analyst</h5>
						<hr class="short">
					</div>
				</div>

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