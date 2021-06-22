@extends('layouts.app')

@section('content')

<div class="p-5">

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{route('admin.posts.update', ['post' => $post->id])}}" method="post">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="title">Title:</label>
            <input type="text" class="form-control" name="title" value="{{$post->title}}">
        </div>

        <select class="custom-select mt-2 mb-2" name="category_id">
            <option selected>Select a category</option>
                @foreach ($categories as $category)
                    <option value="{{$category->id}}" {{old($category->id)}}>{{$category->name}}</option>
                @endforeach 
          </select>
    
        <div class="form-group">
            <label for="content">Edition:</label>
            <textarea class="form-control" name="content" id="content" cols="30" rows="10"></textarea>
        </div>
    
        <input class="btn btn-secondary" type="submit" value="Modify post">
    </form>

</div>

@endsection