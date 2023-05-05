@extends('layouts.template')

@section('title')
    Teacher Profile
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
              <img src="{{ asset('images/user/user.png') }}" alt="" class="rounded-circle">
            </div>
            <!-- User Name -->
            <h5 class="text-center">Teacher - {{$user->name}}</h5>
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
            <a href="{{ route('edit_teacher') }}" class="btn btn-main-sm">Edit Profile</a>
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
              <li class="active"><a href="dashboard-my-ads.html"><i class="fa fa-user"></i> My Orders</a></li>
              <li><a href="dashboard-archived-ads.html"><i class="fa fa-file-archive-o"></i>Archived Ads
                  <span>12</span></a></li>
              <li><a href="dashboard-pending-ads.html"><i class="fa fa-bolt"></i> Pending Approval<span>23</span></a>
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
                <th class="text-center">Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($bookings as $booking)
              <tr>
                <td class="product-details">
                  <h3 class="title">Order form {{$booking->name}}</h3>
                  <span class="add-id"><strong>University:</strong> {{$booking->university}}, {{$booking->major}}</span>
                  <span><strong>Date: </strong><time>{{$booking->date}}</time> </span>
                  <span class="location"><strong>Location</strong>{{$booking->city}},Jordan</span>
                </td>
                <td class="product-category">
                  <span class="categories">{{$booking->date}}</span> From:
                  <span class="categories">{{$booking->start_time}}</span> to
                  <span class="categories">{{$booking->end_time}}</span>
                </td>
                <td class="action" data-title="Action">
                  <div class="">
                    <ul class="list-inline justify-content-center">
                      <li class="list-inline-item">
                        <a class="edit" title="Accept" onclick="event.preventDefault(); document.getElementById('approve_order_form{{$booking->order_id}}').submit();">
                          <i class="fa-solid fa-check"></i>
                        </a>
                        <form id="approve_order_form{{$booking->order_id}}" action="{{ route('approve_order', $booking->order_id) }}" method="POST" class="d-none">
                          @csrf
                          @method('PUT')
                      </form>
                      </li>
                      <li class="list-inline-item">
                        <a class="delete" title="Delete" onclick="event.preventDefault(); document.getElementById('reject_order_form{{$booking->order_id}}').submit();">
                          <i class="fa fa-trash"></i>
                        </a>
                        <form id="reject_order_form{{$booking->order_id}}" action="{{ route('reject_order', $booking->order_id) }}" method="POST" class="d-none">
                          @csrf
                          @method('PUT')
                      </form>
                      </li>
                    </ul>
                  </div>
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