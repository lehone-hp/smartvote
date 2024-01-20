@extends('layouts.site')

@section('content')

<!-- Start parallax -->
<div class="parallax" data-background="{{url('site')}}/img/sub-page-banner-real.jpg" data-speed="0.5" data-size="50%">
		<div class="overlay white"></div>
		<div class="container">
			<div class="inner-head">
				<div class="row">
					<div class="col-md-12 text-center">
						<h4>{{ $post->byLocale()->title }}</h4>
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
					<!-- Start singlepost -->
					<article class="post">
						<h5>{{$post->byLocale()->title}}</h5>
						<ul class="post-meta">
							<li><a href="#"><i class="fa fa-calendar"></i> {{strftime("%e %B, %Y",strtotime($post->created_at))}}</a></li>
							<li>
								<a href="{{url('blog/category/'.$post->category->slug) }}">
									<i class="fa fa-file-text"></i> {{$post->category->byLocale()->title}}
								</a>
							</li>
						</ul>
						<div class="media-wrapper">
							<!-- Start Images slider -->
							<img class="img-responsive" src="{{ url('images/posts/'.$post->image) }}" alt="">
							<!-- End Images slider -->
						</div>


						<p>
							{!! $post->byLocale()->content !!}
						</p>

						<ul class="post-meta">
							<li><a href="#"><i class="fa fa-calendar"></i> 11/08/2016</a></li>
							<li><a href="#"><i class="fa fa-user"></i> Pitung</a></li>
							<li><a href="#"><i class="fa fa-file-text"></i> Web design</a></li>
							<li><a href="#"><i class="fa fa-comments"></i> 0</a></li>
						</ul>
					</article>
					<!-- End singlepost -->

					<!-- Start leave comments -->
					<h5>Leave comments</h5>
					<form  action="{{ route('comment_validate') }}" method="POST" id="commentForm" class="row">
						{{ csrf_field() }}
						<div class="col-md-6 marginbot30">
							<input type="text" name="name" id="name_comment" class="form-control input-lg required" placeholder=" {{ __('contact.enter_your_full_name') }}">
							@if ($errors->has('name'))
								<span data-for="name" class="error">
                                        <strong>{{ __('validation.comment_validate.name') }}</strong>
                                    </span>
							@endif
						</div>
						<div class="col-md-6 marginbot30">
							<input type="email" name="email" id="email_comment" class="form-control input-lg required" placeholder=" {{ __('contact.enter_your_email') }}">
							@if ($errors->has('email'))
								<span data-for="email" class="error">
                                        <strong>{{ __('validation.comment_validate.email') }}</strong>
                                    </span>
							@endif
						</div>
						<div class="col-md-12 marginbot30">
							<textarea name="message" id="message_comment" class="form-control input-lg required" placeholder=" {{ __('contact.write') }}" rows="9"></textarea>
							@if ($errors->has('message'))
								<span data-for="message" class="error">
                                        <strong>{{ __('validation.comment_validate.message') }}</strong>
                                    </span>
							@endif
						</div>
						<div class="col-md-12">
							<input type="submit" value="leave comment" class="btn btn-rounded btn-primary" name="Submit" />
						</div>
					</form>
	`				<!-- End leave comments -->

					<div class="divider margintop25 marginbot40"></div>

					<!-- Start comments -->
					<h5>Comments (5)</h5>

				</div>
				<div class="col-md-3 col-sm-3">
					<aside>
						<div class="widget">
							<h5 class="widget-head">Recent work</h5>
							<ul class="photostream">
								@foreach(\App\Models\Post::orderBy('created_at', 'desc')->take(8)->get() as $post)
									<li><a href="{{url('post/'.$post->slug)}}"><img src="{{url('images/posts/'.$post->thumb)}}" class="img-responsive" alt="" /></a></li>
								@endforeach
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
								 @foreach(\App\Models\Post::take(4)->get() as $post)

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
