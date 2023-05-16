@extends('layouts.template')

@section('title')
    Approved Bookings
@endsection

@section('style')
<style>
@import url(//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css);

fieldset, label { margin: 0; padding: 0; }
body{ margin: 20px; }
h1 { font-size: 1.5em; margin: 10px; }

/****** Style Star Rating Widget *****/

.rating { 
  border: none;
  float: left;
}

.rating > input { display: none; } 
.rating > label:before { 
  margin: 5px;
  font-size: 1.25em;
  font-family: FontAwesome;
  display: inline-block;
  content: "\f005";
}

.rating > .half:before { 
  content: "\f089";
  position: absolute;
}

.rating > label { 
  color: #ddd; 
 float: right; 
}

/***** CSS Magic to Highlight Stars on Hover *****/

.rating > input:checked ~ label, /* show gold star when clicked */
.rating:not(:checked) > label:hover, /* hover current star */
.rating:not(:checked) > label:hover ~ label { color: #FFD700;  } /* hover previous stars in list */

.rating > input:checked + label:hover, /* hover current star when changing rating */
.rating > input:checked ~ label:hover,
.rating > label:hover ~ input:checked ~ label, /* lighten current selection */
.rating > input:checked ~ label:hover ~ label { color: #FFED85;  }     
</style>    
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
            @endif</p>
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
              <li><a href="{{ route('student_rejected') }}"><i class="fa fa-bolt"></i> Rejected<span>{{$rejected->count()}}</span></a>
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
        <div class="widget dashboard-container my-adslist">
          <h3 class="widget-header">My Ads</h3>
          <table class="table table-responsive product-dashboard-table">
            <tbody>
              <tr>
                <td class="product-details">
                  <h3 class="title">Teacher {{$order->name}}</h3>
                  <span class="add-id"><strong>University:</strong> {{$order->university}}, {{$order->major}}</span>
                  <span><strong>Date: </strong><time>{{$order->date}}</time> </span>
                  <span class="location"><strong>Location</strong>{{$order->city}},Jordan</span>
                  <span @if ($order->status=='Approved')
                    class="status active"
                  @else
                      @if ($order->status=='Pending')
                      class="status text-primary"
                      @else
                      class="status text-danger"
                      @endif
                  @endif><strong>Status</strong>{{$order->status}}</span>
                </td>
                <td class="product-category">
                  <span class="categories">{{$order->date}}</span> From:
                  <span class="categories">{{$order->start_time}}</span> to
                  <span class="categories">{{$order->end_time}}</span>
                </td>
                <td class="action" data-title="Action">
                  <a href="tel:{{$order->phone}}" class="text-primary">
                    <i class="fa-solid fa-square-phone fa-2x text-success"></i>
                  </a>
                  <a href="https://{{$order->facebook}}" class="text-primary">
                    <i class="fa-brands fa-square-facebook fa-2x text-primary"></i>
                  </a>
                  <a href="https://{{$order->instagram}}" class="text-primary">
                    <i class="fa-brands fa-square-instagram fa-2x text-warning"></i>
                  </a>
                  <a href="https://{{$order->linkedin}}" class="text-primary">
                    <i class="fa-brands fa-linkedin fa-2x text-primary"></i>
                  </a>
                </td>
              </tr>
            </tbody>
          </table>
          @if (!$rate)
          <form action="{{ route('rate',$order->id) }}" method="POST">
            @csrf
            <fieldset class="rating">
                <input type="radio" id="star5" name="range" value="5" /><label class = "full" for="star5" title="5 stars"></label>
                <input type="radio" id="star4" name="range" value="4" /><label class = "full" for="star4" title="4 stars"></label>
                <input type="radio" id="star3" name="range" value="3" /><label class = "full" for="star3" title="3 stars"></label>
                <input type="radio" id="star2" name="range" value="2" /><label class = "full" for="star2" title="2 stars"></label>
                <input type="radio" id="star1" name="range" value="1" /><label class = "full" for="star1" title="1 star"></label>
            </fieldset>
            <br><br>
            <button class="btn-sm btn-primary" type="submit">Rate!</button>
          </form>
          @else
          <button class="btn-sm btn-secondary" disabled>Rated!</button>
          @endif

        </div>

      </div>
    </div>
    <!-- Row End -->
  </div>
  <!-- Container End -->
</section>
@endsection