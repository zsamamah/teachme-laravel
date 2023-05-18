@extends('layouts.template')

@section('title')
	Home
@endsection

@section('content')
	<!--===============================
=            Hero Area            =
================================-->

<section class="hero-area bg-1 text-center overly">
	<!-- Container Start -->
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<!-- Header Contetnt -->
				<div class="content-block">
					<h1>Teach Me </h1>
					<p>Join the millions who teach and learn from each other <br> everyday in local communities around the country</p>
					<div class="short-popular-category-list text-center">
						<h2>Popular Category</h2>
						<ul class="list-inline">
							<li class="list-inline-item">
								<a href="{{ route('search', ['major'=>'Math','city'=>'Amman','category'=>'Category']) }}">
								<i class="fa-solid fa-school"></i> Math
								</a>
							</li>
							<li class="list-inline-item">
								<a href="{{ route('search', ['major'=>'English','city'=>'Amman','category'=>'Category']) }}">
								<i class="fa-solid fa-graduation-cap"></i> English
								</a>
							</li>
							<li class="list-inline-item">
								<a href="{{ route('search', ['major'=>'Computer','city'=>'Amman','category'=>'Category']) }}">
								<i class="fa-solid fa-book"></i> Computer
								</a>
							</li>
							<li class="list-inline-item">
								<a href="{{ route('search', ['major'=>'Physics','city'=>'Amman','category'=>'Category']) }}">
								<i class="fa-solid fa-comment"></i> Physics
								</a>
							</li>
						</ul>
					</div>

				</div>
				<!-- Advance Search -->
				<div class="advance-search">
					<div class="container">
						<div class="row justify-content-center">
							<div class="col-lg-12 col-md-12 align-content-center">
								<form action="{{ route('search') }}" method="GET">
									@csrf
									<div class="form-row">
										<div class="form-group col-xl-4 col-lg-3 col-md-6">
											<select class="w-100 form-control mt-lg-1 mt-md-2" name="major" required>
												<option value="Math">Math</option>
												<option value="English">English</option>
												<option value="Arabic">Arabic</option>
												<option value="Physics">Physics</option>
												<option value="Biology">Biology</option>
												<option value="Chemistry">Chemistry</option>
												<option value="Computer">Computer</option>
												<option value="History">History</option>
												<option value="Geology">Geology</option>
											</select>
										</div>
										<div class="form-group col-lg-3 col-md-6">
											<select class="w-100 form-control mt-lg-1 mt-md-2" name="category" required>
												<option>Category</option>
												<option value="1">Top rated</option>
												<option value="2">Lowest Price</option>
												<option value="4">Highest Price</option>
											</select>
										</div>
										<div class="form-group col-lg-3 col-md-6">
											<select class="w-100 form-control mt-lg-1 mt-md-2" name="city" required>
												<option value="Irbid">Irbid</option>
												<option value="Ajloun">Ajloun</option>
												<option value="Jerash">Jerash</option>
												<option value="Mafraq">Mafraq</option>
												<option value="Zarqa">Zarqa</option>
												<option value="Amman">Amman</option>
												<option value="Salt">Salt</option>
												<option value="Madaba">Madaba</option>
												<option value="Karak">Karak</option>
												<option value="Tafila">Tafila</option>
												<option value="Maan">Maan</option>
												<option value="Aqaba">Aqaba</option>
											</select>
										</div>
										<div class="form-group col-xl-2 col-lg-3 col-md-6 align-self-center">
											<button type="submit" class="btn btn-primary active w-100">Search Now</button>
										</div>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- Container End -->
</section>


<!--===========================================
=            Cards section            =
============================================-->

<section class="section service-2">
	<div class="container">
		<div class="row">
			<a href="/search?major=Math&city=Amman&category=Category" class="col-lg-4 col-md-6 col-sm-6">
				<div class="service-block mb-5">
					<img src="{{ asset('images/majors/math.jpg') }}" alt="" class="img-fluid">
					<div class="content">
						<h4 class="mt-4 mb-2 title-color">Mathmetics</h4>
						<p class="mb-4">Saepe nulla praesentium eaque omnis perferendis a doloremque.</p>
					</div>
				</div>
			</a>

			<a href="/search?major=English&city=Amman&category=Category" class="col-lg-4 col-md-6 col-sm-6">
				<div class="service-block mb-5">
					<img src="{{ asset('images/majors/english.jpg') }}" alt="" class="img-fluid">
					<div class="content">
						<h4 class="mt-4 mb-2 title-color">English Language</h4>
						<p class="mb-4">Saepe nulla praesentium eaque omnis perferendis a doloremque.</p>
					</div>
				</div>
			</a>
			
			<a href="/search?major=Arabic&city=Amman&category=Category" class="col-lg-4 col-md-6 col-sm-6">
				<div class="service-block mb-5">
					<img src="{{ asset('images/majors/arabic.jpg') }}" alt="" class="img-fluid">
					<div class="content">
						<h4 class="mt-4 mb-2 title-color">Arabic Language</h4>
						<p class="mb-4">Saepe nulla praesentium eaque omnis perferendis a doloremque.</p>
					</div>
				</div>
			</a>


			<a href="/search?major=Physics&city=Amman&category=Category" class="col-lg-4 col-md-6 col-sm-6">
				<div class="service-block mb-5 mb-lg-0">
					<img src="{{ asset('images/majors/physics.jpg') }}" alt="" class="img-fluid">
					<div class="content">
						<h4 class="mt-4 mb-2 title-color">Physics</h4>
						<p class="mb-4">Saepe nulla praesentium eaque omnis perferendis a doloremque.</p>
					</div>
				</div>
			</a>

			<a href="/search?major=Chemistry&city=Amman&category=Category" class="col-lg-4 col-md-6 col-sm-6">
				<div class="service-block mb-5 mb-lg-0">
					<img src="{{ asset('images/majors/chemistry.png') }}" alt="" class="img-fluid">
					<div class="content">
						<h4 class="mt-4 mb-2 title-color">Chemistry</h4>
						<p class="mb-4">Saepe nulla praesentium eaque omnis perferendis a doloremque.</p>
					</div>
				</div>
			</a>
			
			<a href="/search?major=Computer&city=Amman&category=Category" class="col-lg-4 col-md-6 col-sm-6">
				<div class="service-block mb-5 mb-lg-0">
					<img src="{{ asset('images/majors/computer.jpg') }}" alt="" class="img-fluid">
					<div class="content">
						<h4 class="mt-4 mb-2 title-color">Computer</h4>
						<p class="mb-4">Saepe nulla praesentium eaque omnis perferendis a doloremque.</p>
					</div>
				</div>
			</a>
		</div>
	</div>
</section>
@endsection