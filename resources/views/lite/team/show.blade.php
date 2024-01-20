@extends('layouts.lite')

@section('content')
<div class="row">
    <div class="col-sm-12">
        <div class="white-box">
            <h3 class="box-title">&nbsp;</h3>
            <p class="text-muted">

            </p>
            <div class="white-box">
                <h2>{{ $member->title }}</h2>
                <div class="row">
                    <p class="col-md-1">{{ $member->position }}</p>
                    <div class="col-md-11">
                        <img src="{{url('images/members/'.$member->image)}}" width="100">
                    </div>
                </div>
                <div class="row">
                    <p class="col-lg-4">{{ $member->facebook }}</p>
                    <p class="col-lg-4">{{ $member->linkedin }}</p>
                    <p class="col-lg-4">{{ $member->twitter }}</p>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
