@extends('layouts.lite')

@section('content')
<div class="row">
                    <div class="col-sm-12">
                        <div class="white-box">
                            <h3 class="box-title">&nbsp;</h3>
                            <p class="text-muted">
                                <a href="{{url('admin/types/create')}}" class="btn btn-info btn-sm">Add service type</a>
                            </p>
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Title</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($types as $type)
                                        <tr>
                                            <td>{{$type->title}}</td>
                                            <td>
                                                <a href="{{url('admin/types/'.$type->id)}}" class="btn btn-info btn-xs"> view</a>
                                                <a href="{{url('admin/types/'.$type->id.'/edit')}}" class="btn btn-success btn-xs"> update</a>
                                                <a data-toggle="modal" data-target="#typeModal{{ $type->id }}"   class="btn btn-danger btn-xs"> delete</a>
                                                <div class="modal fade" id="typeModal{{ $type->id }}" role="dialog">
                                                    <div class="modal-dialog">

                                                        <!-- Modal content-->
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                                <h4 class="modal-title">{{ __('site.delete_warning_header') }}</h4>
                                                            </div>
                                                            <div class="modal-body">
                                                                <p>{{ __('site.delete_content') }}</p>
                                                            </div>
                                                            <div class="modal-footer">
                                                                {!! Form::open(['method'=>'DELETE', 'route' => ['types.destroy', $type->id], ]) !!}
                                                                <div class="form-group">
                                                                    {!! Form::submit('Delete', ['class' => 'button btn-primary btn-md']) !!}
                                                                </div>
                                                                {!! Form::close() !!}
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
@endsection
