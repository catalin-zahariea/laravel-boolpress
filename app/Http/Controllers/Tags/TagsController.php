<?php

namespace App\Http\Controllers\Tags;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Post;
use App\Tag;

class TagsController extends Controller
{
    public function index() {
        $posts = Post::all();
        $tags = Tag::all();

        $data = [
            'posts' => $posts,
            'tags' => $tags
        ];

        return view('tags.index', $data);
    }

    public function show($slug) {
        $tag = Tag::where('slug' , '=' , $slug)->first();
        $posts = $tag->posts;

        $data = [
            'tag' => $tag,
            'posts' => $posts
        ];

        return view('tags.show', $data);
    }
}