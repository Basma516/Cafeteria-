@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Job Categories</h1>
    <ul>
        @foreach($categories as $category)
            <li>{{ $category->name }}</li>
        @endforeach
    </ul>
</div>
@endsection
