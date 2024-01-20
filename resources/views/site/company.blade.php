@extends('layouts.site')

@section('content')

<!-- Start parallax -->
<div class="parallax" data-background="{{url('site')}}/img/sub-page-banner-real.jpg" data-speed="0.5" data-size="50%">
		<div class="overlay white"></div>
		<div class="container">
			<div class="inner-head">
				<div class="row">
					<div class="col-md-12 text-center">
						<h4>{{ $profile->byLocale()->title }}</h4>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- End parallax -->

	<div class="contain-wrapp gray-container">
		<div class="container">
			<div class="row">
				<div class="col-md-6">
					<div class="title-head">
						<h2>{{ $profile->byLocale()->title }}</h2>
						<p>
							{!! $profile->byLocale()->content !!}
						</p>
					</div>

				</div>
				<div class="col-md-6">
{{--					<img src="{{url('site/img/macbook-up.png')}}" class="img-responsive" alt="" />--}}
					<img src="{{url('site')}}/img/AfroVisioN_MG_8100.jpg" class="img-responsive" alt="" />
				</div>
			</div>
		</div>
	</div>

	<div class="contain-wrapp gray-container" style="background-color: #fff;">
		<div class="container">
			<div class="row">
				<div class="col-md-6">
{{--					<img src="{{url('site/img/macbook-up.png')}}" class="img-responsive" alt="" />--}}
					<img src="{{url('site')}}/img/Location_Cameroon_AU_Africa.jpeg" class="img-responsive" alt="" />
				</div>
				<div class="col-md-6">
					<div class="title-head">
						<h2>{{ $why->byLocale()->title }}</h2>
						<p>
							{!! $why->byLocale()->content !!}
						</p>
					</div>

				</div>
			</div>
		</div>
	</div>




@endsection
