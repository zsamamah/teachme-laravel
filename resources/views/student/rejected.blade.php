@extends('layouts.template')

@section('title')
    Rejected Bookings
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
      <div class="col-lg-4">
        <div class="sidebar">
          <!-- User Widget -->
          <div class="widget user-dashboard-profile">
            <!-- User Image -->
            <div class="profile-thumb">
              <img @if ($details->photo)
              src="{{asset('storage/'.$details->photo)}}"
              @else
                src="{{ asset('images/user/user.png') }}"
              @endif alt="" class="rounded-circle">
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
            <a href="{{ route('edit_student') }}" class="btn btn-main-sm">Edit Profile</a>
          </div>
          <!-- Map Widget -->
          <div class="widget map">
						<div class="map">
							<div id="map" data-latitude="31.8769389" data-longitude="35.9421834"></div>
						</div>
					</div>
          <!-- Dashboard Links -->
          <div class="widget user-dashboard-menu">
            <ul>
              <li><a href="{{ route('student_profile') }}"><i class="fa fa-user"></i> My Bookings</a></li>
              <li><a href="{{ route('student_approved') }}"><i class="fa fa-file-archive-o"></i>Approved
                  <span>{{$approved->count()}}</span></a></li>
              <li class="active"><a href="{{ route('student_rejected') }}"><i class="fa fa-bolt"></i> Rejected<span>{{$rejected->count()}}</span></a>
              </li>
              <li><a href="{{ route('index') }}"><i class="fa fa-power-off"></i> Logout</a></li>
            </ul>
          </div>
        </div>
      </div>

<!--==================================
=            Table of Orders         =
===================================-->

      <div class="col-lg-8">
        <!-- Recently Favorited -->
        <div class="widget dashboard-container my-adslist">
          <h3 class="widget-header">My Ads</h3>
          <table class="table table-responsive product-dashboard-table">
            <thead>
              <tr>
                <th>Order Title</th>
                <th class="text-center">Category</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($rejected as $booking)
              <tr>
                <td class="product-details">
                  <h3 class="title">Teacher {{$booking->name}}</h3>
                  <span class="add-id"><strong>University:</strong> {{$booking->university}}, {{$booking->major}}</span>
                  <span><strong>Date: </strong><time>{{$booking->date}}</time> </span>
                  <span class="location"><strong>Location</strong>{{$booking->city}},Jordan</span>
                  <span @if ($booking->status=='Approved')
                    class="status active"
                  @else
                      @if ($booking->status=='Pending')
                      class="status text-primary"
                      @else
                      class="status text-danger"
                      @endif
                  @endif><strong>Status</strong>{{$booking->status}}</span>
                </td>
                <td class="product-category">
                  <span class="categories">{{$booking->date}}</span> From:
                  <span class="categories">{{$booking->start_time}}</span> to
                  <span class="categories">{{$booking->end_time}}</span>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>

        </div>

      </div>
    </div>
    <!-- Row End -->
  </div>
  <!-- Container End -->
</section>
@endsection