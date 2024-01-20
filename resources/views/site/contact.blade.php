@extends('layouts.site')

@section('content')

	<div class="parallax" data-background="{{url('site')}}/img/sub-page-banner-real.jpg" data-speed="0.5" data-size="50%">
		<div class="overlay white"></div>
		<div class="container">
			<div class="inner-head">
				<div class="row">
					<div class="col-md-12 text-center">
						<h4>{{$title}}</h4>
						<ol class="breadcrumb">
							<li><a href="{{url('/')}}"> {{ __('site.home') }}</a></li>
							<li class="active"> {{ __('contact.contact') }}</li>
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
				<div class="col-md-8">
					<div class="title-head">
						<h4>{{ __('contact.get_in_touch_with_us') }}</h4>
						<p>{{ __('contact.f_a_q_1') }} <a href="#">F.A.Q</a> {{ __('contact.f_a_q_2') }}</p>

						@if (session('status'))
							<div class="alert alert-success">
								{{ session('status') }}
							</div>
						@endif
						@if($errors->count() >0)
							<div class="alert alert-danger">Error!!
								Message Not Sent
							</div>
						@endif
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-8 col-sm-7">
					<!-- Start Form -->
					<form  action="{{ route('contact_validate') }}" method="POST" id="mycontactform">

						{{ csrf_field() }}
						<div class="clearfix"></div>
						<div id="success"></div>
						<div class="row wrap-form">
							<div class="form-group col-md-6 col-sm-6">
								<h6> {{ __('contact.full_name') }}</h6>
								<input type="text" name="name" id="name" value="{{ old('name') }}" class="form-control input-lg required" placeholder=" {{ __('contact.enter_your_full_name') }}">
								@if ($errors->has('name'))
									<span data-for="name" class="error">
                                        <strong>{{ __('validation.contact_page.name') }}</strong>
                                    </span>
								@endif
							</div>
							<div class="form-group col-md-6 col-sm-6">
								<h6> {{ __('contact.email') }}</h6>
								<input type="email" name="email" id="email" value="{{ old('email') }}" class="form-control input-lg required" placeholder=" {{ __('contact.enter_your_email') }}">
								@if ($errors->has('email'))
									<span data-for="email" class="error">
                                        <strong>{{ __('validation.contact_page.email') }}</strong>
                                    </span>
								@endif
							</div>
							<div class="form-group col-md-12">
								<h6> {{ __('contact.your_message') }}</h6>
								<textarea value="{{ old('message') }}" name="message" id="message"  class="form-control input-lg required" placeholder=" {{ __('contact.write') }}" rows="9"></textarea>
								@if ($errors->has('message'))
									<span data-for="message" class="error">
                                        <strong>{{ __('validation.contact_page.message') }}</strong>
                                    </span>
								@endif
							</div>
							<div class="form-group col-md-12 margintop5">
								<input type="submit" value=" {{ __('contact.send_message') }}" id="submit" class="btn btn-primary btn-lg"/>
								<div class="status-progress"></div>
							</div>
						</div>
					</form>
					<!-- End Form -->
				</div>
				<div class="col-md-4 col-sm-5">
					<div class="contact-detail">
						<ul class="list-unstyled">
							<li>
								<div class="absolute-icon">
									<i class="icon icon-map"></i>
									<h6>Our Location</h6>
									<p>
									AfroVision Group, Molyko Buea<br />
									P. O. Box, 90 Buea <br />
									Fako Division, SWR, Cameroon
									</p>
								</div>
							</li>
							<li>
								<div class="absolute-icon">
									<i class="icon icon-mobile"></i>
									<h6>Telephone</h6>
									<p>
									+237 674 472 309 <br /> +237 697 841 975
									</p>
								</div>
							</li>
							<li>
								<div class="absolute-icon">
									<i class="icon icon-envelope"></i>
									<h6>Email address</h6>
									<p>
									 info@afrovisiongroup.com
									</p>
								</div>
							</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
    </div>
	<!-- End contain wrapp -->

	<div class="clearfix"></div>

@endsection
