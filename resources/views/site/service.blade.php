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
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- End parallax -->

		<div class="contain-wrapp gray-container" style="background-color: #fff;">
		<div class="container">
			<div class="row">
				<div class="col-md-6">
					<div class="title-head">
						<h2>{{ $service->byLocale()->title }}</h2>
						<p>
							{!! $service->byLocale()->content !!}
						</p>
					</div>

				</div>
				<div class="col-md-6">
					<img src="{{url('images/services/'.$service->image)}}" class="img-responsive" alt="" />
				</div>
			</div>
		</div>
	</div>




@endsection
