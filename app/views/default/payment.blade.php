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
			{{ Form::open(array('url' => 'subscribe/doSubscriptionPayment', 'files' => true, 'id' => 'formm')) }}
			<div class="row">
				<div class="col-lg-8">
					<div class="panel panel-info">
						<div class="panel-heading">
							<div class="panel-title">
								Payment Information
							</div>
						</div>
						<div class="panel-body">
							{{ Form::label('period', 'Subscription Period'); }} <br>
							{{ Form::select('period', array(
										3 => '3 Months',
										4 => '4 Months',
										5 => '5 Months',
										6 => '6 Months'
									), 3, array('class' => 'form-control'));}}
							<i>Period has a minimum of 3 Months</i>
							<br><br>
							{{ Form::checkbox('agree', 'Terms & Conditions'); }}
							By checking this box, you agree to our Terms & Conditions in subscribing to our service.
						</div>
						<div class="panel-footer">
						{{ Form::hidden('client_id', Input::get('id')); }}
						{{ Form::hidden('subscription_type_id', Input::get('type')); }}


							<button type="submit" class="btn btn-success form-control">Submit</button>
						</div>
					</div>
				</div>
				<div class="col-lg-4">
					<div class="panel panel-info">
						<div class="panel-heading">
							<div class="panel-title">Subscription Information</div>
						</div>
						<div class="panel-body">
							{{ Form::label('restaurant_name', 'Restaurant Name'); }} <br>
							{{ $client->name; }}
							<br><br>
							{{ Form::label('domain', 'Domain'); }} <br>
							{{ 'www.'.$client->domain.'.com'; }}
							<br><br>
							{{ Form::label('subscription', 'Subscription'); }} <br>
							{{ 'Free' }}
							<br><br>
							
						</div>
						<div class="panel-footer">
							{{ Form::label('total_payment', 'Total Payment'); }}

							<span id="total_payment" style="float: right;">Php 0.00</span>
						</div>
					</div>
				</div>
			</div>
			{{ Form::close() }}
		</div>
	</div>
</div>
@stop