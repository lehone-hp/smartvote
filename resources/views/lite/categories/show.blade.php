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
                <a href="{{url('admin/categories/'.$category->id.'/edit')}}" class="btn btn-primary btn-xs"> update</a>

            </p>
            <div class="white-box">


                <div>
                    <h2>{{ $category->byLocale()->title }}</h2></div>


            </div>
        </div>
    </div>
</div>
@endsection
