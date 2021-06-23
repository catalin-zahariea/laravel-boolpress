<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Category;
use App\Post;

class HomeController extends Controller
{
    public function index () {
        $posts = Post::all();
        $categories = Category::all();

        $data = [
            'posts' => $posts,
            'categories' => $categories
        ];
        
        return view('home', $data);
    }

    public function category ($id) {
        $posts = Post::all()->where('category_id', '=', $id);
        $category = Category::findOrFail($id);
        $categories = Category::all();

        $data = [
            'posts' => $posts,
            'category' => $category,
            'categories' => $categories
        ];
        
        return view('category', $data);
    }
}
