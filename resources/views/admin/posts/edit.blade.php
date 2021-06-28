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

        {{-- TITLE --}}
        <div class="form-group">
            <label for="title">Title:</label>
            <input type="text" class="form-control" name="title" value="{{old('title', $post->title)}}">
        </div>
        {{-- END TITLE --}}

        {{-- CATEGORY --}}
        <select class="custom-select mt-2 mb-2" name="category_id">
            <option selected>Select a category</option>
                @foreach ($categories as $category)
                    <option value="{{$category->id}}" {{old('category_id', $post->category_id) == $category->id ? 'selected' : ''}}>{{$category->name}}</option>
                @endforeach 
        </select>
        {{-- END CATEGORY --}}

        {{-- TAGS --}}
        <div>Tags:</div>
        <div class="btn-group btn-group-toggle mt-2 mb-2" data-toggle="button">
            @foreach ($tags as $tag)
                <label class="btn btn-primary">
                    <input type="checkbox" name="tags[]" id="{{$tag->id}}" value="{{$tag->id}}" {{in_array($tag->id, old('tags', [])) ? 'checked' : '' }}>{{$tag->name}}
                </label>
            @endforeach
        </div>
        {{-- END TAGS --}}

        {{-- CONTENT --}}
        <div class="form-group">
            <label for="content">Content:</label>
            <textarea class="form-control" name="content" id="content" cols="30" rows="10">{{old('content', $post->content)}}</textarea>
        </div>
        {{-- END CONTENT --}}
    
        <input class="btn btn-secondary" type="submit" value="Modify post">
    </form>

</div>

@endsection