<div class="card mt-3" style="width: 30rem;">
    <div class="card-body">

        {{-- COVER --}}
        @if ($post->cover)
            <img src="{{asset('storage/' . $post->cover)}}" class="card-img-top mb-2" alt="{{ucfirst($post->title)}}">
        @else
            <img src="https://picsum.photos/1080/720" class="card-img-top mb-2" alt="{{ucfirst($post->title)}}">
        @endif
        {{-- END COVER --}}

        {{-- TITLE --}}
        <h5 class="card-title">{{ucfirst($post->title)}}</h5>
        {{-- END TITLE --}}

        {{-- SLUG --}}
        <h6 class="card-subtitle mb-3">Slug: {{$post->slug}}</h6>
        {{-- END SLUG --}}

        {{-- CATEGORY --}}
        @if (isset($post->category_id))
            <h6 class="card-subtitle mb-2 text-muted">Category - <a href="{{route('categories.show', ['slug' => $post->category->slug])}}">{{$post->category->name}}</a></h6>
        @endif
        {{-- END CATEGORY --}}

        {{-- TAGS --}}
        <p class="card-subtitle mb-2 text-muted">Tags:
            @foreach ($post->tags as $item_tag)
                <a href="{{route('tags.show', ['slug' => $item_tag->slug])}}">{{$item_tag->name}}</a>{{$loop->last ? '' : ', '}}
            @endforeach
        </p>
        {{-- END TAGS --}}

        {{-- CONTENT --}}
        <p class="card-text">{{substr($post->content, 0, 80)}}..</p>
        {{-- END CONTENT --}}

        {{-- ACTIONS WITH GUEST CONTROL --}}
        @guest
            <a href="{{route('guest.show', ['slug' => $post->slug])}}" class="btn btn-secondary">Read more</a>
        @else
            <a href="{{route('admin.posts.show', ['post' => $post->id])}}" class="btn btn-success">Read more</a>
            <a class="btn btn-secondary" href="{{route('admin.posts.edit', ['post' => $post->id])}}" class="card-link">Modify post</a>
            <form class="d-inline-block" action="{{route('admin.posts.destroy', ['post' => $post->id])}}" method="post">
                @csrf
                @method('DELETE')
                <input type="submit" class="btn btn-danger" value="Delete post">         
            </form>
        @endguest
        {{-- END ACTIONS --}}
        
    </div>
</div>
