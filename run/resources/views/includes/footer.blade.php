<footer>
  <h3>Run Argentina</h3>
  <ul>

    @guest

    @else
      <li><a href="{{ route('home') }}">Inicio</a></li>
      <li><a href="{{ route('races') }}">Carreras</a></li>
      <li><a href="{{ route('users_directory') }}">Corredores</a></li>
      <li><a href="/profile">Perfil</a></li>
      <li><a href="/help">FAQ</a></li>
    @endguest
  </ul>
  <h4>RunArgentina © 2015</h4>
</footer>
