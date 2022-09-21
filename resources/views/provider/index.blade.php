@extends('layouts.provider')

@section('content')
<div class="card">
    <div class="card-body">
        <h1>Hello {{$provider->name}} !</h1>
        <a href="{{ route('my-saloons') }}">
            <div class="card">
                <div class="card-head">
                    <h4>My Saloons</h4>
                    <p>{{$saloons->count()}}</p>
                </div>
            </div>
        </a>
        <hr>
        <br>
        <a href="#">
            <div class="card">
                <div class="card-head">
                    <h4>New Bookings</h4>
                    {{-- <p>{{$bookings->count()}}</p> --}}
                </div>
            </div>
        </a>
        <hr>
        <br>

        <a href="#">
            <div class="card">
                <div class="card-head">
                    <h4>Done Bookings</h4>
                    {{-- <p>{{$done->count()}}</p> --}}
                </div>
            </div>
        </a>
    </div>
</div>
@endsection