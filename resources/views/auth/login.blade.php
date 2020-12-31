@extends('layouts.app')

@section('content')
<div class="flex flex-col lg:flex-row lg:container lg:mx-auto lg:py-10 items-center">
    <div class="w-4/6">
        <img class="lg:mb-0 mb-10" src="{{ asset('backround/login.png') }}" alt="">
    </div>
    <div class="lg:w-1/3 lg:px-0 w-full md:w-2/3 px-10">
        <form action="{{ route('login') }}" method="post">
            @csrf
            <div class="flex flex-col px-2">
                <h1 class="text-5xl font-bold self-center mb-10">Log in</h1>
                <div class="form-control w-full flex flex-col mb-10">
                    <label class="mb-2 font-medium" for="username">Username</label>
                    <input placeholder="enter your username" class="py-2 px-3 border-gray-400 border ring-gray-300 rounded focus:ring-4 focus:border-gray-800 transition outline-none" type="text" name="username" id="username">
                    @error('username')
                        <p class="text-red-800">{{ $message }}</p>
                    @enderror
                </div>
                <div class="form-control w-full flex flex-col mb-10">
                    <label class="mb-2 font-medium" for="password">Password</label>
                    <input placeholder="enter your password" class="py-2 px-3 border-gray-400 border ring-gray-300 rounded focus:ring-4 focus:border-gray-800 transition outline-none" type="password" name="password" id="password">
                    @error('username')
                        <p class="text-red-800">{{ $message }}</p>
                    @enderror
                </div>
                <button type="submit" class="bg-black text-xl py-2 rounded text-white">Log in</button>
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
