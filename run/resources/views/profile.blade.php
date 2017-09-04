@extends('layouts.main')

@section('content')

  <div class="container-profile">
    <img class="user-profile-img" src="img/users/user-1.jpg" alt="">
    <div class="user-info-personal">
      <p class="">Nombre: Martina Sastre</p>
      <p class="">Edad: 22</p>
      <p class="">Fecha de nacimiento: 10/12/1995</p>
      <p class="">Lugar: Buenos Aires</p>
    </div>
    <div id="box-edit">
      <a href="edit.html"><img class="user-profile-edit" src="img/icons/edit.png" alt=""></a>
    </div>
    <div class="user-experience">
      <h4 class="title-experience">Experiencia</h3>
      <p> Corri en más de 50 maratones oficiales. Tengo un tiempo de 4 minutos por km en los 20km.</p>
    </div>
  </div>

@endsection
