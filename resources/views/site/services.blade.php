@extends('layouts.site')

@section('content')

	<div class="parallax" data-background="{{url('site')}}/img/sub-page-banner-real.jpg" data-speed="0.5" data-size="50%">
		<div class="overlay white"></div>
		<div class="container">
			<div class="inner-head">
				<div class="row">
					<div class="col-md-12 text-center">
						<h4>{{ \App\Models\Page::find(41)->byLocale()->title }}</h4>
						<ol class="breadcrumb">
							<li><a href="{{url('/')}}">{{__('site.home')}}</a></li>
							<li class="active">{{ \App\Models\Page::find(41)->byLocale()->title }}</li>
						</ol>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- End parallax -->

    <!-- Start contain wrapp -->
	<div class="contain-wrapp padding-bot70">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="title-head">
						<h2>{{ \App\Models\Page::find(41)->byLocale()->title }}</h2>

					</div>
				</div>
			</div>
			<div class="row">
				@foreach($services as $service)
				<div class="col-md-4">
					<div class="thumbnail">
						<div class="img-wrapper">
							<img src="{{url('images/services/'.$service->image)}}" class="img-responsive" alt="{{$service->byLocale()->title}}" />
						</div>
						<div class="content" style="height: 120px;">
							<h4>
								<a href="{{url('service/'.$service->slug)}}">{{$service->byLocale()->title}}</a>
							</h4>
						</div>
					</div>
				</div>
				@endforeach

			</div>
		</div>
	</div>
    <!-- End contain wrapp -->

	<!-- Start contain wrapp -->
	{{--<div class="contain-wrapp gray-container padding-bot70">--}}
		{{--<div class="container">--}}
			{{--<div class="row">--}}
				{{--<div class="col-md-8 col-md-offset-2">--}}
					{{--<div class="title-head centered">--}}
						{{--<h2>Recent project done</h2>--}}
						{{--<p>More than 1000 free and premium high-quality design</p>--}}
					{{--</div>--}}
				{{--</div>--}}
			{{--</div>--}}
			{{--<div class="row marginbot20">--}}
				{{--<div class="col-md-12 owl-column-wrapp">--}}
					{{--<div id="recent-4column" class="owl-carousel leftControls-right lg-nav">--}}
						{{--<!-- Start team 1 -->--}}
						{{--<div class="item">--}}
							{{--<div class="img-wrapper">--}}
								{{--<div class="img-caption capBounceOut">--}}
									{{--<a href="{{url('site')}}/img/gallery/zoom980x980.jpg" data-pretty="prettyPhoto" class="zoomer">--}}
										{{--<span><i class="icon icon-plus"></i></span>--}}
									{{--</a>--}}
								{{--</div>--}}
								{{--<img src="{{url('site')}}/img/gallery/670x544/img01.jpg" class="img-responsive" alt="" />--}}
							{{--</div>--}}
							{{--<div class="img-content">--}}
								{{--<h4><a href="portfolio-detail.html">Dissentias</a></h4>--}}
								{{--<span>By 99webpage</span>--}}
							{{--</div>--}}
						{{--</div>--}}
						{{--<!-- End team 1 -->--}}

						{{--<!-- Start team 2 -->--}}
						{{--<div class="item">--}}
							{{--<div class="img-wrapper">--}}
								{{--<div class="img-caption capBounceOut">--}}
									{{--<a href="{{url('site')}}/img/gallery/zoom980x980.jpg" data-pretty="prettyPhoto" class="zoomer">--}}
										{{--<span><i class="icon icon-plus"></i></span>--}}
									{{--</a>--}}
								{{--</div>--}}
								{{--<img src="{{url('site')}}/img/gallery/670x544/img02.jpg" class="img-responsive" alt="" />--}}
							{{--</div>--}}
							{{--<div class="img-content">--}}
								{{--<h4><a href="portfolio-detail.html">Expetendis</a></h4>--}}
								{{--<span>By 99webpage</span>--}}
							{{--</div>--}}
						{{--</div>--}}
						{{--<!-- End team 2 -->--}}

						{{--<!-- Start team 3 -->--}}
						{{--<div class="item">--}}
							{{--<div class="img-wrapper">--}}
								{{--<div class="img-caption capBounceOut">--}}
									{{--<a href="{{url('site')}}/img/gallery/zoom980x980.jpg" data-pretty="prettyPhoto" class="zoomer">--}}
										{{--<span><i class="icon icon-plus"></i></span>--}}
									{{--</a>--}}
								{{--</div>--}}
								{{--<img src="{{url('site')}}/img/gallery/670x544/img03.jpg" class="img-responsive" alt="" />--}}
							{{--</div>--}}
							{{--<div class="img-content">--}}
								{{--<h4><a href="portfolio-detail.html">Sadipscing</a></h4>--}}
								{{--<span>By 99webpage</span>--}}
							{{--</div>--}}
						{{--</div>--}}
						{{--<!-- End team 3 -->--}}

						{{--<!-- Start team 4 -->--}}
						{{--<div class="item">--}}
							{{--<div class="img-wrapper">--}}
								{{--<div class="img-caption capBounceOut">--}}
									{{--<a href="{{url('site')}}/img/gallery/zoom980x980.jpg" data-pretty="prettyPhoto" class="zoomer">--}}
										{{--<span><i class="icon icon-plus"></i></span>--}}
									{{--</a>--}}
								{{--</div>--}}
								{{--<img src="{{url('site')}}/img/gallery/670x544/img04.jpg" class="img-responsive" alt="" />--}}
							{{--</div>--}}
							{{--<div class="img-content">--}}
								{{--<h4><a href="portfolio-detail.html">Philosophia</a></h4>--}}
								{{--<span>By 99webpage</span>--}}
							{{--</div>--}}
						{{--</div>--}}
						{{--<!-- End team 4 -->--}}

						{{--<!-- Start team 5 -->--}}
						{{--<div class="item">--}}
							{{--<div class="img-wrapper">--}}
								{{--<div class="img-caption capBounceOut">--}}
									{{--<a href="{{url('site')}}/img/gallery/zoom980x980.jpg" data-pretty="prettyPhoto" class="zoomer">--}}
										{{--<span><i class="icon icon-plus"></i></span>--}}
									{{--</a>--}}
								{{--</div>--}}
								{{--<img src="{{url('site')}}/img/gallery/670x544/img05.jpg" class="img-responsive" alt="" />--}}
							{{--</div>--}}
							{{--<div class="img-content">--}}
								{{--<h4><a href="portfolio-detail.html">Consulatu</a></h4>--}}
								{{--<span>By 99webpage</span>--}}
							{{--</div>--}}
						{{--</div>--}}
						{{--<!-- End team 5 -->--}}

						{{--<!-- Start team 6 -->--}}
						{{--<div class="item">--}}
							{{--<div class="img-wrapper">--}}
								{{--<div class="img-caption capBounceOut">--}}
									{{--<a href="{{url('site')}}/img/gallery/zoom980x980.jpg" data-pretty="prettyPhoto" class="zoomer">--}}
										{{--<span><i class="icon icon-plus"></i></span>--}}
									{{--</a>--}}
								{{--</div>--}}
								{{--<img src="{{url('site')}}/img/gallery/670x544/img06.jpg" class="img-responsive" alt="" />--}}
							{{--</div>--}}
							{{--<div class="img-content">--}}
								{{--<h4><a href="portfolio-detail.html">Efficiendi</a></h4>--}}
								{{--<span>By 99webpage</span>--}}
							{{--</div>--}}
						{{--</div>--}}
						{{--<!-- End team 6 -->--}}

						{{--<!-- Start team 7 -->--}}
						{{--<div class="item">--}}
							{{--<div class="img-wrapper">--}}
								{{--<div class="img-caption capBounceOut">--}}
									{{--<a href="{{url('site')}}/img/gallery/zoom980x980.jpg" data-pretty="prettyPhoto" class="zoomer">--}}
										{{--<span><i class="icon icon-plus"></i></span>--}}
									{{--</a>--}}
								{{--</div>--}}
								{{--<img src="{{url('site')}}/img/gallery/670x544/img07.jpg" class="img-responsive" alt="" />--}}
							{{--</div>--}}
							{{--<div class="img-content">--}}
								{{--<h4><a href="portfolio-detail.html">Reformidans</a></h4>--}}
								{{--<span>By 99webpage</span>--}}
							{{--</div>--}}
						{{--</div>--}}
						{{--<!-- End team 7 -->--}}

						{{--<!-- Start team 8 -->--}}
						{{--<div class="item">--}}
							{{--<div class="img-wrapper">--}}
								{{--<div class="img-caption capBounceOut">--}}
									{{--<a href="{{url('site')}}/img/gallery/zoom980x980.jpg" data-pretty="prettyPhoto" class="zoomer">--}}
										{{--<span><i class="icon icon-plus"></i></span>--}}
									{{--</a>--}}
								{{--</div>--}}
								{{--<img src="{{url('site')}}/img/gallery/670x544/img08.jpg" class="img-responsive" alt="" />--}}
							{{--</div>--}}
							{{--<div class="img-content">--}}
								{{--<h4><a href="portfolio-detail.html">Evertitur</a></h4>--}}
								{{--<span>By 99webpage</span>--}}
							{{--</div>--}}
						{{--</div>--}}
						{{--<!-- End team 8 -->--}}
					{{--</div>--}}
				{{--</div>--}}
			{{--</div>--}}
		{{--</div>--}}
	{{--</div>--}}
	<!-- End contain wrapp -->

	<div class="clearfix"></div>

@endsection
