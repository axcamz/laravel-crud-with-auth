@extends('layouts.app')

@section('content')
    {{-- Delete Confirmation --}}
    <div class="delete-confirm shadow-lg">
        <span class="close">x</span>
        <h1>Are Your sure to Delete this Post?</h1>
        <p>this post created at <span class="text-blue-600">{{ $post->created_at->format('d M, Y') }}</span></p>
        <a class="hover:bg-black transition rounded lg hover:text-white py-2 px-4" href="{{ route('posts.delete', $post->slug) }}">Delete</a>
    </div>
    <div class="z-0 relative">
        {{-- @if ($post->takeImage) --}}
        <img src="{{ $post->takeImage }}" alt="Thumbnail" class="lg:h-80 w-full h-60 object-cover object-center">
        {{-- @else
        <div class="lg:h-80 w-full h-60 bg-gray-800 flex justify-center items-center text-white text-2xl">No Thumbnail</div> --}}
        {{-- @endif --}}
        @if($post->author()->is(auth()->user()))
            <div class="absolute top-4 right-4 xl:right-8 bg-white bg-opacity-75 p-1 rounded-full group cursor-pointer z-50">
                <svg xmlns="http://www.w3.org/2000/svg" class="text-black w-6 xl:w-9" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 5v.01M12 12v.01M12 19v.01M12 6a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z" />
                </svg>
                <div class="hidden group-hover:flex bg-white shadow-lg text-black flex-col rounded overflow-hidden right-0 absolute w-60 ">
                    <a class="px-2 py-3 hover:bg-black hover:text-white" href="{{ route('posts.edit', $post->slug) }}">Edit</a>
                    <a class="hover:bg-black hover:text-white px-2 py-3" id="delete">Delete</a>
                </div>
            </div>
        @endif
    </div>
    <div class="lg:px-0 px-3">
        <div class="lg:container shadow-lg relative rounded -mt-20 lg:-mt-28 bg-white lg:px-0 lg:mx-auto text-black z-10">
            <div class="lg:px-14 lg:py-14 px-3 py-3">
                <h1 class="lg:text-5xl text-3xl font-semibold">{{ $post->title }}</h1>
                <div class="flex mt-3">
                    <a href="{{ route('posts.filterByCategory', $post->category->name) }}" class="bg-yellow-500 px-1 lg:text-lg rounded inline-block">{{ $post->category->name }}</a>
                    <div class="flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 ml-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path class="text-gray-900" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        <span class="text-gray-900 text-sm ml-1 ">{{ $post->created_at->format('D M Y') }}</span>
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
