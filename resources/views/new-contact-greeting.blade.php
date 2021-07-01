@extends('layouts.app')

@section('content')
<div class="jumbotron jumbotron-fluid">
    <div class="container">
      <h1 class="display-4">Thank you</h1>
      <p class="lead">Thank you {{$form_data['name']}} for contacting us!</p>
    </div>
</div>
@endsection