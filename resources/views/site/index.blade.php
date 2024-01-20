@extends('layouts.site')

@section('content')

<!-- START REVOLUTION SLIDER 5.0 -->
	<div id="slider_container" class="rev_slider_wrapper">
		<div id="rev-slider" class="rev_slider"  data-version="5.0">
			<ul>
				<li data-transition="slideremoveright">
					<!-- MAIN IMAGE -->
					<img src="{{url('site')}}/avn1.jpeg"  alt=""  width="1920" height="1020" />
					<!-- LAYER NR. 1 -->
					<div class="tp-caption cap-text-bold default-text"
						id="slide-1-layer-1"
						data-x="left" data-hoffset="160"
						data-y="top" data-voffset="300"
						data-width="['900','900','900','900']"
						data-height="['auto','auto','auto','auto']"
						data-transform_idle="o:1;"
						data-transform_in="x:-50px;opacity:0;s:1500;e:Power3.easeOut;"
						data-transform_out="s:1000;e:Power3.easeInOut;s:1000;e:Power3.easeInOut;"
						data-start="1000"
						data-splitin="none"
						data-splitout="none"
						data-responsive_offset="on"
						style="z-index: 5; white-space: normal;">{{ \App\Models\Service::find(5)->byLocale()->title }}
					</div>
					<!-- LAYER NR. 2 -->
					<div class="tp-caption cap-text-title default-text"
						id="slide-1-layer-2"
						data-x="left" data-hoffset="160"
						data-y="top" data-voffset="240"
						data-width="['auto','auto','auto','auto']"
						data-height="['auto','auto','auto','auto']"
						data-transform_idle="o:1;"
						data-transform_in="y:-50px;opacity:0;s:1500;e:Power3.easeOut;"
						data-transform_out="s:1000;e:Power3.easeInOut;s:1000;e:Power3.easeInOut;"
						data-start="2000"
						data-splitin="none"
						data-splitout="none"
						data-responsive_offset="on"
						style="z-index: 5; white-space: nowrap;">{{ __('index.end_end') }}
					</div>
					<!-- LAYER NR. 3 -->
					<a class="tp-caption cap-btn btn-default btn btn-md"
						id="slide-1-layer-3"
						data-x="left" data-hoffset="160"
						data-y="top" data-voffset="520"
						data-width="['auto','auto','auto','auto']"
						data-height="['auto','auto','auto','auto']"
						data-transform_idle="o:1;"
						data-transform_in="x:-50px;opacity:0;s:1500;e:Power3.easeOut;"
						data-transform_out="s:1000;e:Power3.easeInOut;s:1000;e:Power3.easeInOut;"
						data-start="3000"
						data-splitin="none"
						data-splitout="none"
						data-responsive_offset="on"
						style="z-index: 5; white-space: nowrap;" href="{{url('service/custom-application-development-for-windows-mac-osx-and-linux')}}">{{ __('site.learn_more') }}
					</a>
					<!-- LAYER NR. 4 -->
					<a class="tp-caption cap-btn btn btn-default btn-bordered btn-md g-t-i"
						id="slide-1-layer-4"
						data-x="left" data-hoffset="340"
						data-y="top" data-voffset="520"
						data-width="['auto','auto','auto','auto']"
						data-height="['auto','auto','auto','auto']"
						data-transform_idle="o:1;"
						data-transform_in="x:-50px;opacity:0;s:1500;e:Power3.easeOut;"
						data-transform_out="s:1000;e:Power3.easeInOut;s:1000;e:Power3.easeInOut;"
						data-start="3000"
						data-splitin="none"
						data-splitout="none"
						data-responsive_offset="on"
						style="z-index: 5; white-space: nowrap;" href="{{url('contact')}}">{{ __('site.get_in_touch') }}
					</a>
				</li>
				<li data-transition="slideremoveright">
					<!-- MAIN IMAGE -->
					<img src="{{url('site')}}/avn2.jpeg"  alt=""  width="1920" height="1020" />
					<!-- LAYER NR. 1 -->
					<div class="tp-caption cap-text-bold default-text"
						id="slide-2-layer-1"
						data-x="left" data-hoffset="160"
						data-y="top" data-voffset="300"
						data-width="['900','900','900','900']"
						data-height="['auto','auto','auto','auto']"
						data-transform_idle="o:1;"
						data-transform_in="x:-50px;opacity:0;s:1500;e:Power3.easeOut;"
						data-transform_out="s:1000;e:Power3.easeInOut;s:1000;e:Power3.easeInOut;"
						data-start="1000"
						data-splitin="none"
						data-splitout="none"
						data-responsive_offset="on"
						style="z-index: 5; white-space: normal;">{{ \App\Models\Service::find(12)->byLocale()->title }}
					</div>
					<!-- LAYER NR. 2 -->
					<div class="tp-caption cap-text-title default-text"
						id="slide-2-layer-2"
						data-x="left" data-hoffset="160"
						data-y="top" data-voffset="240"
						data-width="['auto','auto','auto','auto']"
						data-height="['auto','auto','auto','auto']"
						data-transform_idle="o:1;"
						data-transform_in="y:-50px;opacity:0;s:1500;e:Power3.easeOut;"
						data-transform_out="s:1000;e:Power3.easeInOut;s:1000;e:Power3.easeInOut;"
						data-start="2000"
						data-splitin="none"
						data-splitout="none"
						data-responsive_offset="on"
						style="z-index: 5; white-space: nowrap;">{{ __('index.full_cycle') }}
					</div>
					<!-- LAYER NR. 3 -->
					<a class="tp-caption cap-btn btn-default btn btn-md"
						id="slide-2-layer-3"
						data-x="left" data-hoffset="160"
						data-y="top" data-voffset="520"
						data-width="['auto','auto','auto','auto']"
						data-height="['auto','auto','auto','auto']"
						data-transform_idle="o:1;"
						data-transform_in="x:-50px;opacity:0;s:1500;e:Power3.easeOut;"
						data-transform_out="s:1000;e:Power3.easeInOut;s:1000;e:Power3.easeInOut;"
						data-start="3000"
						data-splitin="none"
						data-splitout="none"
						data-responsive_offset="on"
						style="z-index: 5; white-space: nowrap;" href="{{url('service/mobile-software-development')}}">{{ __('site.learn_more') }}
					</a>
					<!-- LAYER NR. 4 -->
					<a class="tp-caption cap-btn btn btn-default btn-bordered btn-md g-t-i"
						id="slide-2-layer-4"
						data-x="left" data-hoffset="340"
						data-y="top" data-voffset="520"
						data-width="['auto','auto','auto','auto']"
						data-height="['auto','auto','auto','auto']"
						data-transform_idle="o:1;"
						data-transform_in="x:-50px;opacity:0;s:1500;e:Power3.easeOut;"
						data-transform_out="s:1000;e:Power3.easeInOut;s:1000;e:Power3.easeInOut;"
						data-start="3000"
						data-splitin="none"
						data-splitout="none"
						data-responsive_offset="on"
						style="z-index: 5; white-space: nowrap;" href="{{url('contact')}}">{{ __('site.contact') }}
					</a>
				</li>
				<li data-transition="slideremoveright">
					<!-- MAIN IMAGE -->
					<img src="{{url('site')}}/avn3.jpg"  alt=""  width="1920" height="1020" />
					<!-- LAYER NR. 1 -->
					<div class="tp-caption cap-text-bold default-text"
						id="slide-3-layer-1"
						data-x="left" data-hoffset="160"
						data-y="top" data-voffset="300"
						data-width="['900','900','900','900']"
						data-height="['auto','auto','auto','auto']"
						data-transform_idle="o:1;"
						data-transform_in="x:-50px;opacity:0;s:1500;e:Power3.easeOut;"
						data-transform_out="s:1000;e:Power3.easeInOut;s:1000;e:Power3.easeInOut;"
						data-start="1000"
						data-splitin="none"
						data-splitout="none"
						data-responsive_offset="on"
						style="z-index: 5; white-space: normal;">{{ __('site.enterprise_soln') }}
					</div>
					<!-- LAYER NR. 2 -->
					<div class="tp-caption cap-text-title default-text"
						id="slide-3-layer-2"
						data-x="left" data-hoffset="160"
						data-y="top" data-voffset="240"
						data-width="['auto','auto','auto','auto']"
						data-height="['auto','auto','auto','auto']"
						data-transform_idle="o:1;"
						data-transform_in="y:-50px;opacity:0;s:1500;e:Power3.easeOut;"
						data-transform_out="s:1000;e:Power3.easeInOut;s:1000;e:Power3.easeInOut;"
						data-start="2000"
						data-splitin="none"
						data-splitout="none"
						data-responsive_offset="on"
						style="z-index: 5; white-space: nowrap;">{{ __('site.huge_experience') }}
					</div>
					<!-- LAYER NR. 3 -->
					<a class="tp-caption cap-btn btn-default btn btn-md"
						id="slide-3-layer-3"
						data-x="left" data-hoffset="160"
						data-y="top" data-voffset="520"
						data-width="['auto','auto','auto','auto']"
						data-height="['auto','auto','auto','auto']"
						data-transform_idle="o:1;"
						data-transform_in="x:-50px;opacity:0;s:1500;e:Power3.easeOut;"
						data-transform_out="s:1000;e:Power3.easeInOut;s:1000;e:Power3.easeInOut;"
						data-start="3000"
						data-splitin="none"
						data-splitout="none"
						data-responsive_offset="on"
						style="z-index: 5; white-space: nowrap;" href="{{url('service/custom-integration-and-maintenance-of-software-solutions')}}">{{ __('site.learn_more') }}
					</a>
					<!-- LAYER NR. 4 -->
					<a class="tp-caption cap-btn btn btn-default btn-bordered btn-md g-t-i"
						id="slide-3-layer-4"
						data-x="left" data-hoffset="340"
						data-y="top" data-voffset="520"
						data-width="['auto','auto','auto','auto']"
						data-height="['auto','auto','auto','auto']"
						data-transform_idle="o:1;"
						data-transform_in="x:-50px;opacity:0;s:1500;e:Power3.easeOut;"
						data-transform_out="s:1000;e:Power3.easeInOut;s:1000;e:Power3.easeInOut;"
						data-start="3000"
						data-splitin="none"
						data-splitout="none"
						data-responsive_offset="on"
						style="z-index: 5; white-space: nowrap;" href="{{url('contact')}}">{{ __('site.get_in_touch') }}
					</a>
				</li>
			</ul>
		</div><!-- END REVOLUTION SLIDER -->
	</div>
	<!-- END OF SLIDER WRAPPER -->

    <!-- Start contain wrapp -->
	<div class="contain-wrapp padding-bot50">
		<div class="container">
			<div class="row">
				<div class="col-md-8 col-md-offset-2">
					<div class="title-head centered">
						<h2>{{ config('app.name') }}</h2>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-4">
					<div class="absolute-icon">
						<i class="icon icon-laptop"></i>
						<h4>{{$boxOne->byLocale()->title}}</h4>
						<p>
						{!! $boxOne->byLocale()->content !!}
						</p>
					</div>
				</div>
				<div class="col-md-4">
					<div class="absolute-icon">
						<i class="icon icon-mobile"></i>
						<h4>{{$boxTwo->byLocale()->title}}</h4>
						<p>
							{!! $boxTwo->byLocale()->content !!}
						</p>
					</div>
				</div>
				<div class="col-md-4">
					<div class="absolute-icon">
						<i class="icon icon-desktop"></i>
						<h4>{{$boxThree->byLocale()->title}}</h4>
						<p>
							{!! $boxThree->byLocale()->content !!}
						</p>
					</div>
				</div>
			</div>
		</div>
	</div>
    <!-- End contain wrapp -->

    <!-- Start contain wrapp -->
	<div class="contain-wrapp gray-container padding-bot70">
		<div class="container">
			<div class="row margintop20">
				<div class="col-md-6 marginbot30">
					<!-- Start video wrapp -->
                    <div class="video-wrapper">
                        {{--<div class="play-icon small"><a href="#"><i class="fa fa-play"></i></a></div>--}}
                        <img src="{{url('site')}}/img/AfroVisioN_MG_8101.jpg" class="img-responsive" alt="" />
                        <div id="video1" class="jp-jplayer video"
                             data-media="video"
                             data-title="Big Buck Bunny"
                             data-m4v="{{url('site')}}/video/idea.m4v"
                             data-ogv="{{url('site')}}/video/idea.ogv"
                             data-webmv="{{url('site')}}/video/idea.webm"
                             data-container="#jp_container2"></div>
                        <div id="jp_container2" class="jp-audio">
                            <table class="table-audio">
                                <tr>
                                    <td class="toggle-play">
                                        <a href="#" class="jp-play"><i class="fa fa-play-circle"></i></a>
                                        <a href="#" class="jp-pause"><i class="fa fa-pause"></i></a>
                                    </td>
                                    <td class="time"><span class="jp-current-time"></span></td>
                                    <td class="Progres-audio">
                                        <div class="jp-progress">
                                            <div class="jp-seek-bar">
                                                <div class="jp-play-bar"></div>
                                            </div>
                                        </div>
                                    </td>
	                                {{--join 150+ clients that trust us today--}}
                                    <td class="time"><span class="jp-duration"></span></td>
                                    <td class="toggle-mute">
                                        <a href="#" class="jp-unmute"><i class="fa fa-volume-up"></i></a>
                                          <a href="#" class="jp-mute"><i class="fa fa-volume-down"></i></a>
                                    </td>
                                    <td class="volume-bar">
                                        <div class="jp-volume-bar">
                                            <div class="jp-volume-bar-value"></div>
                                        </div>
                                    </td>
                                </tr>
                            </table>
                            <div class="jp-no-solution">
                                <strong>Update Required</strong>
                                To play the media you will need to either update your browser to a recent version or update your <a href="http://get.adobe.com/flashplayer/" target="_blank">Flash plugin</a>.
                            </div>
                        </div>
                    </div>
                    <!-- End video wrapp -->
				</div>
				<div class="col-md-6">
					<p>
						{!! $coverText->byLocale()->content !!}
					</p>

				</div>
			</div>
		</div>
	</div>
    <!-- End contain wrapp -->

	<!-- Start parallax -->
	<div class="parallax" data-background="{{url('site')}}/avn3.jpg" data-speed="0.5" data-size="50%">
		<div class="overlay"></div>
		<div class="container">
			<div class="content-parallax">
				<div class="row">
					<div class="col-md-10 col-md-offset-1 text-center">
						<div class="headline">
							<h2>{{ $joinClients->byLocale()->title }}</h2>
							<p class="btn-horizontal">
								<a href="{{url('clients')}}" class="btn btn-lg btn-primary">{{ __('site.learn_more') }}</a>
								<a href="{{url('contact')}}" class="btn btn-lg">{{ __('site.get_in_touch') }}</a>
							</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- End parallax -->



    <!-- Start contain wrapp -->
	<div class="contain-wrapp gray-container padding-bot70">
		<div class="container">
			<div class="row">
				<div class="col-md-8 col-md-offset-2">
					<div class="title-head centered">
						<h2>{{ __('index.our_recent_clients') }}</h2>
					</div>
				</div>
			</div>
			<div class="row">
				<div id="gallery" class="masonry gallery box resize">
					<div class="grid-sizer col-md-4 col-sm-6 col-xs-12"></div>

					@foreach($clients as $client)
					<!-- Start Gallery 01 -->
					<div data-filter="web" class="grid-item col-md-4 col-sm-6 col-xs-12">
						<div class="img-wrapper">
							<div class="img-caption capBounceOut">
								<a href="{{url('client/'.$client->slug)}}" >
									{{--<span><i class="icon icon-plus"></i></span>--}}
									<img src="{{url('images/clients/'.$client->image)}}" class="img-responsive" alt="" />

								</a>
							</div>
							<img src="{{url('images/clients/'.$client->image)}}" class="img-responsive" alt="" />
						</div>
						<div class="img-content">
							<h4><a href="{{url('client/'.$client->slug)}}">{{$client->name}}</a></h4>
						</div>
					</div>
					<!-- End Gallery 01 -->
					@endforeach

				</div>
			</div>
		</div>
	</div>
    <!-- Start contain wrapp -->

	<!-- Start parallax -->
	<div class="parallax padding-bot50" data-background="{{url('site')}}/img/parallax/bg12.jpg" data-speed="0.5" data-size="50%">
		<div class="overlay"></div>
		<div class="container">
			<div class="content-parallax">
			<div class="row">
				<div class="col-md-8 col-md-offset-2 owl-column-wrapp text-center">
					<h5 class="head-title">{{ __('index.testimonials') }}</h5>
					<div id="single-item" class="owl-carousel leftControls-right">
						<!-- Start testimoni 1 -->
						@foreach($testimonials as $testimonial)
						<div class="item">
							<div class="single-testimoni">
								<div class="testimoni-contain">
									<blockquote class="centered">
									<p>
										{!!$testimonial->byLocale()->content!!}
									</p>
									</blockquote>
								</div>
								<div class="testimo-author">
									<a href="{{ $testimonial->link }}"><img src="{{url('images/testimonials/'.$testimonial->image)}}" class="testimo-avatar" alt=""/></a>

									<a href="{{$testimonial->slug}}" target="_blank"><span>{{$testimonial->name}}</span></a>
								</div>
							</div>
						</div>
						@endforeach
						<!-- End testimoni 1 -->

					</div>
				</div>
			</div>
			</div>
		</div>
	</div>
	<!-- End parallax -->

	<!-- Start contain wrapp -->
	<div class="contain-wrapp padding-bot10">
		<div class="container">
			<div class="row">
				<div class="col-md-8 col-md-offset-2">
					<div class="title-head centered">
						<h2>{{ __('index.latest_blog') }}</h2>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12 owl-column-wrapp">
					<div id="recent-3column" class="owl-carousel topControls">
						<!-- Start article post 1 -->
						@foreach($posts as $post)
						<div class="item">
							<div class="single-recent-blog">
								<div class="img-wrapper">
									<div class="img-caption capZoomInDown">
										<a href="{{url('post/'.$post->slug)}}" class="zoomer">
											<span><i class="icon icon-attachment"></i></span>
										</a>
									</div>
									<img src="{{url('images/posts/'.$post->image)}}" class="img-responsive" alt="" />
								</div>
								<div class="srb-content">
									<ul class="post-meta">
										<li><a href="#"><i class="fa fa-calendar"></i>{{strftime("%e %B, %Y",strtotime($post->created_at))}}</a></li>
									</ul>
									<h5><a href="{{url('post/'.$post->slug)}}">{{$post->byLocale()->title}}</a></h5>
								</div>
							</div>
						</div>
						@endforeach
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- End contain wrapp -->

	<div class="clearfix"></div>

@endsection
