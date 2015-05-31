@extends('layouts.client_master')

@section('content')

@if(Auth::check())
  <div id="wrapper">
@else
  <div>
@endif

<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
        <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
      </button>
      {{ link_to_route('client_dashboard','Client', null,array('class'=>'navbar-brand')) }}
    </div>

    <!-- Top Menu Items -->
    <ul class="nav navbar-right top-nav">
      @if(Auth::check())
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> 
            <b class="caret"></b>
          </a>
          <ul class="dropdown-menu">
              <li> <a href="{{ action('client_logout') }}"><i class="fa fa-fw fa-power-off"></i> Log Out</a> </li>
          </ul>
        </li>
      @else
        <li>{{ link_to_route('client_login','Login') }}</li>
      @endif
    </ul>

    @if(Auth::check())
      <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
        <div class="collapse navbar-collapse navbar-ex1-collapse">
          <ul class="nav navbar-nav side-nav">
              @if (Auth::user()->user_type == 'client' && Session::get('subscription_type') == 3)
                <li>
                    <a href="{{ action('client_dashboard') }}"><i class="fa fa-fw fa-bar-chart-o"></i> Dashboard</a>
                </li>
                
                
                <li>
                  <a href="{{ action('orders.index') }}"><i class="fa fa-fw fa-bar-chart-o"></i> Orders</a>
                </li>
                <li>
                  <a href="{{ action('subscriptions.index') }}"><i class="fa fa-fw fa-bar-chart-o"></i> Subscriptions</a>
                </li>
                <li>
                  <a href="{{ action('client_info') }}"><i class="fa fa-fw fa-bar-chart-o"></i> Clients</a>
                </li>
                <li>
                    <a href="{{ action('categories.index') }}"><i class="fa fa-fw fa-bar-chart-o"></i> Categories</a>
                </li>
                <li>
                    <a href="{{ action('gallery.index') }}"><i class="fa fa-fw fa-bar-chart-o"></i> Banners</a>
                </li>
                <li>
                  <a href="{{ action('products.index') }}"><i class="fa fa-fw fa-bar-chart-o"></i> Products</a>
                </li>
                <li>
                  <a href="{{ action('customers.index') }}"><i class="fa fa-fw fa-bar-chart-o"></i> Customers</a>
                </li>
      @elseif (Session::get('subscription_type') == 2)
                <li>
                    <a href="{{ action('categories.index') }}"><i class="fa fa-fw fa-bar-chart-o"></i> Categories</a>
                </li>
                <li>
                    <a href="{{ action('gallery.index') }}"><i class="fa fa-fw fa-bar-chart-o"></i> Banners</a>
                </li>
                <li>
                  <a href="{{ action('products.index') }}"><i class="fa fa-fw fa-bar-chart-o"></i> Products</a>
                </li>
                <li>
                  <a href="{{ action('client_info') }}"><i class="fa fa-fw fa-bar-chart-o"></i> Clients</a>
                </li>
               <!--  <li>
                  <a href="{{ action('customers.index') }}"><i class="fa fa-fw fa-bar-chart-o"></i> Customers</a>
                </li> -->
              @endif
          </ul>
        </div>
        <!-- /.navbar-collapse -->
    @endif
</nav>

<div id="page-wrapper">
  {{ HTML::script('assets/js/jquery.min.js'); }}
  {{ HTML::script('assets/js/bootstrap.min.js'); }}
  <div class="container-fluid">
    @yield('content2')
  </div>
</div>

     
      <script>
            $(document).ready(function(){
             var url = window.location;
              // Will only work if string in href matches with location
              $('ul.nav a[href="'+ url +'"]').parent().addClass('active');

              // Will also work for relative and absolute hrefs
              $('ul.nav a').filter(function() {
                  return this.href == url;
              }).parent().addClass('active');
            });
        </script>