@extends('layouts.site')

@section('content')


<!-- Start parallax -->
<div class="parallax" data-background="{{url('site')}}/img/sub-page-banner-real.jpg" data-speed="0.5" data-size="50%">
		<div class="overlay white"></div>
		<div class="container">
			<div class="inner-head">
				<div class="row">
					<div class="col-md-12 text-center">
						<h4>{{ \App\Models\Page::find(31)->byLocale()->title }}</h4>
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
						<h2>{{ \App\Models\Page::find(31)->byLocale()->title }}</h2>
						<p>
							{!! $content->byLocale()->content !!}
						</p>
					</div>

				</div>
				<div class="col-md-6">
					<img src="{{url('site')}}/img/AfroVisioN_MG_8184.jpg" class="img-responsive" alt="" />
				</div>
			</div>
		</div>
	</div>

	<!-- Start contain wrapp -->
<div class="contain-wrapp gray-container padding-bot60">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="title-head">
						<h2>{{ \App\Models\Page::find(54)->byLocale()->title }}</h2>
					</div>
				</div>
			</div>
			<div class="row">
				@foreach($members as $member)
				<div class="col-md-4">
					<div class="item">
							<div class="img-wrapper">
								<div class="img-caption capZoomInDown">
									<a href="{{url('images/members/'.$member->image)}}" data-pretty="prettyPhoto" class="zoomer">
										<span><i class="icon icon-plus"></i></span>
									</a>
								</div>
								<img src="{{url('images/members/'.$member->image)}}" class="img-responsive" alt="" />
							</div>
							<div class="team-content">
								<h5>{{$member->name}}</h5>
								<span>{{ $member->position }}</span>
								<div class="team-sosmed">
									@if($member->facebook != null)
										<a href="{{ $member->facebook }}"><i class="icon icon-facebook"></i></a>
									@endif
									@if($member->twitter != null)
										<a href="{{ $member->twitter }}"><i class="icon icon-twitter"></i></a>
									@endif
									@if($member->linkedin != null)
										<a href="{{ $member->linkedin }}"><i class="icon icon-linkedin"></i></a>
									@endif

								</div>
							</div>
						</div>
				</div>
				@endforeach
			</div>
		</div>
	</div>

	<div class="clearfix"></div>

@endsection
