<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    public function filterByTag(Tag $tag)
    {
        $posts = $tag->posts()->paginate(6);
        $categories = Category::get();

        return view('posts.index', compact('posts', 'tag', 'categories'));
    }
}
