@extends('layouts.app')

@section('content')
<div class="jumbotron jumbotron-fluid">
    <div class="container">
      <h1 class="display-4">Contacts</h1>
      <p class="lead">Fill out the form and we'll be back at you as soon as we can!</p>
    </div>
</div>

<div class="container">
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{route('contacts.new-contact')}}" method="post">
        @csrf
        @method('POST')
    
        {{-- NAME --}}
        <div class="form-group">
          <label for="name">Name:</label>
          <input type="text" class="form-control" name="name" placeholder="Write your name" value="{{old('name')}}">
        </div>
        {{-- END NAME --}}

        {{-- EMAIL --}}
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" class="form-control" name="email" placeholder="Write your email" value="{{old('email')}}">
        </div>
        {{-- END EMAIL --}}

        {{-- MESSAGE --}}
        <div class="form-group">
            <label for="message">Message:</label>
            <textarea name="message" class="form-control" cols="30" rows="10" placeholder="Write your message"></textarea>
        </div>
        {{-- END MESSAGE --}}
    
        {{-- TERMS & CONDITIONS | MARKETING CONDITIONS \ SEND BTN --}}
        <div class="d-flex justify-content-between align-items-center">
            <div>
                <div class="d-flex align-items-center">
                    {{-- TERMS & CONDITIONS --}}
                    <div class="custom-control custom-switch mr-5">
                        <input type="checkbox" class="custom-control-input" name="terms-and-conditions" id="terms-and-conditions" value="true">
                        <label class="custom-control-label" for="terms-and-conditions"><a href="{{route('terms-and-conditions')}}">Terms & Conditions</a></label>
                    </div>
                    {{-- END TERMS & CONDITIONS --}}

                    {{-- MARKETING CONDITIONS --}}
                    <div class="custom-control custom-switch">
                        <input type="checkbox" class="custom-control-input" name="marketing-conditions" id="marketing-conditions" value="true">
                        <label class="custom-control-label" for="marketing-conditions"><a href="{{route('marketing-conditions')}}">Marketing Conditions</a></label>
                    </div>
                    {{-- END MARKETING CONDITIONS --}}
                </div>
            </div>

            {{-- SEND BTN --}}
            <input class="btn btn-success" type="submit" value="Send">
            {{-- END SEND BTN --}}
        </div>
    </form>
</div>
@endsection