@extends('layouts.lite')

@section('content')
<div class="row">
    <div class="col-sm-12">
        <div class="white-box">
            <h3 class="box-title">&nbsp;</h3>
            <p class="text-muted">

            </p>
            <div class="white-box">
                            <form class="form-horizontal form-material" action="{{url('admin/teams/'.$member->id)}}" method="post" enctype="multipart/form-data">
                                {{csrf_field()}}
                                <input type="hidden" name="_method" value="put">
                                <div class="form-group {{ $errors->has('name') ? ' has-error' : '' }}">
                                    <label class="col-md-12">Title</label>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control form-control-line" name="name" value="{{$member->name}}">
                                        @if ($errors->has('name'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('name') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    <div class="col-md-6">
                                        <img src="{{url('images/members/'.$member->image)}}" width="100">
                                    </div>
                                </div>

                                <div class="form-group {{ $errors->has('position') ? ' has-error' : '' }}">
                                    <label class="col-md-12">Position</label>
                                    <div class="col-md-12">
                                        <input type="text" class="form-control form-control-line" name="position" value="{{$member->position}}">
                                        @if ($errors->has('position'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('position') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group {{ $errors->has('image') ? ' has-error' : '' }}">
                                    <label class="col-md-12">Image</label>
                                    <div class="col-md-12">
                                        <input type="file"  class="form-control form-control-line" name="image">
                                        @if ($errors->has('image'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('image') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group {{ $errors->has('facebook') ? ' has-error' : '' }}">
                                            <label class="col-md-12">Facebook url</label>
                                            <div class="col-md-12">
                                                <input type="text" class="form-control form-control-line" name="facebook" value="{{$member->facebook}}">
                                                @if ($errors->has('facebook'))
                                                    <span class="help-block">
                                                        <strong>{{ $errors->first('facebook') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group {{ $errors->has('twitter') ? ' has-error' : '' }}">
                                            <label class="col-md-12">Twitter url</label>
                                            <div class="col-md-12">
                                                <input type="text" class="form-control form-control-line" name="twitter" value="{{$member->twitter}}">
                                                @if ($errors->has('twitter'))
                                                    <span class="help-block">
                                                        <strong>{{ $errors->first('twitter') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group {{ $errors->has('linkedin') ? ' has-error' : '' }}">
                                            <label class="col-md-12">Linkedin url</label>
                                            <div class="col-md-12">
                                                <input type="text" class="form-control form-control-line" name="linkedin" value="{{$member->linkedin}}">
                                                @if ($errors->has('linkedin'))
                                                    <span class="help-block">
                                                        <strong>{{ $errors->first('linkedin') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <div class="form-group">
                                    <div class="col-sm-12">
                                        <button class="btn btn-success">Update team member</button>
                                    </div>
                                </div>
                            </form>
                        </div>
        </div>
    </div>
</div>
@endsection
