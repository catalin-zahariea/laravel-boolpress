@extends('layouts.app')

@section('content')
    
    
    <div class="p-5">

        <div class="jumbotron jumbotron-fluid">
            <div class="container">
              <h1 class="display-4">Categories</h1>
              <p class="lead">Here you can view our posts grouped by category</p>
            </div>
        </div>

        @foreach ($categories as $category)
            @if ($category->posts->isNotEmpty())
                <div class="card mt-5">
                    <div class="card-header">
                    <a class="btn btn-success" href="{{route('categories.show', [ 'id' => $category->id])}}">{{$category->name}}</a>
                    </div>
                    <div class="card-body d-flex flex-wrap justify-content-between">
                        @foreach ($posts as $post)
                            @if ($post->category_id == $category->id)
                                <div class="card mt-3" style="width: 30rem">
                                    <div class="card-body">
                                        <h5 class="card-title">{{ucfirst($post->title)}}</h5>
                                        <p class="card-text">{{substr($post->content, 0, 80)}}..</p>
                                        @guest
                                            <a href="{{route('guest.show', ['slug' => $post->slug])}}" class="btn btn-secondary">Read more</a>
                                        @else
                                            <a href="{{route('admin.posts.show', ['post' => $post->id])}}" class="btn btn-secondary">Read more</a>
                                        @endguest 
                                    </div>
                                </div>
                            @endif  
                        @endforeach
                    </div>
                </div>
            @endif
        @endforeach
    </div>
@endsection