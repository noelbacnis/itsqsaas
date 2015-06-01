@extends('layouts.master')



@section('content')

{{ HTML::style('assets/css/default.css'); }}


<div class="wrapper">
	<div class="wrapper-inner">
		{{ $navbar }}

		<div class="container">

		<div class="row">
			<div class="col-lg-12">
				<h1 class="text-orange roboto">Upgrade Form</h1>
			</div>
		</div>
		<br>
			<div class="row">
				<div class="col-lg-6">
					{{ Form::open(array('url' => 'doFreeUpgrade')) }}
						<div class="panel panel-default">
							<div class="panel-heading">
								<div class="panel-title">Upgrade</div>
							</div>
							<div class="panel-body">
								{{ Form::label('subscription_type_id', 'Upgrade To'); }}
								{{ Form::select('subscription_type_id', array(
										2 => 'Paid',
										3 => 'Premium',
									), 3, array('class' => 'form-control', 'id' => 'months'));}}
								<br><br>
								{{ Form::label('email', 'E-mail'); }}
								{{ Form::text('email', '', array('class' => 'form-control'))}}
								<br><br>
								{{ Form::label('period', 'Period'); }}
								{{ Form::select('period', array(
										3 => '3 Months',
										4 => '4 Months',
										5 => '5 Months',
										6 => '6 Months'
									), 3, array('class' => 'form-control', 'id' => 'months'));}}
							</div>
							<div class="panel-footer">
								<button type="submit" class="form-control btn btn-success">Submit</button>
							</div>
						</div>
					{{ Form::close(); }}
				</div>
				<div class="col-lg-6">
					<div class="panel panel-default">
						<div class="panel-heading">
							<div class="panel-title">Upgrade</div>
						</div>
						<div class="panel-body" style="text-align: center;">
							<p class="roboto" style="color: black; font-size: 20px;">Already made the payment?</p>
							<button class="btn btn-primary btn-lg" data-toggle="modal" data-target="#trans">Enter Transaction Number</button>
						</div>
					</div>
				</div>
			</div>
			
		</div>
	</div>
</div>


<!-- TRANSACTION MODAL
================================================================== -->

<div id="trans" class="modal fade">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Confirm Transaction</h4>
      </div>
      {{ Form::open(array('url' => 'doUpgradeTransaction')) }}
      
      <div class="modal-body">
      	{{ Form::label('email', 'E-mail'); }}
        {{ Form::text('email', '', array('class' => 'form-control', 'required' => true)); }}
      <br><br>
        {{ Form::label('subscription_id', 'Subscription ID'); }}
        {{ Form::text('subscription_id', '', array('class' => 'form-control', 'required' => true)); }}
        <i>A subscription number has been sent to your email. Enter it here to confirm your order.</i>
      <br><br>
        {{ Form::label('transaction_number', 'Transaction Number'); }}
        {{ Form::text('transaction_number', '', array('class' => 'form-control', 'required' => true)); }}
        <i>Confirm your payment by entering the transaction number provided by the bank.</i>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Confirm</button>
      </div>
      {{ Form::close(); }}
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->


@stop