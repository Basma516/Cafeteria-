@extends('dashboard.layouts.app')
@section('content')
<!-- Users DataTable-->

<!-- Users DataTable-->
<div class="container">
    <div class="row mt-3">
        <div class="col-md-12" style="    margin-top: 65px;
                    ">
            <div class="card bg-white">
                <div class="card-body mt-3">
                    <div class="table-responsive">
                        <table id="usersTable" class="table table-striped  bg-light  " style="width:100%">
                            <thead>
                                <tr>
                                    <th>Id</th>

                                    <th>Employer Name</th>
                                    <th>Title</th>
                                    <th>Location</th>
                                    <th>Category</th>
                                    <th>type</th>
                                    <th>status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($jobs as $job)
                                @php
                                $emp = $job->employer;
                                $data = $emp->user;
                                $category = $job->category;
                                $type = $job->jobType;
                                $status = $job->status;
                                @endphp
                                <tr>
                                    <td>1</td>

                                    <td>{{$data->name}}</td>
                                    <td>{{$job->title}}</td>
                                    <td>{{$job->location}}</td>
                                    <td>{{$category->name}}</td>
                                    <td>{{$type->name}}</td>
                                    <td>{{$status->name}}</td>


                                    <td style="width: 18%">
                                        <a class="btn btn-sm bg-color" href="{{route('job.view', $job->id)}}"><i class="material-icons">View</i></a>


                                        @if($status->name == 'pending')

                                        <button class="btn btn-sm btn-success" data-toggle="modal" data-target="#candidateAccept-{{$job->id}}" type="button"><i class="material-icons">Accept</i></button>

                                        <!-- Delete modal -->
                                        <div class="modal fade" id="candidateAccept-{{$job->id}}" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel-" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title text-center" id="staticBackdropLabel-{{$job->id}}">Name: {{$job->title}} </h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body text-center">
                                                        <h4> Do you want to Accept This Post ?</h4>
                                                    </div>
                                                    <form action="{{route('jobs.accept', $job->id)}}" method="POST">
                                                        @csrf
                                                        <div class="modal-footer">
                                                            <input type="hidden" name="id" value="">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                                            <button type="submit" class="btn btn-success">Accept</button>
                                                        </div>
                                                    </form>


                                                </div>
                                            </div>
                                        </div>
                                        @endif


                                        @if($status->name == 'pending')

                                        <button class="btn btn-sm btn-danger" data-toggle="modal" data-target="#candidateDelete-{{$job->id}}" type="button"><i class="material-icons">Reject</i></button>

                                        <!-- Delete modal -->
                                        <div class="modal fade" id="candidateDelete-{{$job->id}}" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel-" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title text-center" id="staticBackdropLabel-{{$job->id}}">Name: {{$job->title}} </h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body text-center">
                                                        <h4> Do you want to Reject This Post ?</h4>
                                                    </div>
                                                    <form action="{{route('jobs.delete', $job->id)}}" method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                                                <button type="submit" class="btn btn-danger">Reject</button>
                                                            </div>
                                                        </form>


                                                </div>
                                            </div>
                                        </div>
                                        @endif



                                    </td>
                                </tr>
                                @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>


</div>
@endsection