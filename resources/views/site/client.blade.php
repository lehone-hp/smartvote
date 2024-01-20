@extends('layouts.site')

@section('content')


<!-- Start parallax -->
<div class="parallax" data-background="{{url('site')}}/img/sub-page-banner-real.jpg" data-speed="0.5" data-size="50%">
		<div class="overlay white"></div>
		<div class="container">
			<div class="inner-head">
				<div class="row">
					<div class="col-md-12 text-center">
						<h4>{{$client->name}}</h4>

					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- End parallax -->

	<!-- Start contain wrapp -->
	<div class="contain-wrapp padding-bot70" >
		<div class="container">
			<div class="row">
				<div class="col-md-6">
					<img class="img-responsive" src="{{url('images/clients/'.$client->image)}}" alt="">


				</div>
				<div class="col-md-6">
					<h4>{{$client->name}} :</h4>
					<p>
						{!! $client->byLocale()->content !!}
					</p>
				</div>
			</div>

		</div>
    </div>
	<!-- End contain wrapp -->


	<div class="clearfix"></div>

@endsection
