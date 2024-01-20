@extends('layouts.site')

@section('content')


<!-- Start parallax -->
<div class="parallax" data-background="{{url('site')}}/img/sub-page-banner-real.jpg" data-speed="0.5" data-size="50%">
		<div class="overlay white"></div>
		<div class="container">
			<div class="inner-head">
				<div class="row">
					<div class="col-md-12 text-center">
						<h4>{{$content->byLocale()->title}}</h4>
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
			<div class="col-md-6">
				<div class="title-head">
					<h2>{{$content->byLocale()->title}}</h2>
					<p>
						{!!  \App\Models\Page::find(36)->byLocale()->content !!}
					</p>
				</div>

			</div>
			<div class="col-md-6">
				<img src="{{url('site')}}/img/AfroVisioN_MG_8140.jpg" class="img-responsive" alt="" />
				{{--<div style="height: 150px"></div>--}}
				{{--<img src="{{url('site/img/macbook-up.png')}}" class="img-responsive" alt="" />--}}
				{{--<img src="{{url('site/img/macbook-up.png')}}" class="img-responsive" alt="" style="height: 80px"/>--}}
				{{--<img src="{{url('site/img/macbook-up.png')}}" class="img-responsive" alt="" />--}}
			</div>
		</div>
		
			{!! $content->byLocale()->content !!}

	</div>
</div>
<!-- End contain wrapp -->



	<div class="clearfix"></div>

@endsection
