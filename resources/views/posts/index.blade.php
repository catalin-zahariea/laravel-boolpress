@extends('layouts.app')

@section('content')
    
    
    <div class="p-5">

        <div class="jumbotron jumbotron-fluid">
            <div class="container">
              <h1 class="display-4">Our blog posts</h1>
            </div>
        </div>
        
        <div class="card mt-5">
            <div class="card-body d-flex flex-wrap justify-content-between">
                @foreach ($posts as $post)
                    @include('layouts.partials.card')                          
                @endforeach
            </div>
        </div>
        
    </div>
@endsection