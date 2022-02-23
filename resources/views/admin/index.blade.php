@extends('layouts.admin')

@section('content')
<div class="card">
    <div class="card-body">
        <h1>Hello Admin !</h1>
        <a href="{{ url('users-dashboard') }}">
            <div class="card">
                <div class="card-head">
                    <h4>Users Registerd</h4>
                    <p>{{$user->count()}}</p>
                </div>
            </div>
        </a>
        <hr>
        <br>
        <a href="{{ url('services-dashboard') }}">
            <div class="card">
                <div class="card-head">
                    <h4>Services</h4>
                    <p>{{$services->count()}}</p>
                </div>
            </div>
        </a>
        <hr>
        <br>
        <a href="{{ url('bookings') }}">
            <div class="card">
                <div class="card-head">
                    <h4>Bookings</h4>
                    <p>{{$bookings->count()}}</p>
                </div>
            </div>
        </a>
        <hr>
        <br>

        {{-- <a href="{{ url('reservations') }}">
            <div class="card">
                <div class="card-head">
                    <h4>Reservations</h4>
                    <p>{{$reservation->count()}}</p>
                </div>
            </div>
        </a> --}}
    </div>
</div>
@endsection