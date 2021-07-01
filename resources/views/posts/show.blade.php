@extends('layouts.app')

@section('content')

    <div class="jumbotron jumbotron-fluid">
        <div class="container">
            <h1 class="display-4">{{ucfirst($post->title)}}</h1>
        </div>
    </div>

    <div class="card-body">
        <div class="card mt-3" style="width: 100%;">
            <div class="card-body">
                @if ($post->cover)
                    <img src="{{asset('storage/' . $post->cover)}}" class="card-img-top mb-2" alt="{{ucfirst($post->title)}}">
                @else
                    <img src="https://picsum.photos/1080/720" class="card-img-top mb-2" alt="{{ucfirst($post->title)}}">
                @endif
                <h5 class="card-title">{{ucfirst($post->title)}}</h5>
                @if (isset($post->category_id))
                    <h6 class="card-subtitle mb-2 text-muted">Category - <a href="{{route('categories.show', ['slug' => $post->category->slug])}}">{{$post->category->name}}</a></h6>
                @endif
                <p class="card-subtitle mb-2 text-muted">Tags:
                    @foreach ($post->tags as $item_tag)
                        <a href="{{route('tags.show', ['slug' => $item_tag->slug])}}">{{$item_tag->name}}</a>{{$loop->last ? '' : ', '}}
                    @endforeach
                </p>
                <p class="card-text">{{$post->content}}</p>
                @guest
                    <a href="{{route('guest.index')}}" class="btn btn-success">Go back</a>
                @else
                    <a href="{{route('admin.posts.show', ['post' => $post->id])}}" class="btn btn-success">Read more</a>
                    <a class="btn btn-secondary" href="{{route('admin.posts.edit', ['post' => $post->id])}}" class="card-link">Modify post</a>
                    <form class="d-inline-block" action="{{route('admin.posts.destroy', ['post' => $post->id])}}" method="post">
                        @csrf
                        @method('DELETE')
                        <input type="submit" class="btn btn-danger" value="Delete post">         
                    </form>
                @endguest                          
            </div>
        </div>
    </div>

@endsection