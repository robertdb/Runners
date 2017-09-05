@extends('layouts.main')

@section('content')

    <div class="detail-race">
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
        <div >
          <a href="{{$race->address}}"><h3>Subscribirse</h3></a>
        </div>
    </div>
@endsection
