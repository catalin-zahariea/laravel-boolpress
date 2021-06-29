<?php

namespace App\Http\Controllers\Categories;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Category;
use App\Post;
use App\Tag;

class CategoriesController extends Controller
{
    public function index() {
        $categories = Category::all();
        $posts = Post::all();

        $data = [
            'categories' => $categories,
            'posts' => $posts
        ];

        return view('categories.index', $data);
    }

    public function show($slug) {
        $category = Category::where('slug' , '=' , $slug)->first();
        $posts = $category->posts;

        $data = [
            'category' => $category,
            'posts' => $posts
        ];

        return view('categories.show', $data);
    }
}
