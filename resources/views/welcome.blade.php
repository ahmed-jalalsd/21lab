@extends('layouts.front-main')
@section('content')

<!-- Navbar will come here -->
  <nav class="navbar navbar-transparent navbar-doublerow navbar-trans navbar-fixed-top navbar-color-on-scroll" role="navigation">
  <!-- top nav -->
  <nav class="navbar navbar-top hidden-xs navbar-transparent">
    <div class="container">
      <!-- right nav top -->
      <div class="nav navbar-nav pull-right">
        <form class="navbar-form" method="POST" action="{{ route('login') }}">{{ csrf_field() }}
            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                <label for="email" class="col-md-4 control-label">E-Mail</label>
                <div class="col-md-3">
                    <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>
                    @if ($errors->has('email'))
                        <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
            <label for="password" class="col-md-4 control-label">Password</label>

            <div class="col-md-3">
                <input id="password" type="password" class="form-control" name="password" required>

                @if ($errors->has('password'))
                    <span class="help-block">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="form-group">
            <div class="col-md-8 col-md-offset-4">
                <button type="submit" class="btn btn-primary btn-sm">
                    Login
                </button>
            </div>
        </div>

        <div class="form-group">
            <div class="col-md-8 col-md-offset-4">
                <button type="submit" class="btn btn-primary btn-sm">
                    <a href="{{ route('register') }}">Register</a></li>
                </button>
            </div>
        </div>

    </form>
      </div>
    </div>
  
  </nav>
  <!-- down nav -->
  <nav class="navbar navbar-down navbar-transparent">
    <div class="container">
      <div class="flex-container">  
        <div class="navbar-header flex-item">
          <div class="navbar-header">
              <div class="navbar-brand">

                    <img src="{{ asset('/public/images/icon.png') }}" alt="The BoOk club">
                    The BoOk club
                </div>

        </div>
        </div>
        <ul class="nav navbar-nav flex-item hidden-xs pull-right">
          @foreach($items as $item)
                <li><a href="{{ $item->url }}">{{ $item->menu_name }}</a>
               <!--  @foreach($item['children'] as $child)
                <ul>
                    <li>{{ $child->menu_name }}</li>
                </ul>
                @endforeach -->
                </li>
            @endforeach
        </ul>
        <!-- dropdown only moblie -->
          <div class="dropdown visible-xs pull-right ">
            <button id="menu-toggle" type="button" class="navbar-toggle">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar bar1"></span>
                <span class="icon-bar bar2"></span>
                <span class="icon-bar bar3"></span>
              </button>
          </div>
        </div>  
      </div>
    </nav>
  </nav> 


<!-- end navbar -->

<div class="wrapper">
    <div class="header">
        <div class="container-fluid">
            <div class="full-width" id="carousel">
                <div class="row">
                    <div id="carousel-full" class="carousel slide" data-ride="carousel">
                        <div class="carousel slide" data-ride="carousel">
                            <!-- Indicators -->
                            <ol class="carousel-indicators">
                                @foreach ($sliders as $slider)
                                    <li data-target="#carousel-full" data-slide-to="{{ $loop->index }}" class="{{ $loop->first ? 'active' : '' }}"></li>
                                @endforeach
                            </ol>
                            <!-- Wrapper for slides -->
                            <div class="carousel-inner">
                                @foreach ($sliders as $slider)
                                    <div class="item  {{ $loop->first ? ' active' : '' }}">
                                        <img src="{!! '/images/slider/'.$slider->slider_image !!}" alt="Home page image slider" >
                                        <div class="carousel-caption">
                                            <h4> {{ $slider->slider_caption}}</h4>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            <!-- Controls -->
                            <a class="left carousel-control" href="#carousel-full" data-slide="prev">
                                <i class="material-icons">keyboard_arrow_left</i>
                            </a>
                            <a class="right carousel-control" href="#carousel-full" data-slide="next">
                                <i class="material-icons">keyboard_arrow_right</i>
                            </a>
                        </div>
                    </div>
                </div>
                        <!-- End Carousel Card -->
            </div>
        </div>
    </div>
    <!-- you can use the class main-raised if you want the main area to be as a page with shadows -->
    <div class="main">
        <div class="container">
        
            <div class="section">
                <div class="container">
                    
                    <div class="row tim-row"> <!-- Start pf red more section -->
                        <h1 class="text-center">{{ $content->title }}</h1>
                        <legend></legend>
                        <div class="col-md-8 col-md-offset-2 text-db">
                            @if(strlen($taglessBody) > 100)
                            {{substr($taglessBody,0,800)}}
                            <a href="" class="btn btn-primary  read-more-show hide_content">Read More</a>
                             <span class="read-more-content"> {{substr($taglessBody,800,strlen($taglessBody))}} 
                             <a href="" class="btn btn-primary read-more-hide hide_content">Show less</a><span>
                            @endif
                        </div>
                    </div>

                    <div class="space-50"></div>

                    <div class="row tim-row gallery"> <!-- Start Carousel Gallery  section-->
                        <div class="space-50"></div>
                        <h1 class="text-center">The BoOk Gallery</h1>
                        <legend></legend>
                        <div class="section container" id="carousel">
                            <div class="row">
                                <div class="col-md-12">
                                    <div id="carousel-mini" class="carousel slide" data-ride="carousel">
                                        <div class="carousel slide" data-ride="carousel">
                                         <!-- Indicators  -->
                                            <ol class="carousel-indicators">
                                                @foreach ($galleries->chunk(4) as $count => $item)
                                                    <li data-target="#carousel-mini" data-slide-to="{{ $loop->index }}" class="{{ $loop->first ? 'active' : '' }}"></li>
                                                @endforeach
                                            </ol>
                                            <!-- Wrapper for slides -->
                                            
                                            <div class="carousel-inner">
                                                @foreach($galleries->chunk(4) as $count => $item)
                                                    <div class="item {{ $count == 0 ? 'active' : '' }}">
                                                        <div class="row">
                                                            @foreach($item as $image)
                                                                <div class="col-md-3 col-xs-12 box">
                                                                <a href="" class="panel-container">
                                                                    <img src="{!! '/images/gallery/'.$image->slider_image !!}" alt="Home page gallery">
                                                                    <div class="carousel-caption hovered">
                                                                        <h3> {{ $image->gallery_caption}}</h3>
                                                                    </div>
                                                                </a>
                                                                </div>
                                                        @endforeach 
                                                         </div>   
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div><!-- End Carousel Card -->
                        </div>
                    </div><!-- End Of Carousel Gallery -->

                    <div class="space-50"></div>

                    <div class="row tim-row"> <!-- Start of Post  section-->
                        <div class="space-50"></div>
                        <div class="container">
                            <h1 class="text-center">A BoOk Review</h1>
                            <legend></legend>
                            <div class="row">
                                <div class="col-md-6">
                                    <h2>{{ $post->title }}</h2>
                                    <p>{!! $post->body !!}</p>
                                </div>
                                 <div class="space-50"></div>
                                <div class="col-md-6">
                                    <img src="{!! '/images/media/'.$post->media !!}" alt="" class="img-rounded img-responsive img-raised thumbnails">
                                </div>
                            </div>
                        </div>
                    </div><!-- End  of Post  section-->
                
                <div class="space-50"></div>
                    
                    <div class="row tim-row"> <!-- Start of Download section-->
                        <div class="space-50"></div>
                        <div class="container">
                            <h1 class="text-center">Read the gratest BoOks</h1>
                            <legend></legend>
                            <div class="row">
                                @foreach( $downloads as $download )
                                    <div class="col-md-3 col-xs-6">
                                        <h3>{{ $download->title }}</h3>
                                        <h5><span> Category:</span></h5>
                                        @foreach ( $download->categories as $category )
                                            <div>
                                                <span class="label label-default">{{ $category->category_name }}</span>
                                            </div>
                                        @endforeach
                                        <a href="{{route('download', $download->id)}}" class="btn btn-primary btn-sm">
                                            <i class="material-icons"> cloud_download</i> 
                                        Download
                                        </a>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div><!-- End of Download section-->

                    <div class="space-50"></div>
                    
                    <div class="row tim-row"> <!-- Start of column footer section-->
                    <div class="space-50"></div>
                        <div class="container">
                            <legend></legend>
                            <div class="row">
                                <div class="col-md-4 col-xs-6">
                                    <h3>{{ $leftfooter->title }}</h3>
                                    {{ $taglessfooter }}
                                </div>

                                <div class="col-md-4 col-xs-6">
                                 <h3>Menu</h3>
                                    <ul>
                                      @foreach($items as $item)
                                            <div class="div-link"><a href="{{ $item->url }}" class="btn btn-simple btn-primary ">{{ $item->menu_name }}</a>
                                            </div>
                                        @endforeach
                                    </ul>
                                </div>

                                <div class="col-md-4 col-xs-6">
                                    <h3>{{ $rightfooter->title }}</h3>
                                    <p>
                                        <i class="material-icons">email</i>
                                        {{$rightfooter->email}}
                                    </p> 
                                    <p>
                                        <i class="material-icons">phone</i>
                                        {{$rightfooter->phone}}
                                    </p>  
                                </div>
                            </div>
                        </div><!-- End of multi column footer section-->
                
                    </div>
                </div>
        </div> 
        <legend></legend>
          <footer class="footer">
                <div class="container">
                    <nav class="pull-left">
                        <ul>
                            <li>
                                <a href="">
                                About Us
                                </a>
                            </li>
                            <li>
                                <a href="">
                                   Blog
                                </a>
                            </li>
                            <li>
                                <a href="">
                                    Copyright
                                </a>
                            </li>
                        </ul>
                    </nav>
                    <div class="copyright pull-right">
                        &copy; 2017, made with <i class="material-icons">favorite</i> by me.
                    </div>
                </div>
        </footer>
    </div>
</div>

@endsection
