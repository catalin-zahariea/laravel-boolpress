@extends('layouts.app')

@section('content')
    
    
    <div class="p-5">

        <h1 class="mb-5">Our blog posts:</h1>

        <div class="card mb-5">
            <div class="card-header">
              Add a new blog post
            </div>
            <div class="card-body">
              <h5 class="card-title">Create a new post</h5>
              <p class="card-text">You can create a new post by clicking on the button below!</p>
              <a href="{{route('admin.posts.create')}}" class="btn btn-primary">Create a new post</a>
            </div>
          </div>

        <div class="d-flex flex-wrap justify-content-sm-between">
            @foreach ($posts as $post)
                <div class="card mb-5" style="width: 30rem">
                    <div class="card-body">
                        <h5 class="card-title">{{ucfirst($post->title)}}</h5>
                        <p class="card-text">{{substr($post->content, 0, 80)}}..</p>
                        @if ($post->category)
                            <p class="card-text"><strong>Category: </strong>{{$post->category['name']}}</p>
                        @endif
                        <p class="card-text"><strong>Slug: </strong>{{$post->slug}}</p>
                        <a class="btn btn-success" href="{{route('admin.posts.show', ['post' => $post->id])}}" class="card-link">Read more</a>
                        <a class="btn btn-secondary" href="{{route('admin.posts.edit', ['post' => $post->id])}}" class="card-link">Modify post</a>
                        <form class="d-inline-block" action="{{route('admin.posts.destroy', ['post' => $post->id])}}" method="post">
                            @csrf
                            @method('DELETE')
                            <input type="submit" class="btn btn-danger" value="Delete post">         
                        </form>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection