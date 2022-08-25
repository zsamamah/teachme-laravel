<!DOCTYPE html>
<html lang="zxx">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta name="description" content="Orbitor,business,company,agency,modern,bootstrap4,tech,software">
  <meta name="author" content="themefisher.com">

  <title>LifeLabs - Result</title>
  <link rel="icon" href="/favicon.ico" type="image/icon type">

  <!-- Favicon -->
  <link rel="shortcut icon" type="image/x-icon" href="/favicon.ico" />

  <!-- bootstrap.min css -->
  <link rel="stylesheet" href="{{ asset('plugins/bootstrap/css/bootstrap.min.css') }}">
  <!-- Icon Font Css -->
  <link rel="stylesheet" href="{{ asset('plugins/icofont/icofont.min.css') }}">
  <!-- Slick Slider  CSS -->
  <link rel="stylesheet" href="{{ asset('plugins/slick-carousel/slick/slick.css') }}">
  <link rel="stylesheet" href="{{ asset('plugins/slick-carousel/slick/slick-theme.css') }}">

  <!-- Main Stylesheet -->
  <link rel="stylesheet" href="{{ asset('css/style.css') }}">
  <link rel="stylesheet" href="{{ asset('css/custom.css') }}">

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="{{ asset('https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback') }}">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css') }}" integrity="sha512-1sCRPdkRXhBV2PBLUdRb4tMg1w2YPf37qatUFeS7zlBy7jJI8Lf4VHwWfZZfpXtYSLy85pkm9GaYVYMfw5BC1A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('./dist/report.css') }}">

</head>

<body id="top" style="background-color: #f4f6f9">

@include('nav')





<div class="wrapper" style="padding: 1em">
    <!-- Main content -->
    <section class="invoice" style="padding: 1em">
      <!-- title row -->
      <div class="row">
        <div class="col-12">
          <h2 class="page-header">
            <i class="fas fa-globe"></i> Life Labs.
            <small class="float-right">Date: {{date('Y-m-d')}}</small>
          </h2>
        </div>
        <!-- /.col -->
      </div>
      <!-- info row -->
      <div class="row invoice-info">
        <div class="col-sm-4 invoice-col">
          From
          <address>
            <strong>Life Labs.</strong><br>
            795 Folsom Ave, Suite 600<br>
            San Francisco, CA 94107<br>
            Phone: (804) 123-5432<br>
            Email: info@life-labs.com
          </address>
        </div>
        <!-- /.col -->
        <div class="col-sm-4 invoice-col">
          To
          <address>
            <strong>{{$user['name']}}</strong><br>
           {{$booking['date']}}<br>
            {{$booking['location']}}<br>
            Phone: {{$booking['phone']}}<br>
            Email: {{$user['email']}}
          </address>
        </div>
        <!-- /.col -->
        <div class="col-sm-4 invoice-col">
          {{-- <b>Invoice #{{$booking['id']}}</b> --}}
          <br>
          <br>
          <b>Order ID:</b> #{{$booking['id']}}<br>
          <b>Payment Status:</b>
          @if ($booking->paid=='yes')
              Paid
          @else
              Not Paid
          @endif
          <br>
          <b>Account:</b> {{$user->id}}
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
      <!-- Table row -->
      <div class="row">
        <div class="col-12 table-responsive">
          <table class="table table-striped">
            <thead>
            <tr>
              <th>#</th>
              <th>Test Name</th>
              <th>Phone</th>
              <th>Location</th>
              <th>Total</th>
            </tr>
            </thead>
            <tbody>
            <tr>
              <td>{{$booking['service_id']}}</td>
              <td>{{$service['service']}}</td>
              <td>{{$booking['phone']}}</td>
              <td>{{$booking['location']}}</td>
              <td>{{$service['price']-$service['discount']}} JD</td>
            </tr>
            </tbody>
          </table>
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

      <div class="row">
        <div class="col-6">
          <h1>Your Result : </h1>
          @if ($booking['paid']==='yes')
          {{$booking->result}}
          @else
              You should pay to access the result
          @endif
        </div>
      </div>
  <hr>
      <div class="row">
        <!-- accepted payments column -->
        <div class="col-6">
          <p class="lead">Payment Methods:</p>
          @if ($booking->payment=='visa')
          <img src="{{ asset('./images/credit/visa.png') }}" alt="Visa">
          <p class="text-muted well well-sm shadow-none" style="margin-top: 10px;">
            Pay with VISA
          </p>
          @else
          <img src="{{ asset('./images/credit/cash.png') }}" alt="Cash">
          <p class="text-muted well well-sm shadow-none" style="margin-top: 10px;">
            Pay with Cash 
          </p>
          @endif

          {{-- <img src="{{ asset('./images/credit/mastercard.png') }}" alt="Mastercard">
          <img src="{{ asset('./images/credit/american-express.png') }}" alt="American Express"> --}}

        </div>
        <!-- /.col -->
        <div class="col-6">
          <p class="lead">Total Amount</p>
  
          <div class="table-responsive">
            <table class="table">
              <tr>
                <th style="width:50%">Subtotal:</th>
                <td>{{$service->price-$service['discount']}} JD</td>
              </tr>
              <tr>
                <th>Tax (16%)</th>
                <td>{{$service->price*0.16}} JD</td>
              </tr>
              <tr>
                <th>Delivery:</th>
                <td>2 JD</td>
              </tr>
              <tr>
                <th>Total:</th>
                <td>{{$service->price-$service['discount'] + $service->price*0.16 + 2}}</td>
              </tr>
            </table>
          </div>
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>

{{-- @include('footer') --}}


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
    <script>
        window.addEventListener("load",window.print())
    </script>

  </body>
  </html>
