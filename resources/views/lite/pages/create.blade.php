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
                            <form class="form-horizontal form-material" action="{{url('admin/pages')}}" method="post">
                                {{csrf_field()}}
                                <div class="form-group {{ $errors->has('name') ? ' has-error' : '' }}">
                                    <label class="col-md-12">Title</label>
                                    <div class="col-md-12">
                                        <input type="text" placeholder="page title" class="form-control form-control-line" name="name">
                                        @if ($errors->has('name'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('name') }}</strong>
                                            </span>
                                        @endif
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
                                        <button class="btn btn-success">Save page</button>
                                    </div>
                                </div>
                            </form>
                        </div>
        </div>
    </div>
</div>
@endsection
