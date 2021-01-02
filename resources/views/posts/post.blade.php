@extends('layouts.app')

@section('content')
    <div class="z-0 relative">
        @if ($post->takeImage)
        <img src="{{ $post->takeImage }}" alt="Thumbnail" class="lg:h-80 w-full object-cover object-center">
        @else
        <div class="lg:h-80 w-full h-60 bg-gray-800 flex justify-center items-center text-white text-2xl">No Thumbnail</div>
        @endif
    </div>
    <div class="lg:px-0 px-3">
        <div class="lg:container shadow-lg relative rounded -mt-20 lg:-mt-28 bg-white lg:px-0 lg:mx-auto text-black z-10">
            <div class="lg:px-14 lg:py-14 px-2 py-2">
                <h1 class="lg:text-5xl text-3xl font-semibold">{{ $post->title }}</h1>
                <div class="flex mt-3">
                    <div class="bg-yellow-500 px-1 lg:text-lg rounded inline-block">{{ $post->category->name }}</div>
                    <div class="flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 ml-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path class="text-gray-900" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        <span class="text-gray-900 text-sm ml-1 ">{{ $post->created_at->diffForHumans() }}</span>
                    </div>
                </div>
                <span class="text-gray-900 mt-3 block">Author &middot; {{ $post->author->name }}</span>
                <div class="flex lg:max-w-sm max-w-max">
                    <span class="mr-3">Tag: </span>
                    @foreach ($post->tags as $tag)
                        <span class="mr-1 bg-gray-700 px-1 rounded text-white">{{ $tag->name }}</span>
                    @endforeach
                </div>
                <div class="mt-6">
                    <p class="2xl:text-xl text-base">{{ $post->body }}</p>
                </div>
            </div>
        </div>
    </div>
@endsection
