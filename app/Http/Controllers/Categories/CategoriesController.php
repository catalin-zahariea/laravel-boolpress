<?php

namespace App\Http\Controllers\Categories;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Category;
use App\Post;

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

    public function show($id) {
        $category = Category::findOrFail($id);
        $posts = Post::all()->where('category_id', '=', $id);

        $data = [
            'category' => $category,
            'posts' => $posts
        ];

        return view('categories.show', $data);
    }
}
