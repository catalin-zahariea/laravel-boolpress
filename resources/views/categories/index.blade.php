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
                    <a class="btn btn-success" href="{{route('categories.show', [ 'slug' => $category->slug])}}">{{$category->name}}</a>
                    </div>
                    <div class="card-body d-flex flex-wrap justify-content-between">
                        @foreach ($category->posts as $post)
                            @include('layouts.partials.card')                          
                        @endforeach
                    </div>
                </div>
            @endif
        @endforeach
    </div>
@endsection