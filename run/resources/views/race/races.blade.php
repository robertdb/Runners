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
@endsection
