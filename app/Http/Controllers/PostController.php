<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PostController extends Controller
{

    // Get ALl Post
    public function getAllPost()
    {
        $posts = Post::latest()->paginate(6);
        $categories = Category::get();
        return view('posts.index', [
            'posts' => $posts,
            'categories' => $categories
        ]);
    }

    // Get Single Post
    public function getPost(Post $post)
    {
        return view('posts.post', ['post' => $post]);
    }

    // Create Function
    public function create()
    {
        return view('posts.create');
    }

    public function save(PostRequest $request)
    {
        $data = $request->all();
        $data['slug'] = Str::slug(request('title'));
        Post::create($data);
        session()->flash('success', 'Create Post Success');
        return redirect()->to('/posts');
    }

    // Edit Function
    public function edit(Post $post)
    {
        return view('posts.edit', ['post' => $post]);
    }

    public function update(Post $post, PostRequest $request)
    {
        $post->update($request->all());
        session()->flash('success', 'Update Post Success');
        return redirect('posts');

    }

    // Delete Function
    public function delete(Post $post)
    {
        $post->delete();
        session()->flash('success', 'Delete Post Success');
        return redirect('/posts');
    }


}
