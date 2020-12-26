@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <h1>{{$post->title}}</h1>
        <div class="d-flex justify-content-between align-items-end">
            <span>Updated at {{$post->updated_at->diffforHumans()}}</span>
            <div class="d-flex">
                <a href="/posts/edit/{{$post->slug}}" class="btn btn-primary">Edit Post</a>
                <a href="{{ route('posts.getAllPost') }}" class="btn btn-success ml-3">Back</a>
            </div>
        </div>
        <hr>
        <p>{{ $post->body }}</p>
    </div>
@endsection
