@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="d-flex">
            <h1>Create Post</h1>
        </div>
        <hr>
        <div class="row">
            <div class="col-lg-10">
                <form method="POST" action="/posts/save">
                    @csrf
                    <div class="form-group">
                      <label for="title">Title</label>
                      <input type="text" name="title" class="form-control" id="title">
                      @error('title')
                          {{$message}}
                      @enderror
                    </div>
                    <div class="form-group">
                      <label for="body">Body</label>
                      <textarea rows="10" name="body" type="text" class="form-control" id="body"></textarea>
                      @error('body')
                          {{$message}}
                      @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                  </form>
            </div>
        </div>
    </div>
@endsection
