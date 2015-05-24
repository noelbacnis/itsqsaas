@extends('layouts.master')

@section('content')
{{ HTML::style('assets/css/default.css'); }}

<div class="wrapper">
	<div class="wrapper-inner">
	{{ $navbar }}
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<h1 class="text-orange roboto">Payment Form</h1>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-12 roboto" style="color: white; font-weight: 700;">
					<p>Great! You are just a few steps away from having your website online!</p>
					
				</div>
			</div>
			<br><br>

			<div class="row">
				<div class="col-lg-6">
					<div class="panel panel-info">
						<div class="panel-heading">
							<div class="panel-title">
								Payment Information
							</div>
						</div>
						<div class="panel-body">
							{{ Form::label('payment_period', 'Payment Period'); }}
							{{ Form::text('payment_period', 'Monthly', array('class' => 'form-control', 'disabled' => true)); }}
						</div>
					</div>
				</div>
				<div class="col-lg-6">
					<div class="panel panel-info">
						<div class="panel-heading">
							<div class="panel-title">Subscription Information</div>
						</div>
						<div class="panel-body"></div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@stop