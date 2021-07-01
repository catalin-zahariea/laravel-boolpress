@extends('layouts.app')

@section('header-scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.21.1/axios.min.js" integrity="sha512-bZS47S7sPOxkjU/4Bt0zrhEtWx0y0CRkhEp8IckzK+ltifIIE9EMIMTuT/mEzoIMewUINruDBIR/jJnbguonqQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/vue"></script>
@endsection

@section('footer-scripts')
    <script src="{{ asset('js/posts.js') }}"></script>
@endsection

@section('content')
    
    
    <div class="p-5">
        <div id="root">
            <div class="jumbotron jumbotron-fluid">
                <div class="container">
                <h1 class="display-4">@{{title}}</h1>
                </div>
            </div>
            
            <div class="card mt-5">
                <div class="card-body d-flex flex-wrap justify-content-between">
                    <div class="card mt-3" style="width: 30rem;" v-for="post in posts">
                        <div class="card-body">
                    
                            {{-- TITLE --}}
                            <h5 class="card-title">@{{post.title}}</h5>
                            {{-- END TITLE --}}
                    
                            {{-- CATEGORY --}}
                            <h6 class="card-subtitle mb-2">Category - @{{post.category}}</h6>
                            {{-- END CATEGORY --}}
                    
                            {{-- TAGS --}}
                            <p class="card-subtitle mb-2 mt-2">
                                    Tags:
                                <span v-for='tag in post.tags' class="mr-1">@{{tag.name}}</span>
                            </p>
                            {{-- END TAGS --}}
                    
                            {{-- CONTENT --}}
                            <p class="card-text">@{{post.content}}</p>
                            {{-- END CONTENT --}}
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
    </div>
@endsection