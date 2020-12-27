<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    // Filter by Category
    public function filterByCategory(Category $category)
    {
        $posts = $category->posts()->paginate(6);
        $categories = Category::get();
        return view('posts.index', compact('posts', 'category', 'categories'));
    }
}
