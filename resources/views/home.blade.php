@extends('layouts.app')

@section('content')
<div class="lg:container lg:mx-auto lg:px-0 px-3 pt-5">
    @auth
    <h1 class="text-2xl">- Welcome {{ auth()->user()->name }}</h1>
    <h1>This is Your Posts</h1>
    @foreach (auth()->user()->posts as $post)
        <h1>{{ $post->title }}</h1>
    @endforeach
    @else
    <h1>Login First</h1>
    @endauth
</div>
@endsection
