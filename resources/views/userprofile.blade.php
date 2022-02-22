<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="description" content="Orbitor,business,company,agency,modern,bootstrap4,tech,software">
    <meta name="author" content="themefisher.com">

    <title>Novena- Health & Care Medical template</title>

    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="/images/favicon.ico" />

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
                        <form>
                            <div class="names">
                                <input type="text" placeholder="Full Name" class="btn">
                            </div>
                            <div class="emailAndPhone">
                                <input type="email" placeholder="Email" class="btn">
                                <input type="tel" placeholder="Phone Number" class="btn">
                            </div>
                            <div class="passwords">
                                <input type="password" placeholder="My Password" class="btn">
                                <input type="password" placeholder="Confirm Password" class="btn">
                            </div>

                            <button type="submit" class="btn bg-primary text-white">Submit!</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <table>
                        <tr>
                            <th>Name</th>
                            <th>Service</th>
                            <th>Date</th>
                            <th>Phone</th>
                            <th>Location</th>
                            <th>result</th>
                        </tr>
                        @foreach($bookings as $item)
                        <tr>
                            <td>{{$item->name}}</td>
                            <td>{{$item->service}}</td>
                            <td>{{$item->date}}</td>
                            <td>{{$item->phone}}</td>
                            <td>{{$item->location}}</td>
                            <td>{{$item->result}}</td>
                        </tr>
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
