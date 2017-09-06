@extends('layouts.main')

@section('content')

    <div class="detail-race" data-raceid="{{ $race->id }}">
        <img src="{{$race->img}}" alt="">
        <div class="title">
          <h2>{{$race->title}}</h2>
        </div>
        <div class="date">
          <h2>{{$race->date}}</h2>
        </div>
        <div class="hour">
          <h2>{{$race->hour}}</h2>
        </div>
        <div class="address">
          <h2>{{$race->address}}</h2>
        </div>
        <div class="subscribe">
          <a href="{{$race['subscribe_link']}}"><h3>Subscribirse</h3></a>
        </div>
        <div class="map-raceId">
          <div id="map-race">

          </div>
        </div>
    </div>

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
    src="{{asset('js/gmapRace.js')}}"
  >
  </script>
@endsection
