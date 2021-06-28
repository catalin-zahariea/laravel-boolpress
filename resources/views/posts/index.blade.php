@extends('layouts.app')

@section('content')
    
    
    <div class="p-5">

        <div class="jumbotron jumbotron-fluid">
            <div class="container">
              <h1 class="display-4">Our blog posts</h1>
            </div>
        </div>
        
        <div class="d-flex flex-wrap">
            @foreach ($posts as $post)
                <div class="card m-1" style="width: calc((100% / 3) - 20px)">
                    <div class="card-body">
                        <h5 class="card-title">{{ucfirst($post->title)}}</h5>
                        @if (isset($post->category_id))
                            <h6 class="card-subtitle mb-2 text-muted">Category - <a href="{{route('categories.show', ['id' => $post->category_id])}}">{{$post->category->name}}</a></h6>
                        @endif                  
                        <p class="card-text">{{substr($post->content, 0, 80)}}..</p>
                        <a class="btn btn-success" href="{{route('guest.show', ['slug' => $post->slug])}}" class="card-link">Read more</a>
                    </div>
                </div>
            @endforeach
        </div>
        
    </div>
@endsection