<aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-2 bg-gradient-warning " id="sidenav-main">
    <div class="sidenav-header">
      <i class="fas fa-times p-3 cursor-pointer text-white opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
      <a class="navbar-brand m-0" href="/">
        <img src="{{ asset('./images/logo.png') }}" class="navbar-brand-img h-100" alt="main_logo">
        {{-- <span class="ms-1 font-weight-bold text-white">Novea Team</span> --}}
      </a>
    </div>
    <hr class="horizontal light mt-0 mb-2">
    <div class="collapse navbar-collapse  w-auto  max-height-vh-100" id="sidenav-collapse-main">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link {{ Request::is('p_dashboard') ? 'active' : ''; }}  text-white" href="{{ url('p_dashboard') }}">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">dashboard</i>
            </div>
            <span class="nav-link-text ms-1">Dashboard</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white {{ Request::is('my-saloons') ? 'active' : ''; }} " href="/my-saloons">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">category</i>
            </div>
            <span class="nav-link-text ms-1">My Saloons</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white {{ Request::is('new-orders') ? 'active' : ''; }}"  href="{{ route('new-orders') }}">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">table_view</i>
            </div>
            <span class="nav-link-text ms-1">New Bookings</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white {{ Request::is('done-orders') ? 'active' : ''; }}"  href="{{ url('done-orders') }}">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">check</i>
            </div>
            <span class="nav-link-text ms-1">Done Bookings</span>
          </a>
        </li>
        {{-- <li class="nav-item">
          <a class="nav-link text-white {{ Request::is('contacts-dashboard') ? 'active' : ''; }} " href="{{url('contacts-dashboard')}}">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">fact_check</i>
            </div>
            <span class="nav-link-text ms-1">Contacts</span>
          </a>
        </li> --}}

        {{-- <li class="nav-item">
          <a class="nav-link text-white {{ Request::is('users-dashboard') ? 'active' : ''; }} " href="users-dashboard">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">person</i>
            </div>
            <span class="nav-link-text ms-1">Users</span>
          </a>
        </li> --}}
      </ul>
    </div>
  </aside>
