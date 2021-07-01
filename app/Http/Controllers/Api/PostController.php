<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Post;

class PostController extends Controller
{
    public function index() {
        $posts = Post::all();

        foreach ($posts as $post) {
            $posts_response[] = [
                'id' => $post->id,
                'title' => $post->title,
                'content' => $post->content,
                'category' => $post->category ? $post->category->name : '',
                'tags' => $post->tags->toArray()
            ];
        }

        $result = [
            'posts' => $posts_response,
            'success' => true
        ];

        return response()->json($result);
    }
}
