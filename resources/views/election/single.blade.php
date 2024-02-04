@extends('app')
@section('title', 'Election - '. $election->name)

@section('content')
    
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-3">
        <div class="d-sm-flex">
            <h1 class="h3 mb-0 mr-3 text-gray-800">{{ $election->name }}</h1>
            @if(Auth::id() == 1)
                <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"
                   data-toggle="modal" data-target="#addCandidateModal">
                    <i class="fas fa-plus-circle fa-sm text-white-50"></i> Add Candidate</a>
            @endif
        </div>
        <button onclick="vote()" id="castVoteButton" class="btn btn-primary">
            <i class="fas fa-vote-yea text-white-50"></i> Cast Votes</button>
    </div>
    
    <!-- Content Row -->
    <div>
        
        @if ($election->candidates->count() <= 0)
            <h3 class="mb-4 text-center">
                No candidate has been registered for this election,
                please click on <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"
                                   data-toggle="modal" data-target="#addCandidateModal">
                    <i class="fas fa-plus-circle fa-sm text-white-50"></i> Add Candidate</a>
                to add a new candidate
            </h3>
        @else
            
            <div class="row candidate-list">
                @foreach($election->candidates as $candidate)
                    <div class="col-xl-3 col-md-4 col-sm-6 mb-3">
                        <div class="card border-left-primary shadow h-100 candidate add-vote"
                             onclick="vote">
                            <div class="img-wrapper">
                                <img src="{{ route('candidate.photo', ['photo'=>$candidate->photo]) }}" class="pointer">
                                <span class="label text-primary">{{ \App\Helpers\Str::alphaIndex($loop->index) }}</span>
                            </div>
                            <div class="card-body pointer">
                                <input type="hidden" class="can-id" value="{{ $candidate->id }}">
                                <div class="row">
                                    <div class="col-8">
                                        <div class="h6 font-weight-bold text-primary text-uppercase mb-0 candidate-name">
                                            <a {{--onclick="decVote({{ $candidate->id }})"--}} class="pointer">{{ $candidate->name }}</a>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="vote-container">
                                            <div id="candidate_{{ $candidate->id }}"
                                                 class="vote-count h3 mb-0 vote-count font-weight-bold text-gray-800">
                                                {{ $candidate->votes }}
                                            </div>
                                            <span class="vote-label">Votes</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            
            @if(Auth::id() == 1)
                        <div class="row mt-4 justify-content-center">
                            <div class="col-4">
                                <a href="{{ route('election.results', ['election_id'=>$election->id]) }}"
                                   class="btn btn-primary btn-block">View Results</a>
                            </div>
                        </div>
                        
                        <!-- DataTales Example -->
                        <div class="card shadow mb-4" style="margin-top: 200px">
                            <div class="card-header py-3">
                                <h6 class="m-0 font-weight-bold text-primary">List of Candidates</h6>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-sm" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($election->candidates as $candidate)
                                            <tr>
                                                <td>{{ $candidate->name }}</td>
                                                <td>
                                                    <div class="row">
                                                        <div class="col-6">
                                                            <button onclick="editCandidate('{{ $candidate->id }}', '{{$candidate->name}}')"
                                                                    class="btn btn-info btn-sm btn-block">Edit</button>
                                                        </div>
                                                        <div class="col-6">
                                                            <button onclick="removeCandidate('{{ $candidate->id }}', '{{$candidate->name}}')"
                                                                    class="btn btn-danger btn-sm btn-block">Delete</button>
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
                    @endif
                    @endif
            </div>
            
            <div class="modal fade" id="addCandidateModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Add Candidate to Men's Election</h5>
                            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <form action="{{ route('election.candidate.add') }}" method="POST"  enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="election_id" value="{{ $election->id }}">
                            <div class="modal-body">
                                <div class="form-group">
                                    <input type="text" class="form-control"
                                           name="name" placeholder="Candidate Name"
                                           value="" required>
                                </div>
                                
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input"
                                           id="customFile" name="photo" required>
                                    <label class="custom-file-label" for="customFile">Candidate Picture</label>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                                <button class="btn btn-primary"  type="submit">Add Candidate</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            
            <div class="modal fade" id="editCandidateModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Edit Candidate</h5>
                            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <form action="#" method="POST"  enctype="multipart/form-data" id="edit_cform">
                            @csrf
                            <div class="modal-body">
                                <div class="form-group">
                                    <input type="text" class="form-control" id="edit_cname"
                                           name="name" placeholder="Candidate Name"
                                           value="">
                                </div>
                                
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input"
                                           id="customFile" name="photo">
                                    <label class="custom-file-label" for="customFile">Candidate Picture</label>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                                <button class="btn btn-primary"  type="submit">Edit Candidate</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            
            <div class="modal fade" id="confirmDeleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Remove <strong id="remove_candidate_name">John Doe</strong> From Election?</h5>
                            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <form action="" method="POST" id="remove_form">
                            @csrf
                            <input type="hidden" name="candidate_id"
                                   id="remove_candidate_id" value="">
                            <div class="modal-footer">
                                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                                <button class="btn btn-primary"  type="submit">Remove</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            
            
            @endsection
        
        @section('footer_script')
            
            <script>
                var selected = [];
                
                $(function() {
                    var maxCount = 12;
                    if ('{{$election->id}}' === '2') {
                        maxCount = 14;
                    }
                    
                    $(".add-vote").click(function () {
                        var parent = $(this);
                        var can_id = parent.find('input[type="hidden"]').val();
                        
                        var text_primary;
                        var count;
                        if (parent.hasClass("border-left-primary")) {
                            if (selected.length < maxCount) {
                                
                                selected.push(can_id);
                                
                                text_primary = parent.find('.text-primary');
                                $(text_primary).removeClass('text-primary');
                                $(text_primary).addClass('text-warning');
                                
                                parent.removeClass('border-left-primary');
                                parent.addClass('border-left-warning');
                                
                                count = parent.find('.vote-count');
                                count.removeClass('text-gray-800');
                                count.addClass('text-warning');
                                
                                $(this).find('img').css("opacity", "0.5");
                                
                            } else {
                                iziToast.show({
                                    overlay: true,
                                    title: 'Sorry!',
                                    titleSize: '20px',
                                    message: 'You have already selected '+maxCount+' candidates.',
                                    messageSize: '20px',
                                    backgroundColor: '#fee100',
                                    position: 'center'
                                });
                            }
                        } else {
                            // remove item from array
                            for (var i = selected.length - 1; i >= 0; i--) {
                                if (selected[i] === can_id) {
                                    selected.splice(i, 1);
                                }
                            }
                            
                            text_primary = parent.find('.text-warning');
                            $(text_primary).removeClass('text-warning');
                            $(text_primary).addClass('text-primary');
                            
                            parent.removeClass('border-left-warning');
                            parent.addClass('border-left-primary');
                            
                            count = parent.find('.vote-count');
                            count.removeClass('text-warning');
                            count.addClass('text-gray-800');
                            
                            $(this).find('img').css("opacity", "1");
                        }
                        
                    });
                    
                });

                function vote() {
                    $('#castVoteButton').attr("disabled","disabled");
                    const data = {
                        candidates : selected,
                        _token : '{{ @csrf_token() }}'
                    };
                    $.ajax({
                        url: '{{ route('election.candidate.vote') }}',
                        data: data,
                        type: 'POST',
                        success: function (data) {
                            location.reload();
                        },
                        error: function (xhr, status, error) {
                            alert('An Error Occurred while casting vote.')
                        },
                        complete: function() {
                            $('#castVoteButton').attr("disabled", false);
                        }
                    });
    
                }
                
                function decVote(candidate_id) {
                    const data = {
                        candidate_id : candidate_id,
                        _token : '{{ @csrf_token() }}'
                    };
                    $.ajax({
                        url: '{{ route('election.candidate.reduce') }}',
                        data: data,
                        type: 'POST',
                        success: function (data) {
                            if (data.msg) {
                                alert(data.msg);
                            } else {
                                $('#candidate_'+candidate_id).html(data.vote_count);
                            }
                            
                        },
                        error: function (xhr, status, error) {
                            alert('An Error Occurred while casting vote.')
                        }
                    });
                    
                }
                
                function removeCandidate(candidate_id, candidate_name) {
                    $('#remove_candidate_id').val(candidate_id);
                    $('#remove_candidate_name').html(candidate_name);
                    $('#remove_form').attr('action', 'candidate/remove/'+candidate_id);
                    $('#confirmDeleteModal').modal('show');
                }
                
                function editCandidate(candidate_id, candidate_name) {
                    $('#editCandidateModal').modal('show');
                    $('#edit_cform').attr('action', 'candidate/edit/'+candidate_id);
                    $('#edit_cname').val(candidate_name);
                }
            
            </script>
@endsection
