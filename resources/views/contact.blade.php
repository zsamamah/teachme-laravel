@extends('layouts.template')

@section('content')
    <!-- page title -->
<!--================================
=            Page Title            =
=================================-->
<section class="page-title">
	<!-- Container Start -->
	<div class="container">
		<div class="row">
			<div class="col-md-8 offset-md-2 text-center">
				<!-- Title text -->
				<h3>Contact Us</h3>
			</div>
		</div>
	</div>
	<!-- Container End -->
</section>
<!-- page title -->

<!-- contact us start-->
<section class="section">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="contact-us-content p-4">
                    <h5>Contact Us</h5>
                    <h1 class="pt-3">Hello, what's on your mind?</h1>
                    <p class="pt-3 pb-5">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla elit dolor, blandit vel euismod ac, lentesque et dolor. Ut id tempus ipsum.</p>
                </div>
            </div>
            <div class="col-md-6">
                    <form id="contact_form" action="{{ route('contact.store') }}" method="post">
                      @csrf
                        <fieldset class="p-4">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-6 py-2">
                                        <input type="text" placeholder="Name *" name="name" class="form-control" required>
                                    </div>
                                    <div class="col-lg-6 pt-2">
                                        <input type="email" placeholder="Email *" name="email" class="form-control" required>
                                    </div>
                                </div>
                            </div>
                            <textarea name="message" id=""  placeholder="Message *" name="message" class="border w-100 p-3 mt-3 mt-lg-4" required></textarea>
                            <div class="form-group">
                              <div class="g-recaptcha" id="g-recaptcha" data-sitekey="6Le-Eq8lAAAAAEL_ZtZhdNG9hXbOMKUtfiU-V8lI"></div>
                            </div>
                            <div class="btn-grounp">
                                <button type="submit" class="btn btn-primary mt-2 float-right">SUBMIT</button>
                            </div>
                        </fieldset>
                    </form>
            </div>
        </div>
    </div>
</section>
<!-- contact us end -->
@endsection

@section('scripts')
    <!-- Google reCaptch js -->
<script src="https://www.google.com/recaptcha/api.js" async defer></script>
<script type="text/javascript">
  document.getElementById("contact_form").addEventListener("submit",function(evt)
  {
  var response = grecaptcha.getResponse();
  if(response.length == 0) 
  { 
    //reCaptcha not verified
    alert("Please verify you are human!"); 
    evt.preventDefault();
    return false;
  }
});
</script>
@endsection