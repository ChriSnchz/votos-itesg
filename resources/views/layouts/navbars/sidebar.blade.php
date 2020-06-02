<div class="sidebar" data-color="azure" data-background-color="white" >
  <!--
      Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"
      data-image="{{ asset('material') }}/img/sidebar-1.jpg"
      Tip 2: you can also add an image using data-image tag
  -->
  <div class="logo">
    <img src="{{asset('material') }}/logo.png" style=" display: inline-block;
      width: 200px;
      height: 100px;
      border-radius: 50%;
      background-repeat: no-repeat;
      background-position: center center;
      background-size: cover;
      margin-left:10%;
      ">
    <!--<a  class="simple-text logo-normal">
      {{ __('ITESG') }}
    </a>-->
  </div>
  <div class="sidebar-wrapper">
    <ul class="nav">
      <li class="nav-item{{ $activePage == 'profile' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('profile.edit') }}">
          <i class="material-icons">perm_identity</i>
            <p>{{ __('Perfil') }}</p>
        </a>
      </li>
      @role('admin')
      <li class="nav-item{{ $activePage == 'dashboard' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('home') }}">
          <i class="material-icons">dashboard</i>
            <p>{{ __('Dashboard') }}</p>
        </a>
      </li>
      <li class="nav-item{{ $activePage == 'user-management' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('user.index') }}">
          <i class="material-icons">group</i>
            <p>{{ __('Usuarios') }}</p>
        </a>
      </li>
      <li class="nav-item{{ $activePage == 'candidatos' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('candidatos') }}">
          <i class="material-icons">group</i>
            <p>{{ __('Candidatos') }}</p>
        </a>
      </li>
      <li class="nav-item{{ $activePage == 'elecciones' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('elecciones') }}">
          <i class="material-icons">how_to_vote</i>
            <p>{{ __('Elecciones') }}</p>
        </a>
      </li>
      <li class="nav-item{{ $activePage == 'estadisticas' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('table') }}">
          <i class="material-icons">trending_up</i>
            <p>{{ __('Estadística') }}</p>
        </a>
      </li>
      @endrole
      @role("user")
      <li class="nav-item{{ $activePage == 'votacion' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('votacion') }}">
          <i class="material-icons">how_to_vote</i>
            <p>{{ __('Votar') }}</p>
        </a>
      </li>
      @endrole

      <li>
        <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
          <i class="material-icons">power_settings_new</i>
            <p>{{ __('Salir') }}</p>
        </a>
      </li>
    </ul>
  </div>
</div>