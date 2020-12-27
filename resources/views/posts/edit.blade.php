@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="d-flex">
            <h1>Edit Post</h1>
        </div>
        <hr>
        <div class="row">
            <div class="col-lg-10">
                <form method="post" action="/posts/update/{{ $post->slug }}">
                    @csrf
                    @method('patch')
                    @include('posts.partials.form-control')
                    <button type="submit" class="btn btn-primary">Submit</button>
                  </form>
            </div>
        </div>
    </div>
@endsection
