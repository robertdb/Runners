<a href="{{ route('home') }}"><img id ="logo" src="{{ asset('img/logo.png') }}" alt=""></a>
<header>
  <input type="checkbox" id="btn-menu" name="" value="">
  <label for="btn-menu" for=""><img id="menu-icon"  src="{{ asset('img/icons/menu-icon.png') }}" alt=""></label>
  <nav class="menu">
    <ul>

      @guest
          <li><a href="{{ route('login') }}">Ingresar</a></li>
          <li><a href="{{ route('register') }}">Registrase</a></li>
      @else
        <li><a href="{{ route('home') }}">Inicio</a></li>
        <li><a href="{{ route('races') }}">Carreras</a></li>
        <li><a href="{{ route('users_directory') }}">Corredores</a></li>
        <li><a href="/profile">Perfil</a></li>
        <li><a href="/help">FAQ</a></li>
        <li >
            <a href="">
                {{ Auth::user()->name }}
            </a>


            <li>
                <a href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                             document.getElementById('logout-form').submit();">
                    Logout
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                </form>
            </li>

        </li>
      @endguest
    </ul>
  </nav>
</header>

<div class="flex-nav-container">
  <div class="flex-item">
    <a class="section-mobile" href="{{ route('home') }}"><img  class="icon-nav"src="{{ asset('img/home.png') }}" alt=""></a>
  </div>
  <div class="flex-item">
    <a class="section-mobile" href="{{ route('races') }}"><img  class="icon-nav" src="{{ asset('img/marathons-map.png') }}" alt=""></a>
  </div>
  <div class="flex-item">
    <a class="section-mobile" href="/profile"><img  class="icon-nav" src="{{ asset('img/profile.png') }}" alt=""></a>
  </div>
</div>
