<!DOCTYPE HTML>
<!--[if lt IE 7]> <html class="no-js ie6 oldie" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js ie7 oldie" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js ie8 oldie" lang="en"> <![endif]-->
<html class="no-js" lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="robots" content="index,follow">
    <link rel="icon" href="ico/favicon.png">


    @if( __('site.'. $title) == 'site.'.$title)
        <title>{{$title }} &bull; {{ config('app.name') }} , Silicon Mountain Buea, Cameroon</title>
		@elseif(__('site.'.$title) != 'site.'.$title)
		<title>{{__('site.'.$title) }} &bull; {{ config('app.name') }} , Silicon Mountain Buea, Cameroon</title>

@endif


    <!-- Bootstrap Core CSS -->
    <link href="{{url('site')}}/css/bootstrap.min.css" rel="stylesheet">

    <!-- RS5.0 Main Stylesheet -->
    <link rel="stylesheet" type="text/css" href="{{url('site')}}/css/revolution/settings.css">

    <!-- RS5.0 Layers and Navigation Styles -->
    <link rel="stylesheet" type="text/css" href="{{url('site')}}/css/revolution/layers.css">
    <link rel="stylesheet" type="text/css" href="{{url('site')}}/css/revolution/navigation.css">

    <link href="{{url('site')}}/css/style.css" rel="stylesheet">

    <!-- Color -->
    <link id="skin" href="{{url('site')}}/skins/green.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="{{url('site')}}/js/ie-emulation-modes-warning.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="js/html5shiv.min.js"></script>
      <script src="js/respond.min.js"></script>
    <![endif]-->
    
    <!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-1178937-3"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-1178937-3');
</script>

<!--Start of Tawk.to Script-->
<script type="text/javascript">
var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.src='https://embed.tawk.to/6329a11537898912e96a3e80/1gdd9qfvv';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();
</script>
<!--End of Tawk.to Script-->


</head>
<body>

    <!-- Start top -->
    <div class="top-wrapp">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <ul class="top-share">
                        @foreach(\App\Models\Social::all() as $social)
                            @if($social->link !== null && $social->name == 'Facebook')
                                <li><a href="{{ $social->link }}" target="_blank"><i class="fa fa-facebook"></i></a></li>
                            @elseif($social->link !== null && $social->name == 'Twitter')
                                <li><a href="{{ $social->link }}" target="_blank"><i class="fa fa-twitter"></i></a></li>
                            @elseif($social->link !== null && $social->name == 'LinkedIn')
                                <li><a href="{{ $social->link }}" target="_blank"><i class="fa fa-linkedin"></i></a></li>
                            @elseif($social->link !== null && $social->name == 'Google Plus')
                                <li><a href="{{ $social->link }}" target="_blank"><i class="fa fa-instagram"></i></a></li>
                        @endif
                    @endforeach
                    </ul>
                    <ul class="top-link">
                        @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                        <li>
                            <a rel="alternate" hreflang="{{ $localeCode }}" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                                {{ $properties['native'] }}
                            </a>
                        </li>
                    @endforeach
                        <li><a href="{{url('contact')}}" class="signup">{{ __('site.get_in_touch') }}</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- End top -->

    <div class="clearfix"></div>

    <!-- Start Navigation -->
    <nav class="navbar navbar-default navbar-sticky navbar-default bootsnav">
        <!-- Start Top Search -->
        <div class="top-search">
            <div class="container">
                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-search"></i></span>
                    <input type="text" class="form-control" placeholder="Search">
                    <span class="input-group-addon close-search"><i class="fa fa-times"></i></span>
                </div>
            </div>
        </div>
        <!-- End Top Search -->

        <div class="container">

            <!-- Start Header Navigation -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-menu">
                    <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand" href="{{url('/')}}"><img src="https://afrovisiongroup.com/afrovisiongroup-logo.png" class="logo" alt="" width="150"></a>
            </div>
            <!-- End Header Navigation -->

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="navbar-menu">
                <ul class="nav navbar-nav navbar-right" data-in="fadeInDown" data-out="fadeOutUp">
                    <li class="{{Request::is(App::getLocale()) ? 'active' : ''}}" ><a href="{{url('/')}}">{{ __('site.home') }}</a></li>
                    <li class="dropdown {{Request::is(App::getLocale().'/company*') ? 'active' : ''}}">
                        <a href="{{url('company/about')}}" class="dropdown-toggle" data-toggle="dropdown">{{ __('site.company') }}</a>
                        <ul class="dropdown-menu">

                            <li><a href="{{url('company/about')}}">{{ __('site.about') }}</a></li>
                            <li><a href="{{url('company/our-process')}}">{{ __('site.our_processes') }}</a></li>
                            <li><a href="{{url('company/our-experience')}}">{{ __('site.our_experience') }}</a></li>
                            <li><a href="{{url('company/our-team')}}">{{ __('site.our_team') }}</a></li>
                            <li><a href="{{url('company/partners')}}">{{ __('site.partners') }}</a></li>
                            <li><a href="{{url('company/location')}}">{{ __('site.location') }}</a></li>
                            <li><a href="http://careers.afrovisiongroup.com/" target="_blank">Careers</a></li>
                        </ul>
                    </li>
                    <li class="dropdown {{Request::is(App::getLocale().'/services/key-services') ? 'active' : ''}}">
                        <a href="{{url('services/key-services')}}" class="dropdown-toggle" data-toggle="dropdown">{{ __('site.services') }}</a>
                        <ul class="dropdown-menu">
                            @foreach(\App\Models\Service::where('type_id','=',2)->get() as $service)
                            <li><a href="{{url('service/'.$service->slug)}}">{{$service->byLocale()->title}}</a></li>
                            @endforeach
                        </ul>
                    </li>

                    <li class="dropdown {{Request::is(App::getLocale().'/services/core-competence') ? 'active' : ''}}">
                        <a href="{{url('services/core-competence')}}" class="dropdown-toggle" data-toggle="dropdown">{{ __('site.expertise') }}</a>
                        <ul class="dropdown-menu">
                            @foreach(\App\Models\Service::where('type_id','=',1)->get() as $service)
                            <li><a href="{{url('service/'.$service->slug)}}">{{$service->byLocale()->title}}</a></li>
                            @endforeach
                        </ul>
                    </li>

                    <li class="{{Request::is(App::getLocale().'/technologies') ? 'active' : ''}}" ><a href="{{url('technologies')}}">{{ __('site.technologies') }}</a></li>
                    <li class="dropdown {{Request::is(App::getLocale().'/blog*') ? 'active' : ''}}">
                        <a href="{{url('blog')}}" class="dropdown-toggle" data-toggle="dropdown">{{ __('site.blog') }}</a>
                        <ul class="dropdown-menu">
                            @foreach(\App\Models\Category::all() as $category)
                            <li><a href="{{url('blog/category/'.$category->slug)}}">{{$category->byLocale()->title}}</a></li>
                            @endforeach
                        </ul>
                    </li>
                    <li class="{{Request::is(App::getLocale().'/clients*') ? 'active' : ''}}" ><a href="{{url('clients')}}">{{ __('site.clients') }}</a></li>
                    <li class="{{Request::is(App::getLocale().'/contact') ? 'active' : ''}}" ><a href="{{url('contact')}}">{{ __('site.contact') }}</a></li>
                </ul>
            </div><!-- /.navbar-collapse -->
        </div>
    </nav>
    <!-- End Navigation -->

    @yield('content')

    <!-- Start footer -->
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-sm-6">
                    <div class="widget">
                        <h4>{{ config('app.name') }}</h4>
                        <p>
                         {!! \App\Models\Page::find(23)->byLocale()->content !!}
                        </p>
                        <div class="social-network">
                            @foreach(\App\Models\Social::all() as $social)
                                @if($social->link !== null && $social->name == 'Facebook')
                                    <a href="{{ $social->link }}"><i class="icon icon-facebook"></i></a>
                                @elseif($social->link !== null && $social->name == 'Twitter')
                                    <a href="{{ $social->link }}"><i class="icon icon-twitter"></i></a>
                                @elseif($social->link !== null && $social->name == 'LinkedIn')
                                    <a href="{{ $social->link }}"><i class="icon icon-linkedin"></i></a>
                                @elseif($social->link !== null && $social->name == 'Google Plus')
                                    <a href="{{ $social->link }}"><i class="icon icon-googleplus"></i></a>
                                @endif
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="col-md-2 col-sm-6">
                    <div class="widget">
                        <h4>{{ __('site.explore_link') }}</h4>
                        <ul class="link-list">
                            <li><a href="{{url('/')}}">{{ __('site.home') }}</a></li>
                            <li><a href="{{url('about/company')}}">{{ __('site.company') }}</a></li>
                            <li><a href="{{url('services/key-services')}}">{{ __('site.services') }}</a></li>
                            <li><a href="{{url('services/core-competence')}}">{{ __('site.expertise') }}</a></li>
                            <li><a href="{{url('technologies')}}">{{ __('site.technologies') }}</a></li>
                            <li><a href="{{url('blog')}}">{{ __('site.blog') }}</a></li>
                            <li><a href="{{url('clients')}}">{{ __('site.clients') }}</a></li>
                            <li><a href="{{url('contact')}}">{{ __('site.contact') }}</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="widget">
                        <h4>{{ __('site.news_articles') }}</h4>
                        <ul class="recent-post-list">
                            @foreach(\App\Models\Post::take(4)->get() as $post)
                            <li>
                                <h6><a href="{{url('post/'.$post->slug)}}">{{$post->byLocale()->title}}</a></h6>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="widget">
                        <h4>{{ __('site.news_letters') }}</h4>
                        <!-- Start Subscribe -->
                        <form action="https://afrovisiongroup.us10.list-manage.com/subscribe/post?u=b9c16363803cd124d63702d99&amp;id=c37826bc48&amp;f_id=006631e2f0"
                        method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate form-subscribe" target="_blank" novalidate>
                            <input type="email" class="input-subscribe" name="EMAIL" id="mce-EMAIL" placeholder="Enter your email address...">
                            <input type="text" name="b_b9c16363803cd124d63702d99_c37826bc48" tabindex="-1" value="" style="display:none">
                            <button onClick="javscript: form.submit();" class="btn btn-primary btn-subscribe" type="button"><i class="fa fa-send"></i></button>
                        </form>
                        <!-- End Subscribe -->
                    </div>
                    <div class="widget">
                    <h4>{{ __('site.last_tweet') }}</h4>
                        <div class="tweet">
                             <a class="twitter-timeline" data-theme="dark" data-tweet-limit=2 data-link-color="#19CF86" href="https://twitter.com/afrovisiongroup?ref_src=twsrc%5Etfw">@afrovisiongroup</a> <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="subfooter">
            <p>{{ date('Y') }} &copy; Copyright <a href="https://afrovisiongroup.com/"> {{ config('app.name') }}.</a> All rights Reserved.</p>
        </div>
    </footer>
    <!-- End footer -->

    <!-- Start to top -->
    <a href="#" class="toTop">
        <i class="fa fa-chevron-up"></i>
    </a>
    <!-- End to top -->

    <!-- START JAVASCRIPT -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script type="text/javascript" src="{{url('site')}}/js/jquery.min.js"></script>
    <script src="{{url('site')}}/js/bootstrap.min.js"></script>
    <script src="{{url('site')}}/js/jquery.easing-1.3.min.js"></script>

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="{{url('site')}}/js/ie10-viewport-bug-workaround.js"></script>

    <!-- Bootsnavs -->
    <script src="{{url('site')}}/js/bootsnav.js"></script>

    <!-- Custom form -->
    <script src="{{url('site')}}/js/form/jcf.js"></script>
    <script src="{{url('site')}}/js/form/jcf.scrollable.js"></script>
    <script src="{{url('site')}}/js/form/jcf.select.js"></script>

    <!-- Custom checkbox and radio -->
    <script src="{{url('site')}}/js/checkator/fm.checkator.jquery.js"></script>
    <script src="{{url('site')}}/js/checkator/setting.js"></script>

    <!-- REVOLUTION JS FILES -->
    <script type="text/javascript" src="{{url('site')}}/js/revolution/jquery.themepunch.tools.min.js"></script>
    <script type="text/javascript" src="{{url('site')}}/js/revolution/jquery.themepunch.revolution.min.js"></script>

    <!-- SLIDER REVOLUTION 5.0 EXTENSIONS
    (Load Extensions only on Local File Systems !
    The following part can be removed on Server for On Demand Loading) -->
    <script type="text/javascript" src="{{url('site')}}/js/revolution/revolution.extension.actions.min.js"></script>
    <script type="text/javascript" src="{{url('site')}}/js/revolution/revolution.extension.carousel.min.js"></script>
    <script type="text/javascript" src="{{url('site')}}/js/revolution/revolution.extension.kenburn.min.js"></script>
    <script type="text/javascript" src="{{url('site')}}/js/revolution/revolution.extension.layeranimation.min.js"></script>
    <script type="text/javascript" src="{{url('site')}}/js/revolution/revolution.extension.migration.min.js"></script>
    <script type="text/javascript" src="{{url('site')}}/js/revolution/revolution.extension.navigation.min.js"></script>
    <script type="text/javascript" src="{{url('site')}}/js/revolution/revolution.extension.parallax.min.js"></script>
    <script type="text/javascript" src="{{url('site')}}/js/revolution/revolution.extension.slideanims.min.js"></script>
    <script type="text/javascript" src="{{url('site')}}/js/revolution/revolution.extension.video.min.js"></script>

    <!-- CUSTOM REVOLUTION JS FILES -->
    <script type="text/javascript" src="{{url('site')}}/js/revolution/setting/hermes-revolution-slider.js"></script>

    <!-- masonry -->
    <script src="{{url('site')}}/js/masonry/masonry.min.js"></script>
    <script src="{{url('site')}}/js/masonry/masonry.filter.js"></script>
    <script src="{{url('site')}}/js/masonry/setting.js"></script>

    <!-- PrettyPhoto -->
    <script src="{{url('site')}}/js/prettyPhoto/jquery.prettyPhoto.js"></script>
    <script src="{{url('site')}}/js/prettyPhoto/setting.js"></script>

    <!-- Parallax -->
    <script src="{{url('site')}}/js/parallax/jquery.parallax-1.1.3.js"></script>
    <script src="{{url('site')}}/js/parallax/setting.js"></script>

    <!-- owl carousel -->
    <script src="{{url('site')}}/js/owlcarousel/owl.carousel.min.js"></script>
    <script src="{{url('site')}}/js/owlcarousel/setting.js"></script>

    <!-- Player -->
    <script src="{{url('site')}}/js/jplayer/jquery.jplayer.js"></script>
    <script src="{{url('site')}}/js/jplayer/setting.js"></script>

    <!-- Twitter -->
    <script src="{{url('site')}}/js/twitter/tweetie.min.js"></script>
    <script src="{{url('site')}}/js/twitter/ticker.js"></script>
    <script src="{{url('site')}}/js/twitter/setting.js"></script>

    <!-- Custom -->
    <script src="{{url('site')}}/js/custom.js"></script>

    <!-- Theme option-->
    <script src="{{url('site')}}/js/template-option/demosetting.js"></script>
</body>
</html>
