@extends('layouts.app', ['title' => 'Create'])

@section('content')
    <div class="lg:mx-auto lg:container mt-5 xl:px-0 px-3 pb-10">
        <div class="flex">
            <h1 class="lg:text-4xl text-2xl font-semibold">Create Post</h1>
        </div>
        <hr>
        <div class="mt-5">
            <form method="POST" action="/posts/save" enctype="multipart/form-data">
                @csrf
                @include('posts.partials.form-control')
                <div class="flex justify-end">
                    <button type="submit" class="mt-5 xl:w-auto w-full bg-black text-white text-lg lg:text-2xl font-medium py-2 px-4 rounded cursor-pointer">Save</button>
                </div>
            </form>
        </div>
    </div>
@endsection
