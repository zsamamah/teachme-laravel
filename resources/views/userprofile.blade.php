<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="description" content="Orbitor,business,company,agency,modern,bootstrap4,tech,software">
    <meta name="author" content="themefisher.com">

    <title>LifeLabs - User Profile</title>
    <link rel="icon" href="/favicon.ico" type="image/icon type">

    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="/favicon.ico" />

    <!-- bootstrap.min css -->
    <link rel="stylesheet" href="plugins/bootstrap/css/bootstrap.min.css">
    <!-- Icon Font Css -->
    <link rel="stylesheet" href="plugins/icofont/icofont.min.css">
    <!-- Slick Slider  CSS -->
    <link rel="stylesheet" href="plugins/slick-carousel/slick/slick.css">
    <link rel="stylesheet" href="plugins/slick-carousel/slick/slick-theme.css">

    <!-- Main Stylesheet -->
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/custom.css">
</head>

<body id="top">

    @include('nav')

    <section class="profile">
        <div class="container my-5">
            <div class="row">
                <div class="col-md">
                    <img src="https://www.freeiconspng.com/thumbs/person-icon/clipart--person-icon--cliparts-15.png"
                        alt="s">
                </div>
                <div class="col-md">
                    <h3>Profile Settings</h3>
                    <div class="infoContainer">
                        <form method="POST" action="{{ route('edit-profile',$user->id) }}">
                            @csrf
                            <div class="names">
                                <input type="text" placeholder="Full Name" name="name" class="btn" value="{{$user->name}}" required>
                            </div>
                            {{-- <div class="emailAndPhone">
                                <input type="email" name="email" placeholder="Email" class="btn" value="{{$user->email}}" required>
                                <input type="tel" name="phone" placeholder="Phone Number" class="btn" value="{{$user->phone}}">
                            </div> --}}
                            <div class="passwords">
                                <input type="password" name="password" placeholder="My Password" class="btn">
                                <input type="password" name="c_password" placeholder="Confirm Password" class="btn">
                            </div>

                            <button type="submit" class="btn bg-primary text-white">Submit!</button>
                        </form>
                    </div>
                </div>
            </div>
            <?php $counter=0; ?>
            <div class="row">
                <div class="col-12">
                    <table class="table table-striped" style="@if ($bookings->isEmpty())
                        display:none
                    @endif">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Service</th>
                                <th>Date</th>
                                <th>Phone</th>
                                <th>Result</th>
                            </tr>
                        </thead>
                        @foreach($bookings as $item)
                        <tbody>
                            <tr>
                                <td>{{++$counter}}</td>
                                <td>{{$item->name}}</td>
                                <td>{{$item->service}}</td>
                                <td>{{$item->date}}</td>
                                <td>{{$item->phone}}</td>
                                <td>
                                    @if ($item->paid=='yes')
                                    <a class="inv_link" href="{{ url('result/'.$item->id) }}">Result</a>
                                    @else
                                        Can`t show result without pay
                                    @endif
                            </td>
                            </tr>
                        </tbody>
                        @endforeach
                    </table>
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
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAkeLMlsiwzp6b3Gnaxd86lvakimwGA6UA&callback=initMap">
    </script>

    <script src="js/script.js"></script>
    <script src="js/contact.js"></script>

</body>

</html>
