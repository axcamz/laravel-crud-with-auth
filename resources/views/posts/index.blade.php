@extends('layouts.app')

@section('content')
@if (session()->has('success'))
    <div class="session">
        {{ session()->get('success') }}
    </div>
@endif
<div class="bg-gray-100 min-h-screen">
    <div class="lg:container lg:mx-auto xl:px-0 pt-5 px-3">
        <div class="flex justify-between max-w-screen-sm 2xl:max-w-full items-center">
            <div class="group z-10 max-w-max text-white bg-black px-3 py-1 rounded relative">
                <div class="flex justify-between items-center">
                    @if (isset($category))
                        <h1 class="xl:text-2xl text-xl">{{ $category->name }}</h1>
                    @endif
                    @if (isset($tag))
                        <h1 class="xl:text-2xl text-xl">{{ $tag->name }}</h1>
                    @else
                    @endif
                    @if (!(isset($tag)) && !(isset($category)))
                        <h1 class="xl:text-2xl text-sm md:text-xl">All Post</h1>
                    @endif
                    <svg class="lg:w-7 w-5 transform group-hover:rotate-180 transition ml-10" viewBox="-50 0 550 400">
                        <path fill="#fff" d="M225.923,354.706c-8.098,0-16.195-3.092-22.369-9.263L9.27,151.157c-12.359-12.359-12.359-32.397,0-44.751
                        c12.354-12.354,32.388-12.354,44.748,0l171.905,171.915l171.906-171.909c12.359-12.354,32.391-12.354,44.744,0
                        c12.365,12.354,12.365,32.392,0,44.751L248.292,345.449C242.115,351.621,234.018,354.706,225.923,354.706z"/>
                    </svg>
                </div>
                <div class="bg-white absolute mt-1 max-h-0 transition-max-height group-hover:max-h-screen duration-700 ease-in rounded left-0 top-full shadow-lg text-black w-full flex flex-col overflow-hidden">
                    <a href="{{ route('posts.getAllPost') }}" class="px-3 py-1 hover:bg-black hover:text-white text-sm md:text-xl">All Post</a>
                    @foreach ($categories as $category)
                        <a href="{{ route('posts.filterByCategory', $category->name) }}" class="px-3 py-1 hover:bg-black hover:text-white">{{ $category->name }}</a>
                    @endforeach
                </div>
            </div>
            @auth
                <a href="{{ route('posts.create') }}" class="lg:text-2xl text-lg  text-white bg-black px-4 py-1 rounded cursor-pointer hover:shadow-lg transition-shadow">Create Post</a>
            @else
                <a href="{{ route('login') }}" class="lg:text-xl text-sm md:text-xl text-white bg-black px-2 py-1 rounded cursor-pointer hover:shadow-lg transition-shadow">Login to Create Post</a>
            @endauth
        </div>
        <div class="grid grid-cols-1 2xl:justify-items-center 2xl:gap-1 2xl:grid-cols-2 pb-10">
            @foreach ($posts as $post)
                <div data-aos="fade-up-right" class="bg-white shadow-2xl max-w-screen-sm mt-7 rounded overflow-hidden cursor-pointer group">
                    <div class="overflow-hidden">
                        @if ($post->takeImage)
                            <img src="{{ $post->takeImage }}" alt="" class="object-cover h-60 object-center w-full transform group-hover:scale-100 scale-110 transition-all">
                        @else
                            <h1 class="h-60 flex items-center justify-center text-3xl transform group-hover:scale-125 transition-all">No Thumbnail</h1>
                        @endif
                    </div>
                    <div class="px-4 py-4">
                        <div class="flex">
                            <div class="bg-yellow-500 px-1 rounded inline-block">{{ $post->category->name }}</div>
                            <div class="flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 ml-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path class="text-gray-900" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                <span class="text-gray-900 text-sm ml-1 ">{{ $post->created_at->diffForHumans() }}</span>
                            </div>
                        </div>
                        <h1 class="mt-2 text-3xl font-semibold">{{ $post->title }}</h1>
                        <p class="mt-1">
                            {{  Str::limit($post->body, 200, '') }}
                        </p>
                        <a class="text-blue-600" href="/posts/{{ $post->slug }}">Read More ...</a>
                        <div class="flex mt-2 items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" class="text-gray-900 h-5" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                            </svg>
                            <span class="text-gray-900 text-sm ml-3 ">{{ $post->author->name }}</span>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <div class="pb-10">
        {{ $posts->links('vendor.pagination.tailwind') }}
    </div>
</div>
@endsection

