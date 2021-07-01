@extends('layouts.app')

@section('content')
    
    
    <div class="p-5">

        <div class="jumbotron jumbotron-fluid">
            <div class="container">
              <h1 class="display-4">Our blog posts</h1>
            </div>
        </div>

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
                @include('layouts.partials.card')
            @endforeach
        </div>
    </div>
@endsection