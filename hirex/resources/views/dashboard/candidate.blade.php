@extends('dashboard.layouts.app')

@section('content')

                   <!-- Users DataTable-->
                   <div class="container">
                   <div class="row mt-3" >
                    <div class="col-md-12" style=" margin-top: 65px;
                    ">
                        <div class="card bg-white">
                            <div class="card-body mt-3">
                              <div class="table-responsive">
                                  <table id="usersTable" class="table table-striped  bg-light  " style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>Id</th>
                                       
                                            <th>Candidate Name</th>
                                            <th>Email</th>                                           
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                          
                                    @foreach($candidates as $candidate)
                                    @php
                                    $user_data = $candidate->user;
                                    @endphp
                                            <tr>
                                                <td>1</td>
                                                
                                                <td>{{$user_data->name}}</td>
                                                <td>
                                                    <i class="material-icons  ">{{$user_data->email}}</i>
        
                                                </td>

                                               
                                                <td style="width: 18%">
                                                    <a  class="btn btn-sm bg-color" href="{{route('candidate.edit', $candidate->id)}}"><i class="material-icons">edit</i></a> 
        
        
                                                  <button class="btn btn-sm btn-danger" data-toggle="modal" data-target="#candidateDelete-" type="button"><i class="material-icons">delete</i></button>
        
                                                    <!-- Delete modal -->
                                                    <div class="modal fade" id="candidateDelete-" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel-" aria-hidden="true">
                                                        <div class="modal-dialog modal-dialog-centered">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                            <h5 class="modal-title text-center" id="staticBackdropLabel-">Name: </h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                            </div>
                                                            <div class="modal-body text-center">
                                                                <h4> Do you want to move candidate Trash?</h4>
                                                            </div>
                                                            <form action="" method="POST">
                                                                <div class="modal-footer">
                                                                    <input type="hidden" name="id" value="">
                                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                                                    <button type="submit" class="btn btn-danger">Delete</button>
                                                                </div>
                                                            </form>
        
        
                                                        </div>
                                                        </div>
                                                    </div>
        
        
        
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