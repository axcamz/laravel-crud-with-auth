@extends('layouts.app')

@section('content')
<div class="bg-gray-100">
    <div class="lg:container lg:mx-auto lg:px-0 pt-5 px-3">
        <div class="group z-10 max-w-max text-white bg-black px-3 py-1 rounded relative">
            <div class="flex justify-between items-center">
                <h1 class="text-2xl">All Post</h1>
                <svg class="lg:w-7 w-5 transform group-hover:rotate-180 transition ml-10" viewBox="-50 0 550 400">
                    <path fill="#fff" d="M225.923,354.706c-8.098,0-16.195-3.092-22.369-9.263L9.27,151.157c-12.359-12.359-12.359-32.397,0-44.751
                    c12.354-12.354,32.388-12.354,44.748,0l171.905,171.915l171.906-171.909c12.359-12.354,32.391-12.354,44.744,0
                    c12.365,12.354,12.365,32.392,0,44.751L248.292,345.449C242.115,351.621,234.018,354.706,225.923,354.706z"/>
                </svg>
            </div>
            <div class="bg-white absolute mt-1 max-h-0 transition-max-height group-hover:max-h-screen duration-700 ease-in rounded left-0 top-full shadow-lg text-black w-full flex flex-col overflow-hidden">
                @foreach ($categories as $category)
                    <a class="px-3 py-1 hover:bg-black hover:text-white">{{ $category->name }}</a>
                @endforeach
            </div>
        </div>
        @foreach ($posts as $post)
            <div data-aos="fade-up-right" class="bg-white shadow-lg max-w-screen-sm mt-7 rounded overflow-hidden cursor-pointer group">
                <div class="overflow-hidden">
                    @if ($post->takeImage)
                        <img src="{{ $post->takeImage }}" alt="" class="object-cover h-60 object-center w-full transform group-hover:scale-100 scale-110 transition-all">
                    @else
                        <h1 class="h-60 flex items-center justify-center text-3xl ">No Thumbnail</h1>
                    @endif
                </div>
                <div class="px-4 py-4">
                    <div class="flex">
                        <div class="bg-yellow-500 px-1 rounded inline-block">{{ $post->category->name }}</div>
                        <div class="flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 ml-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path class="text-gray-900" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            <span class="text-gray-900 text-sm">Two Month ago</span>
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
    <div class="mb-10">
        {{ $posts->links('vendor.pagination.tailwind') }}
    </div>
</div>
@endsection

