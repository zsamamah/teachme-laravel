<header>
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <nav class="navbar navbar-expand-lg navbar-light navigation">
          <a class="navbar-brand" href="{{ route('index') }}">
            <img src="images/logo2.png" alt="">
          </a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto main-nav ">
              <li class="nav-item {{ Request::is('/') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('index') }}">Home</a>
              </li>
              <li class="nav-item {{ Request::is('about-us') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('about-us') }}">About Us</a>
              </li>
              @auth
              @if (Auth::user()->role==='admin')
              <li class="nav-item"><a class="nav-link" href="{{ route('a_dashboard') }}">Dashboard</a></li>
              @endif
              @if (Auth::user()->role==='teacher')
              <li class="nav-item {{ Request::is('teacher-profile') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('teacher_profile') }}">Teacher</a>
              </li>
              @endif
              @if (Auth::user()->role==='student')
              <li class="nav-item {{ Request::is('student-profile') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('student_profile') }}">Student</a>
              </li>
              @endif
              @endauth
              <li class="nav-item {{ Request::is('contact') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('contact.index') }}">Contact Us</a>
              </li>
            </ul>
            <ul class="navbar-nav ml-auto mt-10">
              @guest
              <li class="nav-item {{ Request::is('login') ? 'active' : '' }}">
                <a class="nav-link login-button" href="/login">Login</a>
              </li>
              <li class="nav-item {{ Request::is('register') ? 'active' : '' }}">
                <a class="nav-link login-button" href="/register">Register</a>
              </li>
              @endguest
              @auth
              <li>
                <a class="btn btn-danger p-2" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">{{ __('Logout') }}</a>

                  <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                      @csrf
                  </form>
              </li>
              @endauth
            </ul>
          </div>
        </nav>
      </div>
    </div>
  </div>
</header>