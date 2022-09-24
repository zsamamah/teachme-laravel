@extends('layouts.template')

@section('content')
  
  <section id="main-container" class="main-container">
    <div class="container">
  
      <div class="row">
  
        <div class="col-12">
          <div class="error-page text-center">
            <div class="error-code">
                <img src="./images/confirm.png" alt="confirm">
            </div>
            <div class="error-message mt-3">
              <h3>Order Sent Successfully!</h3>
            </div>
            <div class="error-body">
              Thanks for your order, Check your profile page to see order status <br>
              <a href="{{ route('index') }}" class="btn btn-primary">Back to Home Page</a>
            </div>
          </div>
        </div>
      </div><!-- Content row -->
    </div><!-- Conatiner end -->
  </section><!-- Main container end -->

  
@endsection