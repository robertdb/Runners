@extends('layouts.main')

@section('content')

    <div class="detail-race">
        <img src="{{$race->img}}" alt="">
        <div class="title">
          <h4>{{$race->title}}</h4>
        </div>
        <div class="date">
          <h5>{{$race->date}}</h5>
        </div>
    </div>
@endsection
