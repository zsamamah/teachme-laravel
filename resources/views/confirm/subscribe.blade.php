@extends('layouts.template')

@section('content')
  
  <section id="main-container" class="main-container">
    <div class="container">
  
      <div class="row">
  
        <div class="col-12">
          <div class="error-page text-center">
            <div class="error-code mb-3">
                <img src="./images/confirm.png" alt="confirm">
            </div>
            <div class="error-message">
              <h3>Subscription Done!</h3>
            </div>
            <div class="error-body">
              Thanks for your subscription, your email added to our database <br>
              <a href="{{ route('index') }}" class="btn btn-primary">Back to Home Page</a>
            </div>
          </div>
        </div>
      </div><!-- Content row -->
    </div><!-- Conatiner end -->
  </section><!-- Main container end -->

  
@endsection