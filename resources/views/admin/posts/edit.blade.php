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

    <form action="{{route('admin.posts.update', ['post' => $post->id])}}" method="post" enctype="multipart/form-data">
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
        <div class="form-check form-check-inline">
            @foreach ($tags as $tag)
                @if ($errors->any())
                    <input class="form-check-input" type="checkbox" name="tags[]" id="tag-{{$tag->id}}" value="{{$tag->id}}" {{in_array($tag->id, old('tags', [])) ? 'checked' : '' }}>
                    <label class="form-check-label mr-5" for="tags[]">{{$tag->name}}</label>
                @else
                    <input class="form-check-input" type="checkbox" name="tags[]" id="tag-{{$tag->id}}" value="{{$tag->id}}" {{$post->tags->contains($tag->id) ? 'checked' : '' }}>
                    <label class="form-check-label mr-5" for="tags[]">{{$tag->name}}</label>
                @endif               
            @endforeach
        </div>
        {{-- END TAGS --}}

        {{-- COVER --}}
        <div>Cover image:</div>
        <div class="input-group mb-3">
            <div class="custom-file">
              <input type="file" name="cover-image" class="custom-file-input" id="inputGroupFile02">
              <label class="custom-file-label" for="cover-image" aria-describedby="inputGroupFileAddon02">Choose file</label>
            </div>
        </div>

        <div>Current cover preview:</div>
        @if ($post->cover)
            <img src="{{asset('storage/' . $post->cover)}}" class="card-img-top" alt="{{ucfirst($post->title)}}">
        @endif
        {{-- END COVER --}}

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