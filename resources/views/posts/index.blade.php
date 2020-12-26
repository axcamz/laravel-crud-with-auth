@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="d-flex justify-content-between align-items-center">
            <h1>Welcome To my Blog</h1>
            <a href="/posts/create" class="btn btn-primary text-center">Create Post</a>
        </div>
        <hr>
        <div class="row">
            @if ($posts->count())
                @foreach ($posts as $post)
                <div class="col-lg-4 mb-4">
                    <div class="card">
                        <div class="card-header"><h5>{{ Str::limit($post->title, 20) }}</h5></div>
                        <div class="card-body">{{ Str::limit($post->body, 150, '') }}  <a href="/posts/{{$post->slug}}">read more...</a></div>
                        <div class="card-footer d-flex justify-content-between align-items-center">
                            <div>{{ $post->created_at->format('d M, y') }}</div>
                            <a href="/posts/{{$post->slug}}/delete" class="btn btn-danger">Delete</a>
                        </div>
                    </div>
                </div>
                @endforeach
            @else
                <h2>No Post There's.</h2>
            @endif
        </div>
        <div class="d-flex justify-content-center">
            {{ $posts->links() }}
        </div>
    </div>
@endsection

