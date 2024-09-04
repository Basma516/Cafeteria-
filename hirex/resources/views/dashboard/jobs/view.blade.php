@extends('dashboard.layouts.app')
@section('content')
<div class="container mt-5" style="margin-top: 50px;">

    <div class="card mb-3">
        <div class="card-header">
            <h2 class="mb-0">{{$job->title}}</h2>
        </div>
        <div class="card-body">
            <p class="card-text">{{$job->description}}</p>

            <h5 class="mt-4">Comments:</h5>
            <ul class="list-group">
                @foreach($comments as $comment)
                @php
                $user = $comment->user;
                @endphp
                <li class="list-group-item" style="margin-bottom: 10px;">
                    {{$comment->comment}}
                    <span class="badge badge-secondary float-right">by {{$user->name}}</span>
                    <button class="badge btn bg-delete " data-toggle="modal" data-target="#commentDelete-{{$comment->id}}" type="button"><i class="material-icons">Delete</i></button>

                    <!-- Delete modal -->
                    <div class="modal fade" id="commentDelete-{{$comment->id}}" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel-" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title text-center" id="staticBackdropLabel-{{$comment->id}}">Name: {{$user->name}} </h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body text-center">
                                    <h4> Do you want to Delete This Comment ?</h4>
                                </div>
                                <form action="{{route('comment.delete', ['job_id' => $job->id, 'id' => $comment->id])}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <div class="modal-footer">
                                        <input type="hidden" name="id" value="">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </div>
                                </form>


                            </div>
                        </div>
                    </div>
                </li>
                @endforeach
            </ul>
        </div>
    </div>

</div>

@endsection