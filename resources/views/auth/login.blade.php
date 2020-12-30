@extends('layouts.app')

@section('content')
<div class="flex flex-col lg:flex-row lg:container lg:mx-auto lg:py-10 items-center">
    <div class="w-4/6">
        <img class="lg:mb-0 mb-10" src="{{ asset('backround/login.png') }}" alt="">
    </div>
    <div class="lg:w-1/3 lg:px-0 w-full px-10">
        <form action="{{ route('login') }}" method="post">
            @csrf
            <div class="flex flex-col px-2">
                <h1 class="text-4xl font-bold self-center mb-10">Log in</h1>
                <div class="form-control w-full flex flex-col mb-10">
                    <label class="mb-2 font-medium" for="username">Username</label>
                    <input class="py-2 px-3 border-gray-400 border rounded focus:ring-4 focus:border-gray-800 transition outline-none" type="text" name="username" id="username">
                    @error('username')
                        <p class="text-red-800">{{ $message }}</p>
                    @enderror
                </div>
                <div class="form-control w-full flex flex-col mb-10">
                    <label class="mb-2 font-medium" for="password">Password</label>
                    <input class="py-2 px-3 border-gray-400 border rounded focus:ring-4 focus:border-gray-800 transition outline-none" type="password" name="password" id="password">
                    @error('username')
                        <p class="text-red-800">{{ $message }}</p>
                    @enderror
                </div>
                <button type="submit" class="bg-black text-xl py-2 rounded text-white">Log in</button>
            </div>
        </form>
    </div>
</div>
@endsection
