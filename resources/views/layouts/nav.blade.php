
<!-- Header start -->
<header id="header" class="header-one">
    <div class="bg-white">
      <div class="container">
        <div class="logo-area">
            <div class="row align-items-center">
              <div class="logo text-center text-lg-left mb-3 mb-md-5 mb-lg-0">
                  <a class="d-block" href="index.html">
                    <img loading="lazy" src="{{ asset('logo-w.png') }}" alt="Constra">
                  </a>
              </div><!-- logo end -->
    
              <div class="col-lg-9 header-right">
                  <ul class="top-info-box">
                    <li>
                      <div class="info-box">
                        <div class="info-box-content">
                            <p class="info-box-title">Call Us</p>
                            <p class="info-box-subtitle">
                              <a href="tel:+98472914353">(+9) 847-291-4353</a>
                            </p>
                        </div>
                      </div>
                    </li>
                    <li>
                      <div class="info-box">
                        <div class="info-box-content">
                            <p class="info-box-title">Email Us</p>
                            <p class="info-box-subtitle">
                              <a href="mailto:contact@tajmelna.com">contact@tajmelna.com</a>
                            </p>
                        </div>
                      </div>
                    </li>
                    <li class="last">
                      <div class="info-box last">
                        <div class="info-box-content">
                            <p class="info-box-title">Global Certificate</p>
                            <p class="info-box-subtitle">ISO 9001:2017</p>
                        </div>
                      </div>
                    </li>
                    <li class="header-get-a-quote">
                      <a class="btn btn-primary" href="contact.html">Get A Quote</a>
                    </li>
                  </ul><!-- Ul end -->
              </div><!-- header right end -->
            </div><!-- logo area end -->
    
        </div><!-- Row end -->
      </div><!-- Container end -->
    </div>
  
    <div class="site-navigation">
      <div class="container">
          <div class="row">
            <div class="col-lg-12">
                <nav class="navbar navbar-expand-lg navbar-dark p-0">
                  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target=".navbar-collapse" aria-controls="navbar-collapse" aria-expanded="false" aria-label="Toggle navigation">
                      <span class="navbar-toggler-icon"></span>
                  </button>
                  
                  <div id="navbar-collapse" class="collapse navbar-collapse">
                      <ul class="nav navbar-nav mr-auto">

                        <li class="nav-item {{ Request::is('/') ? 'active' : '' }} "><a class="nav-link" href="{{ route('index') }}">Home</a></li>
  
                        <li class="nav-item {{ Request::is('about-us') ? 'active' : '' }} "><a class="nav-link" href="{{ route('about-us') }}">About Us</a></li>
                
                        <li class="nav-item {{ Request::is('saloons') ? 'active' : '' }} "><a class="nav-link" href="{{ route('saloons') }}">Saloons</a></li>
                
                        <li class="nav-item {{ Request::is('contact') ? 'active' : '' }} "><a class="nav-link" href="{{ route('contact.index') }}">Contact</a></li>

                        @auth
                        @if (Auth::user()->role==='admin')
                        <li class="nav-item"><a class="nav-link" href="#">Dashboard</a></li>
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
                  </div>
                </nav>
            </div>
            <!--/ Col end -->
          </div>
          <!--/ Row end -->
      </div>
      <!--/ Container end -->
  
    </div>
    <!--/ Navigation end -->
  </header>
  <!--/ Header end -->