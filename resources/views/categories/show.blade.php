@extends('layouts.app')

@section('content')
    
    
    <div class="p-5">

        <div class="jumbotron jumbotron-fluid">
            <div class="container">
              <h1 class="display-4">{{$category->name}}</h1>
            </div>
        </div>

        @if ($posts->isNotEmpty())
            <div class="card mt-5">
                <div class="card-header">
                    {{$category->name}}
                </div>
                <div class="card-body d-flex flex-wrap justify-content-between">
                    @foreach ($posts as $post)
                        @include('layouts.partials.card')
                    @endforeach
                </div>
            </div>
        @else
            <div class="card mt-5">
                <div class="card-header">
                    {{$category->name}}
                </div>
                <div class="card-body">
                    <h5 class="card-title">There are no posts with this category</h5>
                </div>
            </div>     
        @endif

    </div>
@endsection