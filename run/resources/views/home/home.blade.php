@extends('layouts.main')

@section('content')

      <div class="container-flex">
        @include('home.shortcut')
        @include('home.post', ['posts' => $posts])
      </div>
      @include('home.map')

@endsection

@section('js')
  
  <script
    async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCv2ct01-Nd8vzgRYN2pnUNbMsi2Rfa6Bg&libraries=places"
  >
  </script>
  <script
    async defer
    type="text/javascript"
    src="{{asset('js/gmaps.js')}}"
  >
  </script>
@endsection
