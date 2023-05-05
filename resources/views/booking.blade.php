@extends('layouts.template')

@section('title')
    Booking
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center m-3">
        <div class="card">
            <div class="card-header">Book Session with {{$user->name}}</div>
            <div class="card-body">
<form class="row g-3" id="booking_form" action="{{ route('booking_submit', $user->id) }}" method="POST">
    @csrf
    <div class="col-md-6">
      <label for="date" class="form-label">Requested Date</label>
      <input type="date" min="<?php echo date('Y-m-d'); ?>" max="<?php echo date('Y-m-d', strtotime('+1 months')); ?>" name="date" class="form-control" id="date">
    </div>
    <div class="col-md-6">
        <label for="students_num" class="form-label">Number of students</label>
        <select class="w-100" name="students_num" class="form-control" id="students_num">
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
        </select>
        {{-- <input type="number" name="students_num" min="1" max="5" class="form-control" id="students_num"> --}}
      </div>
    <div class="col-md-6">
      <label for="start_time" class="form-label">Start Time</label>
      <input type="time" name="start_time" class="form-control" id="start_time">
    </div>
    <div class="col-md-6">
      <label for="end_time" class="form-label">Finish Time</label>
      <input type="time" name="end_time" class="form-control" id="end_time">
    </div>
    <div class="col-12 mt-3">
        <div class="g-recaptcha mb-2" id="g-recaptcha" data-sitekey="6Le-Eq8lAAAAAEL_ZtZhdNG9hXbOMKUtfiU-V8lI" @required(true)></div>
    </div>
    <div class="col-12 mt-2">
      <button type="submit" class="btn btn-primary">Book</button>
    </div>
  </form>
</div>
</div>
</div>
</div>
@endsection

@section('scripts')
    <!-- Google reCaptch js -->
<script src="https://www.google.com/recaptcha/api.js" async defer></script>
<script type="text/javascript">
  document.getElementById("booking_form").addEventListener("submit",function(evt)
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