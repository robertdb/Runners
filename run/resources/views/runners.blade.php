@extends('layouts.main')

@section('content')
  <div class="container-runners">
    @foreach($users as $user)
      <div class="user-data">
        <div class="name">
          <h3>{{$user->name}}</h3>
        </div>

        <div class="email">
          <h4>Mail: {{$user->email}}</h4>
        </div>
      </div>

    @endforeach
  </div>

@endsection
