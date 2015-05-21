@extends('layouts.master')



@section('content')

{{ HTML::style('assets/css/default.css'); }}

<a href="{{ action('client_logout') }}"><i class="fa fa-fw fa-power-off"></i> Log Out</a>

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
                            <pre>
                            @foreach ($client as $s)
                                <?php //print_r($s)?>
                                {{$s->subscription->name}}
                            @endforeach
                            </pre>
                    </div>
                </div>
              

            </div>




@stop