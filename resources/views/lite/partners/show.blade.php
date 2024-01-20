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
                <a href="{{url('admin/partners/'.$partner->id.'/edit')}}" class="btn btn-success btn-xs"> update</a>
            </p>
            <div class="white-box">
                <div class="row">
                    <h2 class="col-md-3">{{ $partner->byLocale()->name }}</h2>
                    <div class="col-md-9">
                        <img src="{{url('images/partners/'.$partner->image)}}" width="100">
                    </div>
                </div>
                <p>{!! $partner->byLocale()->content !!}</p>
            </div>
        </div>
    </div>
</div>
@endsection
