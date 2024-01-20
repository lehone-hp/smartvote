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
						<h2>About Anakual</h2>
						<p>Anakual is powerful, beautiful, and fully responsive Bootstrap template</p>
					</div>
					<img src="img/macbook-open.png" class="img-responsive" alt="" />
				</div>
			</div>
			<div class="row">
				<div class="col-md-4">
					<div class="absolute-icon">
						<i class="icon icon-profile-male"></i>
						<h4>Who we are</h4>
						<p>
						Cu mentitum complectitur per, erant eleifend cotidieque et mea. Omnis solet vituperata ad his, quo rebum possit efficiantur eu.
						</p>
					</div>
				</div>
				<div class="col-md-4">
					<div class="absolute-icon">
						<i class="icon icon-tools"></i>
						<h4>What we do</h4>
						<p>
						Cu mentitum complectitur per, erant eleifend cotidieque et mea. Omnis solet vituperata ad his, quo rebum possit efficiantur eu.
						</p>
					</div>
				</div>
				<div class="col-md-4">
					<div class="absolute-icon">
						<i class="icon icon-presentation"></i>
						<h4>Goal services</h4>
						<p>
						Cu mentitum complectitur per, erant eleifend cotidieque et mea. Omnis solet vituperata ad his, quo rebum possit efficiantur eu.
						</p>
					</div>
				</div>
			</div>
		</div>
    </div>
	<!-- End contain wrapp -->

	<!-- Start contain wrapp -->
	<div class="contain-wrapp gray-container padding-bot60">
		<div class="container">
			<div class="row">
				<div class="col-md-8 col-md-offset-2">
					<div class="title-head centered">
						<h2>{{ \App\Models\Page::find(54)->byLocale()->title }}</h2>
						<p>{{ \App\Models\Page::find(54)->byLocale()->title }}</p>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12 owl-column-wrapp">
					<div id="recent-3column" class="owl-carousel leftControls-right lg-nav">
						<!-- Start team 1 -->
						<div class="item">
							<div class="img-wrapper">
								<div class="img-caption capZoomInDown">
									<a href="img/team/img01.jpg" data-pretty="prettyPhoto" class="zoomer">
										<span><i class="icon icon-plus"></i></span>
									</a>
								</div>
								<img src="img/team/img01.jpg" class="img-responsive" alt="" />
							</div>
							<div class="team-content">
								<h5>Angling darma</h5>
								<span>Founder</span>
								<div class="team-sosmed">
									<a href="#"><i class="icon icon-facebook"></i></a>
									<a href="#"><i class="icon icon-twitter"></i></a>
									<a href="#"><i class="icon icon-googleplus"></i></a>
									<a href="#"><i class="icon icon-linkedin"></i></a>
								</div>
							</div>
						</div>
						<!-- End team 1 -->

						<!-- Start team 2 -->
						<div class="item">
							<div class="img-wrapper">
								<div class="img-caption capZoomInDown">
									<a href="img/team/img02.jpg" data-pretty="prettyPhoto" class="zoomer">
										<span><i class="icon icon-plus"></i></span>
									</a>
								</div>
								<img src="img/team/img02.jpg" class="img-responsive" alt="" />
							</div>
							<div class="team-content">
								<h5>Angling kusuma</h5>
								<span>Co-Founder</span>
								<div class="team-sosmed">
									<a href="#"><i class="icon icon-facebook"></i></a>
									<a href="#"><i class="icon icon-twitter"></i></a>
									<a href="#"><i class="icon icon-googleplus"></i></a>
									<a href="#"><i class="icon icon-linkedin"></i></a>
								</div>
							</div>
						</div>
						<!-- End team 2 -->

						<!-- Start team 3 -->
						<div class="item">
							<div class="img-wrapper">
								<div class="img-caption capZoomInDown">
									<a href="img/team/img03.jpg" data-pretty="prettyPhoto" class="zoomer">
										<span><i class="icon icon-plus"></i></span>
									</a>
								</div>
								<img src="img/team/img03.jpg" class="img-responsive" alt="" />
							</div>
							<div class="team-content">
								<h5>Batik madrim</h5>
								<span>Manager</span>
								<div class="team-sosmed">
									<a href="#"><i class="icon icon-facebook"></i></a>
									<a href="#"><i class="icon icon-twitter"></i></a>
									<a href="#"><i class="icon icon-googleplus"></i></a>
									<a href="#"><i class="icon icon-linkedin"></i></a>
								</div>
							</div>
						</div>
						<!-- End team 3 -->

						<!-- Start team 4 -->
						<div class="item">
							<div class="img-wrapper">
								<div class="img-caption capZoomInDown">
									<a href="img/team/img04.jpg" data-pretty="prettyPhoto" class="zoomer">
										<span><i class="icon icon-plus"></i></span>
									</a>
								</div>
								<img src="img/team/img04.jpg" class="img-responsive" alt="" />
							</div>
							<div class="team-content">
								<h5>Loro jongrang</h5>
								<span>Designer</span>
								<div class="team-sosmed">
									<a href="#"><i class="icon icon-facebook"></i></a>
									<a href="#"><i class="icon icon-twitter"></i></a>
									<a href="#"><i class="icon icon-googleplus"></i></a>
									<a href="#"><i class="icon icon-linkedin"></i></a>
								</div>
							</div>
						</div>
						<!-- End team 4 -->

						<!-- Start team 5 -->
						<div class="item">
							<div class="img-wrapper">
								<div class="img-caption capZoomInDown">
									<a href="img/team/img05.jpg" data-pretty="prettyPhoto" class="zoomer">
										<span><i class="icon icon-plus"></i></span>
									</a>
								</div>
								<img src="img/team/img05.jpg" class="img-responsive" alt="" />
							</div>
							<div class="team-content">
								<h5>Damar wulan</h5>
								<span>Designer</span>
								<div class="team-sosmed">
									<a href="#"><i class="icon icon-facebook"></i></a>
									<a href="#"><i class="icon icon-twitter"></i></a>
									<a href="#"><i class="icon icon-googleplus"></i></a>
									<a href="#"><i class="icon icon-linkedin"></i></a>
								</div>
							</div>
						</div>
						<!-- End team 5 -->

						<!-- Start team 6 -->
						<div class="item">
							<div class="img-wrapper">
								<div class="img-caption capZoomInDown">
									<a href="img/team/img06.jpg" data-pretty="prettyPhoto" class="zoomer">
										<span><i class="icon icon-plus"></i></span>
									</a>
								</div>
								<img src="img/team/img06.jpg" class="img-responsive" alt="" />
							</div>
							<div class="team-content">
								<h5>Kencana ungu</h5>
								<span>Marketing</span>
								<div class="team-sosmed">
									<a href="#"><i class="icon icon-facebook"></i></a>
									<a href="#"><i class="icon icon-twitter"></i></a>
									<a href="#"><i class="icon icon-googleplus"></i></a>
									<a href="#"><i class="icon icon-linkedin"></i></a>
								</div>
							</div>
						</div>
						<!-- End team 6 -->
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- End contain wrapp -->

	<div class="clearfix"></div>

@endsection
