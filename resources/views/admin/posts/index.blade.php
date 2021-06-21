@extends('layouts.app')

@section('content')
    
    
    <div class="p-5">

        <h1 class="m-1">Ecco la nostra lista di posts:</h1>

        <div class="jumbotron m-1" style="width: calc(100% - 44px)">
            <h1 class="display-4">Create a new post</h1>
            <p class="lead">You can create a new post by clicking on the button below!</p>
            <hr class="my-4">
            <a class="btn btn-primary btn-lg" href="{{route('admin.posts.create')}}" role="button">Create a new post</a>
        </div>

        <div class="d-flex flex-wrap">
            @foreach ($posts as $post)
                <div class="card m-1" style="width: calc((100% / 3) - 20px)">
                    <div class="card-body">
                        <h5 class="card-title">{{ucfirst($post->title)}}</h5>
                        <p class="card-text">{{substr($post->content, 0, 80)}}..</p>
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