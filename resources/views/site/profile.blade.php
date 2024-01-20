@extends('layouts.site')

@section('content')


<!-- Start parallax -->
<div class="parallax" data-background="{{url('site')}}/img/sub-page-banner-real.jpg" data-speed="0.5" data-size="50%">
		<div class="overlay white"></div>
		<div class="container">
			<div class="inner-head">
				<div class="row">
					<div class="col-md-12 text-center">
						<h4>{{$title}}</h4>
						<ol class="breadcrumb">
							<li><a href="#">Home</a></li>
							<li class="active">{{$title}}</li>
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
			<div class="row marginbot60">
				<div class="col-md-8 col-md-offset-2">
					<div class="title-head centered">
						<h2>{{$content->byLocale()->title}}</h2>
						<p>Anakual is powerful, beautiful, and fully responsive Bootstrap template</p>
					</div>
					<img src="img/macbook-open.png" class="img-responsive" alt="" />
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<div class="absolute-icon">
						<p>
						{!! $content->byLocale()->content !!}
						</p>
					</div>
				</div>

			</div>
		</div>
    </div>
	<!-- End contain wrapp -->



	<div class="clearfix"></div>

@endsection
