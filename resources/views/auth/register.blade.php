@extends('layouts.app')

@section('content')
<div class="flex flex-col lg:flex-row lg:container lg:mx-auto lg:py-10 items-center">
    <div class="w-4/6">
        <img class="lg:mb-0 mb-10" src="{{ asset('backround/register.png') }}" alt="">
    </div>
    <div class="lg:w-1/3 lg:px-0 w-full md:w-2/3 px-10">
        <form action="{{ route('register') }}" method="post">
            @csrf
            <div class="flex flex-col px-2">
                <h1 class="text-5xl font-bold self-center mb-10">Sign Up</h1>
                <div class="form-control w-full flex flex-col mb-7">
                    <label class="mb-2 font-medium" for="name">Name</label>
                    <input value="{{ old('name') }}" placeholder="enter your name" class="py-2 px-3 border-gray-400 border ring-gray-300 rounded focus:ring-4 focus:border-gray-800 transition outline-none" type="text" name="name" id="name">
                    @error('name')
                        <p class="text-red-800">{{ $message }}</p>
                    @enderror
                </div>
                <div class="form-control w-full flex flex-col mb-7">
                    <label class="mb-2 font-medium" for="username">Username</label>
                    <input value="{{ old('username') }}" placeholder="enter your username" class="py-2 px-3 border-gray-400 border ring-gray-300 rounded focus:ring-4 focus:border-gray-800 transition outline-none" type="text" name="username" id="username">
                    @error('username')
                        <p class="text-red-800">{{ $message }}</p>
                    @enderror
                </div>
                <div class="form-control w-full flex flex-col mb-7">
                    <label class="mb-2 font-medium" for="email">email</label>
                    <input value="{{ old('email') }}" placeholder="enter your email" class="py-2 px-3 border-gray-400 border ring-gray-300 rounded focus:ring-4 focus:border-gray-800 transition outline-none" type="email" name="email" id="email">
                    @error('email')
                        <p class="text-red-800">{{ $message }}</p>
                    @enderror
                </div>
                <div class="form-control w-full flex flex-col mb-7">
                    <label class="mb-2 font-medium" for="password">password</label>
                    <input placeholder="enter your password" class="py-2 px-3 border-gray-400 border ring-gray-300 rounded focus:ring-4 focus:border-gray-800 transition outline-none" type="password" name="password" id="password">
                    @error('password')
                        <p class="text-red-800">{{ $message }}</p>
                    @enderror
                </div>
                <button type="submit" class="bg-black hover:bg-gray-900 transition text-xl py-2 rounded text-white">Register</button>
                <p class="mt-5">Don't have account? <a class="text-blue-500" href="{{ route('register') }}">Sign Up</a></p>
                @if (Route::has('password.request'))
                    <a class="text-blue-500" href="{{ route('password.request') }}">
                        {{ __('Forgot Your Password?') }}
                    </a>
                @endif
            </div>
        </form>
    </div>
</div>
@endsection
