@extends('app')
@section('title', 'Elections')

@section('content')

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Elections</h1>
        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"
           data-toggle="modal" data-target="#createElectionModal">
            <i class="fas fa-plus-circle fa-sm text-white-50"></i> Create Election</a>
    </div>

    <!-- Content Row -->
    <div class="">

        <p class="mb-4">Below is a list of elections, click on the <button class="btn btn-primary btn-sm pt-0 pb-0 pl-3 pr-3">View</button> button for more details about each election, add candidates, count votes or complete the election .
        </p>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">List of Elections</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <th>Name</th>
                            <th>Candidates</th>
                            <th>Votes Casted</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @if($elections)
                            @foreach($elections as $election)
                                <tr>
                                    <td>{{ $election->name }}</td>
                                    <td>{{ $election->candidates->count() }}</td>
                                    <td>{{ $election->votez }}</td>
                                    <td><a href="{{ route('election.single', ['id'=>$election->id]) }}" class="btn btn-primary btn-sm btn-block">View</a></td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="4" class="text-center">No Elections found</td>
                            </tr>
                        @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>

@endsection