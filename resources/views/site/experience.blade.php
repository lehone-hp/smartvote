@extends('layouts.site')

@section('content')


<!-- Start parallax -->
<div class="parallax" data-background="{{url('site')}}/img/sub-page-banner-real.jpg" data-speed="0.5" data-size="50%">
		<div class="overlay white"></div>
		<div class="container">
			<div class="inner-head">
				<div class="row">
					<div class="col-md-12 text-center">
						<h4>{{ $success->byLocale()->title }}</h4>
						<ol class="breadcrumb">
							<li><a href="#">Home</a></li>
							<li class="active">{{ $success->byLocale()->title }}</li>
						</ol>
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
					<h2>{{ $success->byLocale()->title }}</h2>
					<p>
						{!! $success->byLocale()->content !!}
					</p>
				</div>

			</div>
			<div class="col-md-6">
				<img src="{{url('site')}}/img/AfroVisioN_MG_8109.jpg" class="img-responsive" alt="" /><div style="height: 400px"></div>
			</div>
		</div>
	</div>
</div>

	<
	<!-- Start contain wrapp -->
	<div class="contain-wrapp gray-container padding-bot60">
		<div class="container">
			<div class="row">
				<div class="col-md-8 col-md-offset-2">
					<div class="title-head centered">
						<h2>{{ \App\Models\Page::find(54)->byLocale()->title }}</h2>
						<p>{{ \App\Models\Page::find(54)->byLocale()->content }}</p>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12 owl-column-wrapp">
					<div id="recent-3column" class="owl-carousel leftControls-right lg-nav">
						<!-- Start team 1 -->
						@foreach(\App\Models\Team::all() as $member)
							<div class="item">
								<div class="img-wrapper">
									<div class="img-caption capZoomInDown">
										<a href="{{ url('images/members/'.$member->image) }}" data-pretty="prettyPhoto" class="zoomer">
											<img src="{{ url('images/members/'.$member->image) }}" class="img-responsive" alt="" />

											{{--<span><i class="icon icon-plus"></i></span>--}}
										</a>
									</div>
									<img src="{{ url('images/members/'.$member->image) }}" class="img-responsive" alt="" />
								</div>
								<div class="team-content">
									<h5>{{ $member->name }}</h5>
									<span>{{ $member->position }}</span>
									<div class="team-sosmed">
										@if($member->facebook != null)
											<a href="{{ $member->facebook }}"><i class="icon icon-facebook"></i></a>
										@elseif($member->twitter != null)
											<a href="{{ $member->twitter }}"><i class="icon icon-twitter"></i></a>
										@elseif($member->linkedin != null)
											<a href="{{ $member->linkedin }}"><i class="icon icon-linkedin"></i></a>
										@endif

									</div>
								</div>
							</div>
						@endforeach
						<!-- End team 1 -->

					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- End contain wrapp -->

	<div class="clearfix"></div>

@endsection
