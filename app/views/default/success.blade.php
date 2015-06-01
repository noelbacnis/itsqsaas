@extends('layouts.master')

@section('content')

{{ HTML::style('assets/css/default.css'); }}

<div class="wrapper">
	<div class="wrapper-inner">
		
		{{ $navbar }}

		<div class="container">
			<div class="center" style="margin-top: 50px;">
				<div class="inner">
					<p class="roboto">Great! Thank you for subscribing to <?php echo date('Y-m-d H:i:s'); ?></p>
					<img src="{{ URL::asset('assets/images/logo.png'); }}" alt="" class="img-responsive">
					<br>
					<p class="roboto">Restaurant Systems Service. Your website shall go live upon payment.</p>
					<p class="roboto">Already made the payment?</p>
					<br>
					<button type="button" data-toggle="modal" data-target="#myModal" class="transaction roboto">Enter Transaction Number</button>
				</div>
			</div>
		</div>
	</div>
</div>


<div id="myModal" class="modal fade">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Confirm Transaction</h4>
      </div>
      {{ Form::open(array('url' => 'subscribe/doEnterTransactionNumber')) }}
      
      <div class="modal-body">
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