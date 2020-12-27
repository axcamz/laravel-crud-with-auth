<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
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
        $categories = Category::get();
        $tags = Tag::get();
        return view('posts.create', [
            'post' => new Post(),
            'categories' => $categories,
            'tags' => $tags
            ]);
        }

    public function save(PostRequest $request)
    {
        // dd(request('tags'));
        $data = $request->all();
        $data['slug'] = Str::slug(request('title'));
        $data['category_id'] = request('category_id');

        $post = Post::create($data);
        $post->tags()->attach(request('tags'));

        session()->flash('success', 'Create Post Success');

        return redirect()->to('/posts');
    }

    // Edit Function
    public function edit(Post $post)
    {
        $categories = Category::get();
        $tags = Tag::get();
        return view('posts.edit', [
            'post' => $post,
            'categories' => $categories,
            'tags' => $tags
        ]);
    }

    public function update(Post $post, PostRequest $request)
    {
        $request['category_id'] = request('category_id');

        $post->update($request->all());
        $post->tags()->sync(request('tags'));

        session()->flash('success', 'Update Post Success');

        return redirect('posts');

    }

    // Delete Function
    public function delete(Post $post)
    {
        $post->tags()->detach();
        $post->delete();
        session()->flash('success', 'Delete Post Success');
        return redirect('/posts');
    }


}
