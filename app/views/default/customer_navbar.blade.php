

<!-- Navigation -->
    <a id="menu-toggle" href="#" class="btn btn-dark btn-lg toggle"><i class="fa fa-bars"></i></a>
    <nav id="sidebar-wrapper">
        <ul class="sidebar-nav">
            <a id="menu-close" href="#" class="btn btn-light btn-lg pull-right toggle"><i class="fa fa-times"></i></a>
            <li class="sidebar-brand">
                <a href="#top"  onclick = $("#menu-close").click(); >Welcome</a>
            </li>
            <li>
                <a href="#top" onclick = $("#menu-close").click(); >Home</a>
            </li>
            <li>
                <a href="#about" onclick = $("#menu-close").click(); >About</a>
            </li>
            <li>
                <a href="#services" onclick = $("#menu-close").click(); >Services</a>
            </li>
            <li>
                <a href="#portfolio" onclick = $("#menu-close").click(); >The Restaurant</a>
            </li>
            <li>
                <a href="#contact" onclick = $("#menu-close").click(); >Contact</a>
            </li>
            
            @if(Session::get('domain_subscription_type')=='Premium')
                <li>
                    <a href="{{ action('customer_ordering') }}" >Ordering</a>
                </li>
                @if(!Auth::check())
                <li><a href="{{ action('customer_login') }}">Login</a></li>
                <li><a href="{{ action('customer_register') }}">Register</a></li>
                @else
                <li>{{ link_to_route('customer_logout','Logout') }}</li>
                @endif
                </ul>
            @endif
    </nav>

