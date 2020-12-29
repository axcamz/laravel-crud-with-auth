@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="d-flex">
            <h1>Create Post</h1>
        </div>
        <hr>
        <div class="row">
            <div class="col-lg-10">
                <form method="POST" action="/posts/save" enctype="multipart/form-data">
                    @csrf
                    @include('posts.partials.form-control')
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
@endsection
