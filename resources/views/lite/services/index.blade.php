@extends('layouts.lite')

@section('content')
<div class="row">
                    <div class="col-sm-12">
                        <div class="white-box">
                            <h3 class="box-title">&nbsp;</h3>
                            <p class="text-muted">
                                <a href="{{url('admin/services/create')}}" class="btn btn-info btn-sm">Add service</a>
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
                                        @foreach($services as $service)
                                        <tr>
                                            <td>{{$service->byLocale()->title}}</td>
                                            <td>
                                                <a href="{{url('admin/services/'.$service->id)}}" class="btn btn-info btn-xs"> view</a>
                                                <a href="{{url('admin/services/'.$service->id.'/edit')}}" class="btn btn-success btn-xs"> update</a>
                                                <a data-toggle="modal" data-target="#serviceModal{{ $service->id }}" class="btn btn-danger btn-xs"> delete</a>
                                                <div class="modal fade" id="serviceModal{{ $service->id }}" role="dialog">
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
                                                                {!! Form::open(['method'=>'DELETE', 'route' => ['services.destroy', $service->id], ]) !!}
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
                                {{ $services->links() }}
                            </div>
                        </div>
                    </div>
                </div>
@endsection
