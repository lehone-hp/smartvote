@extends('layouts.lite')

@section('content')
<div class="row">
    <div class="col-sm-12">
        <div class="white-box">
            <h3 class="box-title">&nbsp;</h3>
            <p class="text-muted">
                <a href="" class="btn btn-info btn-sm">Add Page</a>
            </p>
            <div class="white-box">
                            <form class="form-horizontal form-material" action="{{url('admin/services')}}" method="post" enctype="multipart/form-data">
                                {{csrf_field()}}
                                <div class="form-group {{ $errors->has('name') ? ' has-error' : '' }}">
                                    <label class="col-md-12">Title</label>
                                    <div class="col-md-12">
                                        <input type="text" class="form-control form-control-line" name="name">
                                        @if ($errors->has('name'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('name') }}</strong>
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

                                <div class="form-group {{ $errors->has('type') ? ' has-error' : '' }}">
                                    <label class="col-md-12">Service types</label>
                                    <div class="col-md-12">
                                        <select class="form-control form-control-line" name="type">
                                            @foreach($types as $type)
                                            <option value="{{$type->id}}">{{$type->byLocale()->title}}</option>
                                            @endforeach
                                            @if ($errors->has('type'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('type') }}</strong>
                                            </span>
                                        @endif
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group {{ $errors->has('content') ? ' has-error' : '' }}">
                                    <label class="col-md-12">Content</label>
                                    <div class="col-md-12">
                                        <textarea rows="10" class="form-control form-control-line my-editor" name="content"></textarea>
                                        @if ($errors->has('content'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('content') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-sm-12">
                                        <button class="btn btn-success">Save service</button>
                                    </div>
                                </div>
                            </form>
                        </div>
        </div>
    </div>
</div>
@endsection