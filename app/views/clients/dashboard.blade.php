@extends('default.client_navbar')

@section('content2')

<div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Dashboard <small>Overview</small>
                        </h1>
                        <ol class="breadcrumb">
                            <li class="active">
                                <i class="fa fa-dashboard"></i> Dashboard
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->

                <div class="row">
                    <div class="col-lg-12">
                        @if (Auth::user()->client->subscription->first()->subscription_type_id == 2 && Auth::user()->client->subscription->count() == 1)
                            <button class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal">Upgrade to Premium</button>
                        @elseif (Auth::user()->client->subscription->count() > 1 && Session::get('subscription_type') != 3)
                        <h3>You have a pending upgrade</h3>
                            <button class="btn btn-success btn-lg" data-toggle="modal" data-target="#trans">Enter Transaction Number</button>
                            <button class="btn btn-danger btn-lg" data-toggle="modal" data-target="#myModal">Cancel Upgrade</button>
                        @endif  
                    </div>
                </div>


            </div>
            <!-- /.container-fluid -->


<div id="myModal" class="modal fade">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Confirm Upgrade</h4>
      </div>
      {{ Form::open(array('url' => 'upgradeSubscription')) }}
      
      <div class="modal-body">
        {{ Form::label('upgrade_to', 'Upgrade To'); }}
        {{ Form::text('upgrade_to', 'Premium', array('class' => 'form-control', 'disabled' => true)); }}
        {{ Form::hidden('subscription_type_id', 3); }}
        {{ Form::hidden('client_id', Auth::user()->client->id); }}
        <i>This will enable the ordering system for your restaurant.</i>
      <br><br>
        {{ Form::label('email', 'E-mail'); }}
        {{ Form::text('email', '', array('class' => 'form-control', 'required' => true)); }}
        <i>Confirm your upgrade by entering your e-mail.</i>
    <br><br>
    {{ Form::label('period', 'Subscription Period'); }} <br>
                            {{ Form::select('period', array(
                                        3 => '3 Months',
                                        4 => '4 Months',
                                        5 => '5 Months',
                                        6 => '6 Months'
                                    ), 3, array('class' => 'form-control', 'id' => 'months'));}}
                            <i>Period has a minimum of 3 Months</i>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Confirm</button>
      </div>
      {{ Form::close(); }}
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<!-- TRANSACTION MODAL
================================================================== -->

<div id="trans" class="modal fade">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Confirm Transaction</h4>
      </div>
      {{ Form::open(array('url' => 'upgrade/doEnterTransactionNumber')) }}
      
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