@extends('layouts.template')

@section('title')
    About Us
@endsection

@section('content')
    <!--================================
=            Page Title            =
=================================-->
<section class="page-title">
	<!-- Container Start -->
	<div class="container">
		<div class="row">
			<div class="col-md-8 offset-md-2 text-center">
				<!-- Title text -->
				<h3>About Us</h3>
			</div>
		</div>
	</div>
	<!-- Container End -->
</section>

<section class="section">
  <div class="container">
    <div class="row">
      <div class="col-lg-6">
        <div class="about-img">
          <img src="images/about/about.jpg" class="img-fluid w-100 rounded" alt="">
        </div>
      </div>
      <div class="col-lg-6 pt-5 pt-lg-0">
        <div class="about-content">
          <h3 class="font-weight-bold">Introduction</h3>
          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc est justo, aliquam nec tempor
            fermentum, commodo et libero. Quisque et rutrum arcu. Vivamus dictum tincidunt magna id
            euismod. Nam sollicitudin mi quis orci lobortis feugiat.</p>
          <h3 class="font-weight-bold">How we can help</h3>
          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc est justo, aliquam nec tempor
            fermentum, commodo et libero. Quisque et rutrum arcu. Vivamus dictum tincidunt magna id
            euismod. Nam sollicitudin mi quis orci lobortis feugiat. Lorem ipsum dolor sit amet,
            consectetur adipiscing elit. Nunc est justo, aliquam nec tempor fermentum, commodo et libero. Quisque et rutrum arcu. Vivamus dictum
            tincidunt magna id euismod. Nam sollicitudin mi quis orci lobortis feugiat.</p>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="mb-5">
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <div class="heading text-center text-capitalize font-weight-bold py-5">
          <h2>our team</h2>
        </div>
      </div>
      <div class="col-lg-3 col-sm-6">
        <div class="card my-3 my-lg-0">
          <img class="card-img-top" src="images/team/team1.jpg" class="img-fluid w-100" alt="Card image cap">
          <div class="card-body bg-gray text-center">
            <h5 class="card-title">John Doe</h5>
            <p class="card-text">Founder / CEO</p>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-sm-6">
        <div class="card my-3 my-lg-0">
          <img class="card-img-top" src="images/team/team2.jpg" class="img-fluid w-100" alt="Card image cap">
          <div class="card-body bg-gray text-center">
            <h5 class="card-title">John Doe</h5>
            <p class="card-text">Founder / CEO</p>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-sm-6">
        <div class="card my-3 my-lg-0">
          <img class="card-img-top" src="images/team/team3.jpg" class="img-fluid w-100" alt="Card image cap">
          <div class="card-body bg-gray text-center">
            <h5 class="card-title">John Doe</h5>
            <p class="card-text">Founder / CEO</p>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-sm-6">
        <div class="card my-3 my-lg-0">
          <img class="card-img-top" src="images/team/team4.jpg" class="img-fluid w-100" alt="Card image cap">
          <div class="card-body bg-gray text-center">
            <h5 class="card-title">John Doe</h5>
            <p class="card-text">Founder / CEO</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
{{--
<section class="section bg-gray">
  <div class="container">
    <div class="row">
      <div class="col-lg-3 col-sm-6 my-lg-0 my-3">
        <div class="counter-content text-center bg-light py-4 rounded">
          <i class="fa fa-smile-o d-block"></i>
          <span class="counter my-2 d-block" data-count="2314">0</span>
          <h5>Happy Customers</h5>
        </div>
      </div>
      <div class="col-lg-3 col-sm-6 my-lg-0 my-3">
        <div class="counter-content text-center bg-light py-4 rounded">
          <i class="fa fa-user-o d-block"></i>
          <span class="counter my-2 d-block" data-count="1013">0</span>
          <h5>Active Members</h5>
        </div>
      </div>
      <div class="col-lg-3 col-sm-6 my-lg-0 my-3">
        <div class="counter-content text-center bg-light py-4 rounded">
          <i class="fa fa-bookmark-o d-block"></i>
          <span class="counter my-2 d-block" data-count="2413">0</span>
          <h5>Verified Ads</h5>
        </div>
      </div>
      <div class="col-lg-3 col-sm-6 my-lg-0 my-3">
        <div class="counter-content text-center bg-light py-4 rounded">
          <i class="fa fa-smile-o d-block"></i>
          <span class="counter my-2 d-block" data-count="200">0</span>
          <h5>Happy Customers</h5>
        </div>
      </div>
    </div>
  </div>
</section>
--}}
@endsection