@extends('layouts.site')

@section('content')

	<div class="parallax" data-background="{{url('site')}}/img/sub-page-banner-real.jpg" data-speed="0.5" data-size="50%">
		<div class="overlay white"></div>
		<div class="container">
			<div class="inner-head">
				<div class="row">
					<div class="col-md-12 text-center">
						<h4>{{ $content->byLocale()->title }}</h4>
					</div>
				</div>
			</div>
		</div>
	</div>

<div class="contain-wrapp gray-container">
	<div class="container">
		<div class="row">
			<div class="col-md-6">
				<div class="title-head">
					<h2>{{ $content->byLocale()->title }}</h2>
					<p>
						{!! $content->byLocale()->content !!}
					</p>
				</div>

			</div>
			<div class="col-md-6">
				<img src="{{url('site')}}/img/AfroVisioN_MG_8192.jpg" class="img-responsive" alt="" /><div style="height: 400px"></div>
				<img src="{{url('site')}}/img/AfroVisioN_MG_8076.jpg" class="img-responsive" alt="" /><div style="height: 400px"></div>
				<img src="{{url('site')}}/img/AfroVisioN_MG_8180.jpg" class="img-responsive" alt="" /><div style="height: 400px"></div>
				<img src="{{url('site')}}/img/AfroVisioN_MG_8147.jpg" class="img-responsive" alt="" /><div style="height: 400px"></div>
			</div>
		</div>
	</div>
</div>

@endsection
