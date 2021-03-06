<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\MessageBag;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Mail;
use App\Mail\NewPostNotification;
use App\Post;
use App\Category;
use App\Tag;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all();

        $data = [
            'posts' => $posts
        ];

        return view('admin.posts.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $post = new Post();
        $categories = Category::all();
        $tags = Tag::all();

        $data = [
            'post' => $post,
            'categories' => $categories,
            'tags' => $tags
        ];

        return view('admin.posts.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
            'category_id' => 'nullable|exists:categories,id',
            'tags' => 'nullable|exists:tags,id',
            'cover-image' => 'image'
        ]);

        $new_post_data = $request->all();
        
        $new_slug = Str::slug($new_post_data['title'], '-');
        $base_slug = $new_slug;

        $existing_slug = Post::where('slug', '=', $new_slug)->first();
        $counter = 1;

        while($existing_slug) {
            $new_slug = $base_slug . '-' . $counter;
            $counter++;
            $existing_slug = Post::where('slug', '=', $new_slug)->first();
        }

        $new_post_data['slug'] = $new_slug;

        if(isset($new_post_data['cover-image'])) {
            $new_img_path = Storage::put('posts-cover', $new_post_data['cover-image']);

            if($new_img_path) {
                $new_post_data['cover'] = $new_img_path;
            }
        }
        
        $new_post = new Post();
        $new_post->fill($new_post_data);
        $new_post->save();

        if(isset($new_post_data['tags']) && is_array($new_post_data['tags'])) {
            $new_post->tags()->sync($new_post_data['tags']);
        }

        Mail::to('catalin@mail.com')->send(new NewPostNotification($new_post));

        return redirect()->route('admin.posts.show', ['post' => $new_post->id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::findOrFail($id);

        $data = [
            'post' => $post,
            'post_category' => $post->category,
            'post_tags' => $post->tags
        ];

        return view('admin.posts.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::findOrFail($id);
        $categories = Category::all();
        $tags = Tag::all();

        $data = [
            'post' => $post,
            'categories' => $categories,
            'tags' => $tags
        ];

        return view('admin.posts.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
            'category_id' => 'nullable|exists:categories,id',
            'tags' => 'nullable|exists:tags,id',
            'cover-image' => 'image'
        ]);

        $update_post = Post::findOrFail($id);
        $update_post_data = $request->all();
        
        if($update_post_data['title'] != $update_post->title) {
            $new_slug = Str::slug($update_post_data['title'], '-');
            $base_slug = $new_slug;

            $existing_slug = Post::where('slug', '=', $new_slug)->first();
            $counter = 1;

            while($existing_slug) {
                $new_slug = $base_slug . '-' . $counter;
                $counter++;
                $existing_slug = Post::where('slug', '=', $new_slug)->first();
            }

            $update_post_data['slug'] = $new_slug;
        }

        if(isset($update_post_data['cover-image'])) {
            $update_img_path = Storage::put('posts-cover', $update_post_data['cover-image']);

            if($update_img_path) {
                $update_post_data['cover'] = $update_img_path;
            }
        }

        $update_post->update($update_post_data);

        if(isset($update_post_data['tags']) && is_array($update_post_data['tags'])) {
            $update_post->tags()->sync($update_post_data['tags']);
        } else {
            $update_post->tags()->sync([]);
        }

        return redirect()->route('admin.posts.show' , ['post' => $update_post->id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        $post->tags()->sync([]);
        $post->delete();

        return redirect()->route('admin.posts.index');
    }
}
