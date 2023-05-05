@extends('layouts.template')

@section('title')
    {{$user->name}} Profile
@endsection

@section('content')
    
<!--==================================
=            User Profile            =
===================================-->

<section class="dashboard section">
  <!-- Container Start -->
  <div class="container">
    <!-- Row Start -->
    <div class="row">
      <div class="col-lg-12">
        <div class="sidebar">
          <!-- User Widget -->
          <div class="widget user-dashboard-profile">
            <!-- User Image -->
            <div class="profile-thumb">
              <img src="{{ asset('images/user/user.png') }}" alt="user_image" class="rounded-circle">
            </div>
            <!-- User Name -->
            <h5 class="text-center">Student - {{$user->name}}</h5>
            <p><i class="fa-solid fa-location-dot"></i> @if ($details->city)
              {{$details->city}}
            @else
                ---
            @endif</p>
            <p><i class="fa-solid fa-building-columns"></i> @if ($details->university)
              {{$details->university}}
            @else
                ---
            @endif {{$details->nuiversity}}</p>
            <p><i class="fa-solid fa-graduation-cap"></i> @if ($details->major)
              {{$details->major}}
            @else
                ---
            @endif</p>
            <p><i class="fa-solid fa-percent"></i> @if ($details->gpa)
              {{$details->gpa}}
            @else
                ---
            @endif</p>
            <p><i class="fa-solid fa-dollar-sign"></i> @if ($details->price)
              {{$details->price}} JD
            @else
                ---
            @endif</p>
            @if ($user->role=='teacher')
            <a href="{{ route('booking_page',$user->id) }}" class="btn btn-main-sm">Book Session</a>
            @endif
          </div>
          <!-- Dashboard Links -->
          <div class="widget user-dashboard-menu">
            <ul>
              <li class="active"><a><i class="fa fa-user"></i> Orders</a></li>
              <li><a><i class="fa fa-file-archive-o"></i>Finished Orders
                  <span>{{$approved}}</span></a></li>
              <li><a><i class="fa fa-bolt"></i> Pending Orders<span>{{$pending}}</span></a>
              </li>
            </ul>
          </div>
            <!-- Map Widget -->
            <div class="widget map">
                <div class="map">
                    <div id="map" data-latitude="31.8769389" data-longitude="35.9421834"></div>
                </div>
            </div>
        </div>
      </div>
    </div>
    <!-- Row End -->
  </div>
  <!-- Container End -->
</section>
@endsection