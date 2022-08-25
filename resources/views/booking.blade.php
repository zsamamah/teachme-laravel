<!DOCTYPE html>
<html lang="zxx">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta name="description" content="Orbitor,business,company,agency,modern,bootstrap4,tech,software">
  <meta name="author" content="themefisher.com">

  <title>LifeLabs - Booking</title>
  <link rel="icon" href="/favicon.ico" type="image/icon type">

  <!-- Favicon -->
  <link rel="shortcut icon" type="image/x-icon" href="/images/favicon.ico" />

  <!-- bootstrap.min css -->
  <link rel="stylesheet" href="{{asset('plugins/bootstrap/css/bootstrap.min.css')}}">
  <!-- Icon Font Css -->
  <link rel="stylesheet" href="{{asset('plugins/icofont/icofont.min.css')}}">
  <!-- Slick Slider  CSS -->
  <link rel="stylesheet" href="{{asset('plugins/slick-carousel/slick/slick.css')}}">
  <link rel="stylesheet" href="{{asset('plugins/slick-carousel/slick/slick-theme.css')}}">

  <!-- Main Stylesheet -->
  <link rel="stylesheet" href="{{asset('css/style.css')}}">

</head>

<body id="top">

    @include('nav')
	


{{-- <section class="page-title bg-1">
  <div class="overlay"></div>
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="block text-center">
          <span class="text-white">Book Your Test</span>
          <h1 class="text-capitalize mb-5 text-lg">Appoinment</h1>

          <!-- <ul class="list-inline breadcumb-nav">
            <li class="list-inline-item"><a href="index.html" class="text-white">Home</a></li>
            <li class="list-inline-item"><span class="text-white">/</span></li>
            <li class="list-inline-item"><a href="#" class="text-white-50">Book your Seat</a></li>
          </ul> -->
        </div>
      </div>
    </div>
  </div>
</section> --}}

<section class="appoinment section">
  <div class="container">
    <div class="row">
      <div class="col-lg-4">
          <div class="mt-3">
            <div class="feature-icon mb-3">
              <i class="icofont-support text-lg"></i>
            </div>
             <span class="h3">Call for an Emergency Service!</span>
              <h2 class="text-color mt-3">+84 789 1256 </h2>
          </div>
      </div>

      <div class="col-lg-8">
           <div class="appoinment-wrap mt-5 mt-lg-0 pl-lg-5">
            <h2 class="mb-2 title-color">Book an appoinment</h2>
            {{-- <p class="mb-4">Mollitia dicta commodi est recusandae iste, natus eum asperiores corrupti qui velit . Iste dolorum atque similique praesentium soluta.</p> --}}
               <form id="#" class="appoinment-form" method="POST" action="{{route('store')}}">
                @csrf
                <input type="hidden" name="id" value="{{$user->id}}">
                    <div class="row">
                      <div class="col-lg-6">
                        <div class="form-group">
                          <label for="name">Full Name</label>
                            <input name="name" id="name" type="text" class="form-control" placeholder="Lorem Ipsum" value="{{$user->name}}" required>
                        </div>
                    </div>
                         <div class="col-lg-6">
                            {{-- <div class="form-group">
                              <label for="test">Test Name</label>
                                <select class="form-control" name="service_id" required id="test">
                                  @foreach ($services as $item)
                                    <option value="{{$item['id']}}" {{$item['id']==$service['id']?'selected':''}} >{{$item['service']}}</option>
                                  @endforeach
                                </select>
                            </div> --}}
                        </div>

                         <div class="col-lg-6">
                            <div class="form-group">
                              <label for="date">Test Date</label>
                              <input name="date" id="date" type="date" min="{{$date}}" class="form-control" value="{{$date}}" required>
                            </div>
                          </div>

                        <div class="col-lg-6">
                            <div class="form-group">
                              <label for="phone">Phone Number</label>
                                <input name="phone" id="phone" type="Number" class="form-control" placeholder="07XXXXXXXX" required minlength="10">
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                      <label for="test">Test Name</label><br>
                          @foreach ($services as $item)
                            <input type="checkbox" id="{{$item['id']}}" name="test{{$item['id']}}" value="{{$item['id']}}" @if ($item['id']==$service['id'])
                                @checked(true)
                            @endif >
                            <label for="{{$item['id']}}">{{$item['service']}}</label><br>
                          @endforeach
                    </div>

                    <div class="col-lg-6">
                      <div class="form-group">
                        <label for="payment">Payment Method</label><br>
                        <input type="radio" id="visa" name="payment" value="visa" required>
                        <label for="visa">VISA</label>
                        <br>
                        <input type="radio" id="cash" name="payment" value="cash">
                        <label for="cash">Cash</label>
                          {{-- <input name="time" id="time" type="text" class="form-control" placeholder="Time"> --}}
                      </div>
                  </div>

                    <div class="form-group-2 mb-4">
                      <label for="location">Location</label>
                        <textarea name="location" id="location" class="form-control" rows="6" required placeholder="Tell me your location..."></textarea>
                    </div>

                    <button type="submit" class="btn btn-main btn-round-full">Make Appoinment<i class="icofont-simple-right ml-2"></i></button>
                </form>
            </div>
        </div>
      </div>
    </div>
  </div>
</section>


@include('footer')
   

    <!-- 
    Essential Scripts
    =====================================-->

    
    <!-- Main jQuery -->
    <script src="plugins/jquery/jquery.js"></script>
    <!-- Bootstrap 4.3.2 -->
    <script src="plugins/bootstrap/js/popper.js"></script>
    <script src="plugins/bootstrap/js/bootstrap.min.js"></script>
    <script src="plugins/counterup/jquery.easing.js"></script>
    <!-- Slick Slider -->
    <script src="plugins/slick-carousel/slick/slick.min.js"></script>
    <!-- Counterup -->
    <script src="plugins/counterup/jquery.waypoints.min.js"></script>
    
    <script src="plugins/shuffle/shuffle.min.js"></script>
    <script src="plugins/counterup/jquery.counterup.min.js"></script>
    <!-- Google Map -->
    <script src="plugins/google-map/map.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAkeLMlsiwzp6b3Gnaxd86lvakimwGA6UA&callback=initMap"></script>    
    
    <script src="js/script.js"></script>
    <script src="js/contact.js"></script>

  </body>
  </html>