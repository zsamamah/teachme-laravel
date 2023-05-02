{{--                      <ul class="nav navbar-nav mr-auto">

                        <li class="nav-item {{ Request::is('/') ? 'active' : '' }} "><a class="nav-link" href="{{ route('index') }}">Home</a></li>
  
                        <li class="nav-item {{ Request::is('about-us') ? 'active' : '' }} "><a class="nav-link" href="{{ route('about-us') }}">About Us</a></li>
                
                        <li class="nav-item {{ Request::is('saloons') ? 'active' : '' }} "><a class="nav-link" href="{{ route('saloons') }}">Saloons</a></li>
                
                        <li class="nav-item {{ Request::is('contact') ? 'active' : '' }} "><a class="nav-link" href="{{ route('contact.index') }}">Contact</a></li>

                        @auth
                        @if (Auth::user()->role==='admin')
                        <li class="nav-item"><a class="nav-link" href="{{ route('a_dashboard') }}">Dashboard</a></li>
                        @endif
                        @if (Auth::user()->role==='provider')
                        <li class="nav-item"><a class="nav-link" href="{{ route('p_dashboard') }}">Dashboard</a></li>
                        @endif
                        @if (Auth::user()->role==='user')
                        <li class="nav-item"><a class="nav-link" href="{{ route('profile') }}">My Profile</a></li>
                        @endif
                        <li class="nav-item">
                          <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">{{ __('Logout') }}</a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </li>
                        @endauth

                        @guest
                        <li class="nav-item {{ Request::is('login') ? 'active' : '' }} "><a class="nav-link" href="/login">Login</a></li>
                        <li class="nav-item {{ Request::is('register') ? 'active' : '' }} "><a class="nav-link" href="/register">Register</a></li>
                        @endguest
                      </ul>
--}}
<header>
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <nav class="navbar navbar-expand-lg navbar-light navigation">
          <a class="navbar-brand" href="index.html">
            <img src="images/logo.png" alt="">
          </a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto main-nav ">
              <li class="nav-item active">
                <a class="nav-link" href="index.html">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="dashboard.html">Teacher</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="dashboard2.html">Student</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="about-us.html">About Us</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="contact-us.html">Contact Us</a>
              </li>
            </ul>
            <ul class="navbar-nav ml-auto mt-10">
              <li class="nav-item">
                <a class="nav-link login-button" href="login.html">Login</a>
              </li>
              <li class="nav-item">
                <a class="nav-link login-button" href="register.html">Register</a>
              </li>
            </ul>
          </div>
        </nav>
      </div>
    </div>
  </div>
</header>