@extends('layouts.app')

@section('content')
    <div class="p-5">
        <div class="card" style="width: 100%">
            <img src="https://picsum.photos/1920/300" class="card-img-top" alt="Jumbotron">
            <div class="card-body">
              <h1 class="card-title">Boolpress</h1>
              <p class="card-text">A wordpress example website built using Laravel.</p>
              <a href="{{route('admin.posts.index')}}" class="btn btn-primary">Read our blog posts</a>
            </div>
          </div>
    </div>
@endsection
