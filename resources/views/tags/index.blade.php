@extends('layouts.app')

@section('content')
    
    
    <div class="p-5">

        <div class="jumbotron jumbotron-fluid">
            <div class="container">
              <h1 class="display-4">Tags</h1>
              <p class="lead">Here you can view our posts grouped by tags</p>
            </div>
        </div>

        @foreach ($tags as $tag)
            @if ($tag->posts->isNotEmpty())
                <div class="card mt-5">
                    <div class="card-header">
                    <a class="btn btn-success" href="{{route('tags.show', [ 'id' => $tag->id])}}">{{$tag->name}}</a>
                    </div>
                    <div class="card-body d-flex flex-wrap justify-content-between">
                        @foreach ($tag->posts as $post)
                            <div class="card mt-3" style="width: 30rem;">
                                <div class="card-body">
                                    <h5 class="card-title">{{ucfirst($post->title)}}</h5>
                                    @if (isset($post->category_id))
                                        <h6 class="card-subtitle mb-2 text-muted">Category - <a href="{{route('categories.show', ['id' => $post->category_id])}}">{{$post->category->name}}</a></h6>
                                    @endif
                                    <p class="card-subtitle mb-2 text-muted">Tags:
                                        @foreach ($post->tags as $item_tag)
                                            <a href="{{route('tags.show', ['id' => $item_tag->id])}}">{{$item_tag->name}}</a>{{$loop->last ? '' : ', '}}
                                        @endforeach
                                    </p>
                                    <p class="card-text">{{substr($post->content, 0, 80)}}..</p>
                                    @guest
                                        <a href="{{route('guest.show', ['slug' => $post->slug])}}" class="btn btn-secondary">Read more</a>
                                    @else
                                        <a href="{{route('admin.posts.show', ['post' => $post->id])}}" class="btn btn-secondary">Read more</a>
                                    @endguest                          
                                </div>
                            </div>                      
                        @endforeach
                    </div>
                </div>
            @endif
        @endforeach
    </div>
@endsection