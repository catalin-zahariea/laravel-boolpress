@extends('layouts.app')

@section('content')
    
    
    <div class="p-5">

        <div class="card" style="width: 100%">
            <div class="card-body">
                <h5 class="card-title">{{ucfirst($post->title)}}</h5>
                <p class="card-text">{{$post->content}}</p>
            </div>
        </div>
    
    </div>
@endsection