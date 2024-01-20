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

                            <form class="form-horizontal form-material" action="{{url('admin/posts/'.$post->id)}}" method="post" enctype="multipart/form-data">
                                {{csrf_field()}}
                                <input type="hidden" name="_method" value="put">
                                <input type="hidden" name="lang" value="{{$lang}}">
                                <div class="form-group {{ $errors->has('name') ? ' has-error' : '' }}">
                                    <label class="col-md-12">Title</label>
                                    <div class="col-md-12">
                                        <input type="text" value="{{$post->byLocale()->title}}" class="form-control form-control-line" name="name" >
                                        @if ($errors->has('name'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('name') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group {{ $errors->has('image') ? ' has-error' : '' }}">
                                    <label class="col-md-12">Image</label>
                                    <div class="col-md-6">
                                        <input type="file"  class="form-control form-control-line" name="image">
                                        @if ($errors->has('image'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('image') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    <div class="col-md-6">
                                        <img src="{{url('images/posts/'.$post->image)}}" width="100">
                                    </div>
                                </div>

                                <div class="form-group {{ $errors->has('category') ? ' has-error' : '' }}">
                                    <label class="col-md-12">Category</label>
                                    <div class="col-md-12">
                                        <select class="form-control form-control-line" name="category">
                                            @foreach($categories as $category)
                                            <option value="{{$category->id}}" {!! $post->category_id == $category->id ? "selected" : "" !!} >
                                                {{$category->byLocale()->title}}
                                            </option>
                                            @endforeach
                                            @if ($errors->has('category'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('category') }}</strong>
                                            </span>
                                        @endif
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group {{ $errors->has('content') ? ' has-error' : '' }}">
                                    <label class="col-md-12">Content</label>
                                    <div class="col-md-12">
                                        <textarea rows="10" class="form-control form-control-line my-editor" name="content">{!! $post->byLocale()->content !!}</textarea>
                                        @if ($errors->has('content'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('content') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-sm-12">
                                        <button class="btn btn-success">Update page</button>
                                    </div>
                                </div>
                            </form>
                        </div>
        </div>
    </div>
</div>
@endsection
