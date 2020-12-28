@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <h1>{{$post->title}}</h1>
        <div class="d-flex justify-content-between align-items-end">
            <span>Updated at {{$post->updated_at->diffforHumans()}}</span>
            <div class="d-flex">
                @auth
                @can('update', $post)
                <div class="btn-group">
                    <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      Option
                    </button>
                    <div class="dropdown-menu">
                        <a href="/posts/edit/{{$post->slug}}" class="dropdown-item">Edit Post</a>
                        <button  data-toggle="modal" data-target="#deleteModal" class="dropdown-item text-white bg-danger">Delete</button>
                    </div>
                </div>
                @endcan
                @endauth
                <a href="{{ route('posts.getAllPost') }}" class="btn btn-success ml-3">Back</a>
            </div>
        </div>
        @include('posts.partials.category')
        <div class="text-secondary">Author {{ $post->author->name }}</div>
        <hr>
        <p>{{ $post->body }}</p>
    </div>
    {{-- Modal --}}
    <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Delete Post</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              Are you sure to <strong class="text-danger">Delete</strong> this Post?
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <a href="/posts/{{$post->slug}}/delete" class="btn btn-danger">Delete</a>
            </div>
          </div>
        </div>
    </div>
@endsection
