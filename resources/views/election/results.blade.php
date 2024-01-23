@extends('app')
@section('title', 'Results for '. $election->name)

@section('content')

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Results for {{ $election->name }}</h1>
    </div>


    <div class="row">
        <div class="table-responsive col-xl-5 col-md-6">
            <table class="table table-bordered table-hover table-sm">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Candidate</th>
                    <th>Votes</th>
                </tr>
                </thead>
                <tbody>
                @foreach($election->candidates->sortByDesc('name')->sortByDesc('votes') as $candidate)
                    <tr>
                        <td>{{ $loop->index + 1 }}</td>
                        <td>{{ $candidate->name }}</td>
                        <td>{{ $candidate->votes }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>

        <div class="col-xl-6 col-md-6">
            <div class="row">
                <div class="col-xl-6 mb-4">
                    <div class="card border-left-primary shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Number of Candidates</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $election->candidates->count() }}</div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-users fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-6 mb-4">
                    <div class="card border-left-success shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Votes Casted</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $election->candidates->sum('votes') }}</div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-vote-yea fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
