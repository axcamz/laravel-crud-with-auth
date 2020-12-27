@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="d-flex justify-content-between align-items-center">
            @isset($category)
            <h1>Category : {{ ucfirst($category->name) }}</h1>
            @else
            <h1>Welcome To my Blog</h1>
            @endisset
            <div class="div">
                <div class="btn-group">
                    <button type="button" class="btn border border-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      Filter Post
                    </button>
                    <div class="dropdown-menu">
                        <a href="{{ route('posts.getAllPost') }}" class="dropdown-item {{ request()->is('posts') ? 'active' : null }}">All Post</a>
                        @foreach ($categories as $category)
                        <a href="{{ route('posts.filterByCategory', $category->name) }}" class="dropdown-item {{ request()->is('posts/category/'.$category->name) ? 'active' : null }}">{{ ucfirst($category->name) }}</a>
                        @endforeach
                    </div>
                </div>
                <a href="/posts/create" class="btn btn-primary text-center">Create Post</a>
            </div>
        </div>
        <hr>
        @if (session()->has('success'))
        <div class="session">
            {{ session()->get('success') }}
        </div>
        @endif

        <div class="row">
            @if ($posts->count())
                @foreach ($posts as $post)
                <div class="col-lg-4 mb-4">
                    <div class="card">
                        <div class="card-header"><h5>{{ ucwords(Str::limit($post->title, 20)) }}</h5></div>
                        <div class="card-body">{{ Str::limit($post->body, 150, '') }}  <a href="{{ route('posts.getPost', $post->slug) }}">read more...</a></div>
                        <div class="card-footer d-flex justify-content-between align-items-center">
                            <div>{{ $post->created_at->format('d M, y') }}</div>
                        </div>
                    </div>
                </div>
                @endforeach
            @else
                <div class="alert alert-waring">There's No Post</div>
            @endif
        </div>
        <div class="d-flex justify-content-center">
            {{ $posts->links() }}
        </div>
    </div>



@endsection

