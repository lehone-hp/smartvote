@extends('layouts.lite')

@section('content')
<div class="row">

    <div class="col-sm-6">
        <div class="white-box">
            <h3 class="box-title">&nbsp;</h3>
            <p class="text-muted">

            </p>
            <div class="white-box">
                @foreach($socials as $social)
                <a href="{{$social->link}}"> {{$social->name}} > {{$social->link}}</a> <br/><br/><br/><br/>
                @endforeach
            </div>
        </div>
    </div>
    <div class="col-sm-6">
        <div class="white-box">
            <h3 class="box-title">&nbsp;</h3>
            <p class="text-muted">

            </p>
            <div class="white-box">
                @foreach($socials as $social)
                <form class="form-horizontal form-material" action="{{url('admin/socials/'.$social->id)}}" method="post" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <input type="hidden" name="_method" value="put">
                    <div class="form-group {{ $errors->has('link') ? ' has-error' : '' }}">
                        <label class="col-md-12">{{$social->name}}</label>
                        <div class="col-md-12">
                            <input type="text" class="form-control form-control-line" name="link" value="{{$social->link}}">
                            @if ($errors->has('link'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('link') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-12">
                            <button class="btn btn-success">Update {{$social->name}}</button>
                        </div>
                    </div>
                </form>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection
