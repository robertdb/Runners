@extends('layouts.main')

@section('content')

      <div class="container-flex">
        @include('home.shortcut')
        @include('home.post', ['posts' => $posts])
      </div>
      @include('home.map')

@endsection
