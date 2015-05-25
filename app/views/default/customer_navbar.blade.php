<nav class="navbar">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      
      <ul class="nav navbar-nav">
        <li class="current_page_item"><a href="#">Lobby</a></li>
        <li><a href="#">Subscription</a></li>
        <li>
          <a href="#">
            <img src="{{ URL::asset('assets/images/icon.png'); }}" alt="">
          </a></li>
        <li><a href="#">Development</a></li>
        <li><a href="#">Reach Us</a></li>

        @if(!Auth::check())
        <li><a href="{{ action('customer_login') }}">Login</a></li>
        <li><a href="{{ action('customer_register') }}">Register</a></li>
        @else
        <li>{{ link_to_route('customer_logout','Logout') }}</li>
        @endif
      </ul>

    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>

