<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class PostController extends Controller
{

    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }
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

    public function store(PostRequest $request)
    {
        // dd(request('tags'));
        $data = $request->all();

        // Create Slug of title
        $data['slug'] = Str::slug(request('title'));
        $slug = $data['slug'];

        // Check Thumbnail
        if ($request->file('thumbnail')) {
            $thumbnail = request()->file('thumbnail')->store("images/posts");
        } else {
            $thumbnail = null;
        }

        // Assign
        $data['category_id'] = request('category_id');
        $data['thumbnail'] = $thumbnail;

        // save posts
        $post = auth()->user()->posts()->create($data);

        // attach post_ids and tag_ids
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
        $this->authorize('update', $post);

        // Chech is thumbnail or no
        if ($request->file('thumbnail')) { //if yes -> delete old thumbnail and replace new
            Storage::delete($post->thumbnail);
            $thumbnail = request()->file('thumbnail')->store("images/posts");
        } else {
            $thumbnail = $post->thumbnail;
        }

        $data = $request->all();

        $data['category_id'] = request('category_id');
        $data['thumbnail'] = $thumbnail;

        $post->update($data);
        $post->tags()->sync(request('tags'));

        session()->flash('success', 'Update Post Success');

        return redirect('posts');

    }

    // Delete Function
    public function delete(Post $post)
    {
        if (auth()->user() == $post->author) {
            $post->tags()->detach();
            Storage::delete($post->thumbnail);
            $post->delete();
            session()->flash('success', 'Delete Post Success');
            return redirect('/posts');
        } else {
            return back();
        }

    }


}
