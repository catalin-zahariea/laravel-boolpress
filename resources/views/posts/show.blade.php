@extends('layouts.app')

@section('content')
    
    
    <div class="p-5">

        <div class="card">
            <div class="card-header">
                {{ucfirst($post->title)}}
            </div>

            <div class="card-body">
                <h5 class="card-title">{{ucfirst($post->title)}}</h5>
                @if (isset($post->category))
                    <h6 class="card-subtitle mb-2 text-muted">Category - <a href="{{route('categories.show', ['id' => $post->category_id])}}">{{$post->category->name}}</a></h6>
                @endif

                    
                    <h6 class="card-subtitle mb-2 text-muted">Tags -
                        @foreach ($post_tags as $tag)
                            <a href="">{{$tag->name}}</a>{{ $loop->last ? '' : ', '  }}
                        @endforeach
                    </h6>

                <p class="card-text">{{$post->content}}</p>
                <a href="{{route('guest.index')}}" class="btn btn-secondary">Go back</a>
            </div>
          </div>
    
    </div>
@endsection