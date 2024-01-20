@extends('layouts.site')

@section('content')

	<div class="parallax" data-background="{{url('site')}}/img/sub-page-banner-real.jpg" data-speed="0.5" data-size="50%">
	<div class="overlay white"></div>
		<div class="container">
			<div class="inner-head">
				<div class="row">
					<div class="col-md-12 text-center">
						<h4>{{$titles}}</h4>
						<!-- <ol class="breadcrumb">
							<li><a href="#">Home</a></li>
							<li><a href="#">Pages</a></li>
							<li class="active">Blog</li>
						</ol> -->
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- End parallax -->

	<!-- Start contain wrapp -->
	<div class="contain-wrapp padding-bot60">
		<div class="container">
			<div class="row">
				<div class="col-md-9 col-sm-9">
					<div class="title-head">
						<h2>{{$titles}}</h2>
					</div>

					<!-- Start post 2 -->
					@foreach($posts as $post)
					<article class="row post">
						<h4><a href="{{url('post/'.$post->slug)}}">{{$post->byLocale()->title}}</a></h4>
						<div class="col-md-5">
							<div class="media-wrapper">
								<img src="{{url('images/posts/'.$post->image)}}" class="img-thumbnail img-responsive" alt="" />
							</div>
						</div>

						<div class="col-md-7">
							<!-- <h4><a href="{{url('post/'.$post->slug)}}"></a></h4> -->
							<ul class="post-meta">
								<li><a href="{{url('post/'.$post->slug)}}"><i class="fa fa-calendar"></i>{{strftime("%e %B, %Y",strtotime($post->created_at))}}</a></li>
								<li><a href="{{url('blog/category/'.$post->category->slug)}}"><i class="fa fa-file-text"></i>{{$post->category->byLocale()->title}}</a></li>
							</ul>
							<p>
								{!! substr($post->byLocale()->content, 0, 120) !!}
							</p>
							<p><a href="{{url('post/'.$post->slug)}}" class="btn btn-primary">Read more</a></p>
						</div>
					</article>
					@endforeach
					<!-- End post 2 -->

					<nav>
						<ul class="pagination">
							{{$posts->render()}}
						</ul>
					</nav>
				</div>
				<div class="col-md-3 col-sm-3">
					<aside>
						<div class="widget">
							<h5 class="widget-head">{{ __('site.recent_work') }}</h5>
							<ul class="photostream">
								@foreach(\App\Models\Post::orderBy('created_at', 'desc')->take(8)->get() as $post)
									<li><a href="{{url('post/'.$post->slug)}}"><img src="{{url('images/posts/'.$post->thumb)}}" class="img-responsive" alt="" /></a></li>
								@endforeach
								{{--<li><a href="#"><img src="img/gallery/thumbs/img01.jpg" class="img-responsive" alt="" /></a></li>--}}
								{{--<li><a href="#"><img src="img/gallery/thumbs/img02.jpg" class="img-responsive" alt="" /></a></li>--}}
								{{--<li><a href="#"><img src="img/gallery/thumbs/img03.jpg" class="img-responsive" alt="" /></a></li>--}}
								{{--<li><a href="#"><img src="img/gallery/thumbs/img04.jpg" class="img-responsive" alt="" /></a></li>--}}
								{{--<li><a href="#"><img src="img/gallery/thumbs/img05.jpg" class="img-responsive" alt="" /></a></li>--}}
								{{--<li><a href="#"><img src="img/gallery/thumbs/img06.jpg" class="img-responsive" alt="" /></a></li>--}}
								{{--<li><a href="#"><img src="img/gallery/thumbs/img07.jpg" class="img-responsive" alt="" /></a></li>--}}
								{{--<li><a href="#"><img src="img/gallery/thumbs/img08.jpg" class="img-responsive" alt="" /></a></li>--}}
							</ul>
						</div>
						<div class="widget">
							<h5 class="widget-head">Categories</h5>
							<ul class="cat">
								@foreach(\App\Models\Category::all() as $category)
									<li><a href="{{url('blog/category/'.$category->slug)}}">{{$category->byLocale()->title}}</a></li>
                            	@endforeach
							</ul>
						</div>
						<div class="widget">
							<h5 class="widget-head">Popular article</h5>
							<div class="recent-widget">
								 @foreach($posts as $post)

                            <div class="post">
									<a href="{{url('post/'.$post->slug)}}" class="post-thumbnail">
										<img src="{{url('images/posts/'.$post->thumb)}}" class="img-thumb" alt="{{$post->byLocale()->title}}" width="60" />
									</a>
									<h6><a href="{{url('post/'.$post->slug)}}">{{$post->byLocale()->title}}</a></h6>
								</div>
                            @endforeach


							</div>
						</div>

						<div class="widget">
							<h5 class="widget-head">Follow us</h5>
							@foreach(\App\Models\Social::all() as $social)
								@if($social->link !== null && $social->name == 'Facebook')
									<a href="{{ $social->link }}" class="btn btn-facebook btn-icon btn-block">Facebook <i class="fa fa-facebook"></i></a>
								@elseif($social->link !== null && $social->name == 'Twitter')
									<a href="{{ $social->link }}" class="btn btn-twitter btn-icon btn-block">Twitter <i class="fa fa-twitter"></i></a>
								@elseif($social->link !== null && $social->name == 'LinkedIn')
									<a href="{{ $social->link }}" class="btn btn-linkedin btn-icon btn-block">LinkedIn <i class="fa fa-linkedin"></i></a>
								@elseif($social->link !== null && $social->name == 'Google Plus')
									<a href="{{ $social->link }}" class="btn btn-google-plus btn-icon btn-block">Google plus <i class="fa fa-google-plus"></i></a>
								@endif
							@endforeach

							{{--<a href="#" class="btn btn-facebook btn-icon btn-block">Facebook <i class="fa fa-facebook"></i></a>--}}
							{{--<a href="#" class="btn btn-twitter btn-icon btn-block">Twitter <i class="fa fa-twitter"></i></a>--}}
							{{--<a href="#" class="btn btn-google-plus btn-icon btn-block">Google plus <i class="fa fa-google-plus"></i></a>--}}
							{{--<a href="#" class="btn btn-pinterest btn-icon btn-block">Pinterest <i class="fa fa-pinterest"></i></a>--}}
							{{--<a href="#" class="btn btn-dribbble btn-icon btn-block">Dribbble <i class="fa fa-dribbble"></i></a>--}}
							{{--<a href="#" class="btn btn-instagram btn-icon btn-block">Instagram <i class="fa fa-instagram"></i></a>--}}

						</div>
					</aside>
				</div>
			</div>
		</div>
    </div>
	<!-- End contain wrapp -->

	<div class="clearfix"></div>

@endsection
