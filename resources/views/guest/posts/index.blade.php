@extends('layouts.app')

@section('content')
    
    
    <div class="p-5">

        <h1>Ecco la nostra lista di posts:</h1>

        <div class="d-flex flex-wrap">
            @foreach ($posts as $post)
                <div class="card m-1" style="width: calc((100% / 3) - 20px)">
                    <div class="card-body">
                        <h5 class="card-title">{{ucfirst($post->title)}}</h5>
                        <p class="card-text">{{substr($post->content, 0, 80)}}..</p>
                        <a class="btn btn-success" href="{{route('post', ['slug' => $post->slug])}}" class="card-link">Read more</a>
                    </div>
                </div>
            @endforeach
        </div>
        
    </div>
@endsection