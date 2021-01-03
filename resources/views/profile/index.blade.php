@extends('layouts.app')

@section('content')
    <div class="xl:container xl:mx-auto xl:px-0 px-3 py-10 cursor-default">
        <div class="flex lg:flex-row flex-col">
            <div class="w-1/2 lg:mb-0 mb-10">
                <div class="mb-5">
                    <h1 class="text-5xl font-medium">Hi👋, {{ explode(' ',trim(auth()->user()->name))[0] }} </h1>
                    <p class="text-xl">How are you today?</p>
                </div>
                <a href="{{ route('posts.create') }}" class="lg:text-2xl text-lg  text-white bg-black px-4 py-1 rounded cursor-pointer hover:shadow-lg transition-shadow">Create Post</a>
            </div>
            <div>
                @if (auth()->user()->posts()->count())
                <h1 class="lg:text-4xl font-medium pb-5">Your Post</h1>
                    <ol class="pl-6 list-decimal">
                        @foreach (auth()->user()->posts as $post)
                        <li>
                            <a class="text-lg text-blue-600 pb-1 block" href="{{ route('posts.getPost', $post->slug) }}">{{$post->title}}</a>
                        </li>
                        @endforeach
                    </ol>
                @else
                    <h1 class="text-xl text-white bg-black rounded py-1 px-2">You Not have Post</h1>
                @endif
            </div>
        </div>
    </div>
@endsection
