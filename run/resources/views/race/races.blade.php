@extends('layouts.main')

@section('content')
    <div class="container-race">
      @foreach($races as $race)
        <a href="{{ route('race', ['id' => $race->id]) }}">
          <div class="race-box">
            <img src="{{$race->img}}" alt="">
            <div class="title">
              <h4>{{$race->title}}</h4>
            </div>
            <div class="date">
              <h5>{{$race->date}}</h5>
            </div>

          </div>
        </a>

      @endforeach
    </div>

    <section class="item-map">
      <div id="map">

      </div>
    </section>

@endsection


@section('js')
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
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
