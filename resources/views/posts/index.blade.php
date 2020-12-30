@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="d-flex justify-content-between align-items-center">
            @if (@isset($category))
            <h1>Category : {{ ucfirst($category->name) }}</h1>
            @endif
            @if (@isset($tag))
            <h1>Tag : {{ ucfirst($tag->name) }}</h1>
            @endif
            @if ((!(@isset($tag))) && (!(@isset($category))))
            <h1>Welcome To my Blog</h1>
            @endif
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
                @auth
                <a href="/posts/create" class="btn btn-primary text-center">Create Post</a>
                @else
                <a href="{{ route('login') }}" class="btn btn-primary text-center">Login to Create Post</a>
                @endauth
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
                        <img style="object-fit: cover; height: 300px;" src="{{ "storage/".$post->thumbnail }}" class="card-img-top" alt="...">
                        <div class="card-header">
                            @can('update', $post)
                            <h5 class="text-success font-bold">{{ ucwords(Str::limit($post->title, 20)) }}</h5>
                            @else
                            <h5 class="font-thin text-3xl">{{ ucwords(Str::limit($post->title, 20)) }}</h5>
                            @endcan
                            @foreach ($post->tags as $tag)
                                <a style="font-size: 14px" href="{{ route('posts.filterByTag', $tag) }}" class="bg-dark text-white px-1 rounded py-1">{{ $tag->name }}</a>
                            @endforeach
                        </div>
                        <div class="card-body">
                            {{ Str::limit($post->body, 200, '') }}
                            <a href="{{ route('posts.getPost', $post->slug) }}">read more...</a></div>

                        <div class="card-footer d-flex justify-content-between align-items-center">
                            <div>{{ $post->created_at->format('d M, y') }}</div>
                            @include('posts.partials.category')
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

