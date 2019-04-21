<div class="navigation">
  <!-- TITLE: Left of nav bar -->
  <div class="nav-title">
    <h1><a href="{{ url('/') }}">Aston Animal Sanctuary</a></h1>
    <img src="{{asset('storage/images/logos/logo-face.png')}}" alt="Logo face!">
  </div>
  <!-- Navigation Links: Right of nav bar -->
  <div class="nav-links">
    <ul>
      <li><a href="{{ url('/') }}">Home</a></li>
      <li><a href="{{ route('animals.index') }}">Find Animals to Adopt</a></li>

      @guest <!-- Not logged in yet -->
        @if (Route::has('login'))
          <li style="border-left: 2px solid rgb(146, 150, 21);"><a href="{{ route('login') }}">Login</a></li>
          <li><a href="{{ route('register') }}">Register</a></li>
        @endif
      @else <!-- Logged in -->
        <!-- @if (Auth::user()->admin)
          <li>
            <a href="#">Admin Page</a>
          </li>
        @else if (Auth::user())
          <li>
            <a href="#">User Page</a>
          </li>
        @endif -->
        @if(Auth::guard('web')->check())
        <li style="border-right: 2px solid rgb(146, 150, 21);"><a href="{{ route('users.index') }}">User Page</a></li>
        @endif
        @if(Auth::guard('admin')->check())
          <li style="border-right: 2px solid rgb(146, 150, 21);"><a href="{{ route('admin.dashboard') }}">Admin Page</a></li>
        @endif

        <li>
          <a class="dropdown-item" href="{{ route('logout') }}"
             onclick="event.preventDefault();
                           document.getElementById('logout-form').submit();">
              {{ __('Logout') }}
          </a>
          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
              @csrf
          </form>
        </li>
      @endguest
    </ul>
  </div>
</div>
