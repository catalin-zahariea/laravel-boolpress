@extends('layouts.app')

@section('content')
    
    
<div class="p-5">

    <div class="card">
        <div class="card-header">
            {{ucfirst($post->title)}}
        </div>

        <div class="card-body">
            <h5 class="card-title">{{ucfirst($post->title)}}</h5>
            <p class="card-text"><strong>Slug: </strong>{{$post->slug}}</p>
            @if (isset($post_category))
                <h6 class="card-subtitle mb-2 text-muted">Category - <a href="{{route('categories.show', ['id' => $post->category_id])}}">{{$post_category->name}}</a></h6>
            @endif
   
            <h6 class="card-subtitle mb-2 text-muted">Tags -
                @foreach ($post_tags as $tag)
                    <a href="">{{$tag->name}}</a>{{ $loop->last ? '' : ', '  }}
                @endforeach
            </h6>

            <p class="card-text">{{$post->content}}</p>
            <a href="{{route('admin.posts.index')}}" class="btn btn-success">Go back</a>
            <a class="btn btn-secondary" href="{{route('admin.posts.edit', ['post' => $post->id])}}" class="card-link">Modify post</a>
            <form class="d-inline-block" action="{{route('admin.posts.destroy', ['post' => $post->id])}}" method="post">
                @csrf
                @method('DELETE')
                <input type="submit" class="btn btn-danger" value="Delete post">         
            </form>
        </div>
      </div>

</div>
@endsection