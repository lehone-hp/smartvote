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

	<!-- Start contain wrapp -->
	<div class="contain-wrapp padding-bot70" >
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<h2>{{$title}}</h2>

					<!-- Start gallery filter  -->
					<!-- <ul class="filter-items">
						<li><a href="#" data-filter="" class="active">All</a></li>
						<li><a href="#" data-filter="web">Web</a></li>
						<li><a href="#" data-filter="graphic">Graphic</a></li>
						<li><a href="#" data-filter="logo">Logo</a></li>
						<li><a href="#" data-filter="app">App</a></li>
					</ul> -->
					<!-- End gallery filter -->
				</div>
			</div>
			<div class="row">
				<div id="gallery" class="masonry gallery box resize">
					<div class="grid-sizer col-md-4 col-sm-6 col-xs-12"></div>
					<!-- Start Gallery 01 -->
					@foreach($clients as $client)
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
					@endforeach
					<!-- End Gallery 01 -->

				</div>
			</div>

		</div>
{{--		{{ $clients->links() }}--}}

	</div>
	<!-- End contain wrapp -->

	<div class="clearfix"></div>



@endsection
