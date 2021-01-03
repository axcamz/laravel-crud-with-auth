@extends('layouts.app')

@section('content')
<div class="lg:container lg:mx-auto lg:px-0 px-3 lg:pt-0 py-10">
    <div class="flex justify-center items-center min-h-screen lg:flex-row flex-col">
        <div data-aos="fade-up" class="flex-1 flex lg:justify-start lg:items-start items-center flex-col justify-center">
            <h1 class="lg:text-8xl text-7xl font-semibold text-black mb-10 lg:text-left text-center">Welcome to Friday.</h1>
            @auth
            <a href="{{ route('posts.getAllPost') }}" class="px-10 py-2 ml-10 bg-black text-white lg:text-2xl rounded">Go to Posts</a>
            @else
            <a href="{{ route('register') }}" class="px-10 py-2 lg:ml-10 bg-black text-white lg:text-2xl rounded">Sign Up</a>
            @endauth
        </div>
        <div data-aos="fade-up" data-aos-delay="200" class="flex-1">
            <img src="{{ asset('backround/homepage.png') }}" alt="">
        </div>
    </div>
    <div class="flex lg:flex-row flex-col">
        <div data-aos="fade-up" class="flex-1 lg:static absolute z-0">
            <img src="{{ asset('backround/homepage-2.png') }}" alt="">
        </div>
        <div data-aos="fade-right" data-aos-delay="200" class="flex-1 flex justify-center flex-col z-10">
            <h1 class="text-black text-4xl mb-16">Whats is Friday?</h1>
            <div class="p-10 bg-black rounded">
                <p class="text-white text-2xl">
                    Fridays a website that is intended for people who have a hobby of writing. People can share stories like blogspot
                </p>
            </div>
        </div>
    </div>
</div>
@endsection
