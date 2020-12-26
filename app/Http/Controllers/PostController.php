<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PostController extends Controller
{
    public function getAllPost()
    {
        $posts = Post::latest()->paginate(6);
        return view('posts.index', ['posts' => $posts]);
    }

    public function getPost(Post $post)
    {
        return view('posts.post', ['post' => $post]);
    }

    public function create()
    {
        return view('posts.create');
    }

    public function save(PostRequest $request)
    {
        $data = $request->all();
        $data['slug'] = Str::slug(request('title'));
        Post::create($data);

        return redirect()->to('/posts');
    }

    public function edit(Post $post)
    {
        return view('posts.edit', ['post' => $post]);
    }

    public function update(Post $post, PostRequest $request)
    {
        $post->update($request->all());

        return redirect('posts');

    }

    public function delete(Post $post)
    {
        $post->delete();
        return redirect('/posts');
    }
}
