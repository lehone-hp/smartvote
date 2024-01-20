@extends('layouts.lite')

@section('content')
<div class="row">
    <div class="col-sm-12">
        <div class="white-box">
            <h3 class="box-title">&nbsp;</h3>
            <p class="text-muted">
                Select content to update
                <a href="{{url()->current()}}?lang=fr" class="btn {!!$lang=="fr" ? "btn-success" : "btn-default" !!} btn-xs">Edit French</a>
                <a href="{{url()->current()}}?lang=en" class="btn {!!$lang=="en" ? "btn-success" : "btn-default" !!} btn-xs">Edit English</a>
            </p>
            <div class="white-box">
                <div class="row">
                    <h2 class="col-md-3">
                        {{ $testimonial->byLocale()->name }}
                    </h2>
                    <div class="col-md-9">
                        <img src="{{url('images/testimonials/'.$testimonial->image)}}" width="100">
                    </div>
                </div>
                <p>{!! $testimonial->content !!}</p>
            </div>
        </div>
    </div>
</div>
@endsection
