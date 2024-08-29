@extends('dashboard.layouts.app')
@section('content')
<div class="container mt-5" style="margin-top: 50px;">

        <!-- Static Post 1 -->
        <div class="card mb-3">
            <div class="card-header">
                <h2 class="mb-0">Post Title 1</h2>
            </div>
            <div class="card-body">
                <p class="card-text">This is the content of the first post. It gives some description or details about the topic of the post.</p>

                <h5 class="mt-4">Comments:</h5>
                <ul class="list-group">
                    <li class="list-group-item" style="margin-bottom: 10px;">
                        This is the first comment on the first post.
                        <span class="badge badge-secondary float-right">by Alice</span>
                        <a href="#" class="float-right btn  badge bg-delete">Delete</a>

                    </li>
                    <li class="list-group-item" style="margin-bottom: 10px;">
                        Another insightful comment on the first post.
                        <span class="badge badge-secondary float-right">by Bob</span>
                        <a href="#" class="float-right btn  badge bg-delete">Delete</a>

                    </li>
                    <li class="list-group-item" style="margin-bottom: 10px;">
                        This is the first comment on the first post.
                        <span class="badge badge-secondary float-right">by Alice</span>
                        <a href="#" class="float-right btn  badge bg-delete">Delete</a>

                    </li>
                    <li class="list-group-item" style="margin-bottom: 10px;">
                        Another insightful comment on the first post.
                        <span class="badge badge-secondary float-right">by Bob</span>
                        <a href="#" class="float-right btn  badge bg-delete">Delete</a>

                    </li>
                    <li class="list-group-item" style="margin-bottom: 10px;">
                        This is the first comment on the first post.
                        <span class="badge badge-secondary float-right">by Alice</span>
                        <a href="#" class="float-right btn  badge bg-delete">Delete</a>

                    </li>
                    <li class="list-group-item" style="margin-bottom: 10px;">
                        Another insightful comment on the first post.
                        <span class="badge badge-secondary float-right">by Bob</span>
                        <a href="#" class="float-right btn  badge bg-delete">Delete</a>
                    </li>
                </ul>
            </div>
        </div>



        <!-- Additional Static Posts -->
        <!-- You can add more static posts here following the same structure -->

    </div>

@endsection