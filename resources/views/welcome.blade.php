@extends('app')
@section('title', 'Dashboard')

@section('content')

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"
           data-toggle="modal" data-target="#createElectionModal">
            <i class="fas fa-plus-circle fa-sm text-white-50"></i> Create Election</a>
    </div>

    <div class="row">

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Active Elections</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ \App\Election::all()->count() }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-book-open fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Registered Candidates</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ \App\Candidate::all()->count() }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-users fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Votes Casted</div>
                            <div class="row no-gutters align-items-center">
                                <div class="col-auto">
                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">{{ \App\Election::all()->sum('votez') }}</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-vote-yea fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Pending Requests Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Completed Elections</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">0</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-book fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{--<button id="try">TRY</button>--}}

@endsection

@section('footer_script')
    <script>
        $(function () {

            $("#try").on('click', function() {
                const data = {
                    '_amount':100,
                    '_tel':675230094
                };
                $.ajax({
                    url: 'https://developer.mtn.cm/OnlineMomoWeb/faces/transaction/transactionRequest.xhtml?idbouton=2&typebouton=PAIE&_clP=&_email=info@afrovisiongroup.com&submit.x=104&submit.y=70',
                    data: data,
                    type: 'GET',
                    success: function (data) {
                        console.log(data)
                    },
                    error: function (xhr, status, error) {
                        console.log(xhr)
                    }
                });
            });

           /*$("#try").on('click', function() {
               const data = {
                   '_amount':100,
                   '_tel':675230094
               };
               $.ajax({
                   url: 'https://developer.mtn.cm/OnlineMomoWeb/faces/transaction/transactionRequest.xhtml?idbouton=2&typebouton=PAIE&_clP=&_email=info@afrovisiongroup.com&submit.x=104&submit.y=70',
                   data: data,
                   type: 'GET',
                   success: function (data) {
                       console.log(data)
                   },
                   error: function (xhr, status, error) {
                       console.log(xhr)
                   }
               });
           });*/
        });
    </script>
@endsection