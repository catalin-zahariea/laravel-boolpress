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

    <form action="{{route('admin.posts.store')}}" method="post" enctype="multipart/form-data">
        @csrf
        @method('POST')

        {{-- TITLE --}}
        <div class="form-group">
          <label for="title">Title:</label>
          <input type="text" class="form-control" name="title" placeholder="Enter title" value="{{old('title', $post->title)}}">
        </div>
        {{-- END TITLE --}}

        {{-- CATEGORY --}}
        <div>Category:</div>
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

        {{-- COVER --}}
        <div>Cover image:</div>
        <div class="input-group mb-3">
            <div class="custom-file">
              <input type="file" name="cover-image" class="custom-file-input" id="inputGroupFile02">
              <label class="custom-file-label" for="cover-image" aria-describedby="inputGroupFileAddon02">Choose file</label>
            </div>
        </div>
        {{-- END COVER --}}
    
        {{-- CONTENT --}}
        <div class="form-group">
            <label for="content">Content:</label>
            <textarea class="form-control" name="content" id="content" cols="30" rows="10">{{old('content', $post->content)}}</textarea>
        </div>
        {{-- END CONTENT --}}
    
        <input class="btn btn-success" type="submit" value="Add new post">
      </form>

</div>

@endsection