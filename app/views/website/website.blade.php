@extends('layouts.master')

@section('content')

{{ HTML::style('assets/css/stylish-portfolio.css'); }}

{{ $navbar }}


    <!-- Header -->
    <header id="top" class="header" style=''>
        <div id="carousel-example-generic" class="carousel slide" data-ride="carousel" style="position:absolute;z-index:0;width:100%;height:auto;">
                  <!-- Indicators -->
                  <?php $first_loop = true; $counter = 0?>
                    @foreach ($client_cms->banners as $p)
                    <ol class="carousel-indicators">
                        @if ($first_loop == true)
                         <li data-target="#carousel-example-generic" data-slide-to="{{ $counter++}}" class="active"></li>
                        @else
                         <li data-target="#carousel-example-generic" data-slide-to="{{ $counter++}}"></li>
                        @endif
                        <?php $first_loop = false?>
                    </ol>
                   @endforeach

                  <!-- Wrapper for slides -->
                  <div class="carousel-inner" role="listbox" style="height:720px">
                    <?php $first_loop = true?>
                    @foreach ($client_cms->banners as $p)
                        @if ($first_loop == true)
                        <div class="item active">
                        @else
                        <div class="item">
                        @endif
                          {{ HTML::image('banners/'.$p->filename,'', array( 'class' => '', 'style'=>'min-width: 100%;min-height: 60%;')) }}
                        </div>
                        <?php $first_loop = false; 
                        //break;?>
                    @endforeach

                  </div>
                
                @if ($client_cms->banners->count())
                  <!-- Controls -->
                  <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
                    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                  </a>
                  <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
                    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                  </a>
                </div>
                <!-- /.col-lg-10 -->
                @endif
            </div>

            <div class="text-vertical-center" style="position:absolute; z-index:20;width: 50%;height: 100%; top:40%;left:25%;display: table;text-shadow: 0 1px 2px rgba(0,0,0,.6)">
                <h1>{{ $client_cms->name }}</h1>
                <h3>{{ $client_cms->tagline }}</h3>
                <br>
            </div>

    </header>

    <!-- About -->
    <section id="products" class="about">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    @if($client_cms->products->count() == 1)
                        <h2>Featured Product</h2>
                        <hr class="small">
                        <div class="row">
                                <div class="service-item">
                                    <span class="fa-stack fa-4x">
                                        <i class="fa fa-circle fa-stack-2x"></i>
                                        <i class="fa fa-cloud fa-stack-1x text-primary"></i>
                                    </span>

                                    {{ HTML::image('uploads/'.$client_name.'/'.$client_cms->products[0]->image,'', array( 'width' => '100%')) }} 

                                    <h4>
                                        <strong>{{ $client_cms->products[0]->name }}</strong>
                                    </h4>
                                    <p>{{ $client_cms->products[0]->description }}</p>
                                    <p>PHP {{ $client_cms->products[0]->price }}</p>
                                </div>
                        </div>
                    @else
                        <div class="col-lg-10 col-lg-offset-1 text-center">
                        <h2>Our Products</h2>
                        <hr class="small">
                        <div class="row">
                        @foreach ($client_cms->products as $p)
                            <div class="col-md-6">
                                @if($p->image != '')
                                    <div class="portfolio-item">
                                        <a href="#">
                                            {{ HTML::image('uploads/'.$client_name.'/'.$p->image,'', array( 'class' => 'img-portfolio img-responsive', 'width' => '300px' )) }}
                                        </a>
                                    </div>
                                @else
                                     <div class="portfolio-item">
                                        <a href="#">
                                            {{ HTML::image('assets/images/default_img_1.png','', array( 'class' => 'img-portfolio img-responsive', 'width' => '300px' )) }}
                                        </a>
                                    </div>
                                @endif
                                <h4><strong>{{ $p->name }}</strong></h4>
                                <p>{{ $p->description }}</p>
                                <p>PHP {{ $p->price }}</p>
                                <p>{{ $p->category->name }}</p>
                            </div>
                        @endforeach
                        <div></div>
                   @endif
                </div>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container -->
    </section>

    <!-- Services -->
    <!-- The circle icons use Font Awesome's stacked icon classes. For more information, visit http://fontawesome.io/examples/ -->
    <section id="about" class="services bg-primary">
        <div class="container">
            <div class="row text-center">
                <div class="col-lg-10 col-lg-offset-1">
                     <h2>About</h2>
                    <hr class="small">
                    <!-- <h2>Stylish Portfolio is the perfect theme for your next project!</h2> -->
                    <p class="lead">{{ $client_cms->description }}</p>
                    <!-- /.row (nested) -->
                </div>
                <!-- /.col-lg-10 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container -->
    </section>

    <!-- Callout -->
 <!--    <aside class="callout">
        <div class="text-vertical-center">
            <h1>Welcome!</h1>
        </div>
    </aside> -->

    <!-- Portfolio -->
 <!--    <section id="portfolio" class="portfolio">
        <div class="container">
            <div class="row">
 -->
                
                
            <!-- /.row -->
        <!-- </div> -->
        <!-- /.container -->
    <!-- </section> -->

    <!-- Call to Action -->
    <section id="contact" class="portfolio">
    <aside class="call-to-action">
        <div class="container">
            <div class="row text-center">
                <div class="col-lg-10 col-lg-offset-1">
                    <h2>Contact Us</h2>
                    <h4>Any questions? Don't hesitate. Ask us!</h4>
                    <hr class="small">
                    <div class="row">
                        <h3>Contact Number</h3>
                        <p class="lead">
                            {{ $client_cms->contact_number }}
                        </p>
                        <br>
                        <h3>Address</h3>
                        <p class="lead">
                            {{ $client_cms->address }}
                        </p>
                    </div>
                    <!-- /.row (nested) -->
                </div>
                <!-- /.col-lg-10 -->
            </div>
            <!-- /.row -->
        </div>
    </aside>
    </section>

    <!-- Map -->
    <!-- <section id="contact" class="map">
        <iframe width="100%" height="100%" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?f=q&amp;source=s_q&amp;hl=en&amp;geocode=&amp;q=Twitter,+Inc.,+Market+Street,+San+Francisco,+CA&amp;aq=0&amp;oq=twitter&amp;sll=28.659344,-81.187888&amp;sspn=0.128789,0.264187&amp;ie=UTF8&amp;hq=Twitter,+Inc.,+Market+Street,+San+Francisco,+CA&amp;t=m&amp;z=15&amp;iwloc=A&amp;output=embed"></iframe>
        <br />
        <small>
            <a href="https://maps.google.com/maps?f=q&amp;source=embed&amp;hl=en&amp;geocode=&amp;q=Twitter,+Inc.,+Market+Street,+San+Francisco,+CA&amp;aq=0&amp;oq=twitter&amp;sll=28.659344,-81.187888&amp;sspn=0.128789,0.264187&amp;ie=UTF8&amp;hq=Twitter,+Inc.,+Market+Street,+San+Francisco,+CA&amp;t=m&amp;z=15&amp;iwloc=A"></a>
        </small>
        </iframe>
    </section> -->

    <!-- Footer -->
    <footer class=" bg-primary" style="color:white">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 col-lg-offset-1 text-center">
                   <!--  <h4><strong>{{ $client_cms->name }}</strong>
                    </h4>
                    <p>{{ $client_cms->address }}</p> -->
                    <ul class="list-unstyled">
                        <!-- <li><i class="fa fa-phone fa-fw"></i> (123) 456-7890</li> -->
                        <!-- <li><i class="fa fa-envelope-o fa-fw"></i>  <a href="mailto:name@example.com">tara@yahoo.com</a> -->
                        </li>
                    </ul>
                    <br>
                    <ul class="list-inline">
                        <li>
                            <a href="#"><i class="fa fa-facebook fa-fw fa-3x"></i></a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-twitter fa-fw fa-3x"></i></a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-dribbble fa-fw fa-3x"></i></a>
                        </li>
                    </ul>
                    <hr class="small">
                    <!-- <p class="text-muted">Copyright &copy;Tara, Computer 2014</p> -->
                    <p>Copyright &copy;Tara, Computer 2014</p>
                </div>
            </div>
        </div>
    </footer>

    <!-- Custom Theme JavaScript -->
    <script>
    // Closes the sidebar menu
    $("#menu-close").click(function(e) {
        e.preventDefault();
        $("#sidebar-wrapper").toggleClass("active");
    });

    // Opens the sidebar menu
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#sidebar-wrapper").toggleClass("active");
    });

    // Scrolls to the selected menu item on the page
    $(function() {
         $('#sidebar-wrapper a[href*=#]').click(function() {
            if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') || location.hostname == this.hostname) {

                var target = $(this.hash);
                target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
                if (target.length) {
                    $('html,body').animate({
                        scrollTop: target.offset().top
                    }, 1000);
                    return false;
                }
            }
        });
    });
    </script>
@stop