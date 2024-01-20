@extends('layouts.lite')

@section('content')

<div class="row">
    <!--col -->
    <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
        <div class="white-box">
            <div class="col-in row">
                <a href="{{url('admin/posts')}}">
                    <div class="col-md-6 col-sm-6 col-xs-6"> <i class="fa fa-list"></i>
                    <h4>Blog Posts</h4> </div>
                    <div class="col-md-6 col-sm-6 col-xs-6">
                        <h3 class="counter text-right m-t-15 text-danger">{{\App\Models\Post::count()}}</h3>
                    </div>
                </a>
            </div>
        </div>
    </div>

    <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
        <div class="white-box">
            <div class="col-in row">
                <a href="{{url('admin/services')}}">
                    <div class="col-md-6 col-sm-6 col-xs-6"> <i class="fa fa-gears"></i>
                    <h4>Services</h4> </div>
                    <div class="col-md-6 col-sm-6 col-xs-6">
                        <h3 class="counter text-right m-t-15 text-danger">{{\App\Models\Service::count()}}</h3>
                    </div>
                </a>
            </div>
        </div>
    </div>

    <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
        <div class="white-box">
            <div class="col-in row">
                <a href="">
                    <div class="col-md-6 col-sm-6 col-xs-6"> <i class="fa fa-book"></i>
                    <h4>Pages</h4> </div>
                    <div class="col-md-6 col-sm-6 col-xs-6">
                        <h3 class="counter text-right m-t-15 text-danger">{{\App\Models\Page::count()}}</h3>
                    </div>
                </a>
            </div>
        </div>
    </div>

    <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
        <div class="white-box">
            <div class="col-in row">
                <a href="{{url('admin/clients')}}">
                    <div class="col-md-6 col-sm-6 col-xs-6"> <i class="fa fa-institution"></i>
                    <h4>Clients</h4> </div>
                    <div class="col-md-6 col-sm-6 col-xs-6">
                        <h3 class="counter text-right m-t-15 text-danger">{{\App\Models\Client::count()}}</h3>
                    </div>
                </a>
            </div>
        </div>
    </div>

    <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
        <div class="white-box">
            <div class="col-in row">
                <a href="{{url('admin/categories')}}">
                    <div class="col-md-6 col-sm-6 col-xs-6"> <i class="fa fa-list"></i>
                    <h4>Post Categories</h4> </div>
                    <div class="col-md-6 col-sm-6 col-xs-6">
                        <h3 class="counter text-right m-t-15 text-danger">{{\App\Models\Category::count()}}</h3>
                    </div>
                </a>
            </div>
        </div>
    </div>

    <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
        <div class="white-box">
            <div class="col-in row">
                <a href="{{url('admin/types')}}">
                    <div class="col-md-6 col-sm-6 col-xs-6"> <i class="fa fa-gears"></i>
                    <h4>Service Types</h4> </div>
                    <div class="col-md-6 col-sm-6 col-xs-6">
                        <h3 class="counter text-right m-t-15 text-danger">{{\App\Models\Type::count()}}</h3>
                    </div>
                </a>
            </div>
        </div>
    </div>

    <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
        <div class="white-box">
            <div class="col-in row">
                <a href="{{url('admin/users')}}">
                    <div class="col-md-6 col-sm-6 col-xs-6"> <i class="fa fa-users"></i>
                    <h4>Users</h4> </div>
                    <div class="col-md-6 col-sm-6 col-xs-6">
                        <h3 class="counter text-right m-t-15 text-danger">{{\App\Models\User::count()}}</h3>
                    </div>
                </a>
            </div>
        </div>
    </div>
    <!-- /.col -->

</div>
<!-- /.row -->


@endsection
