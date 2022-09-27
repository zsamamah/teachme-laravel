@extends('layouts.admin')

@section('content')
<div class="card">
    <div class="card-body">
        <h1>Hello Admin !</h1>
        <a href="{{ url('users') }}">
            <div class="card">
                <div class="card-head">
                    <h4>Users Registerd</h4>
                    <p>{{$users->count()}}</p>
                </div>
            </div>
        </a>
        <hr>
        <br>
        <a href="{{ url('all_saloons') }}">
            <div class="card">
                <div class="card-head">
                    <h4>All Saloons</h4>
                    <p>{{$saloons->count()}}</p>
                </div>
            </div>
        </a>
        <hr>
        <br>
        <a href="{{ url('orders') }}">
            <div class="card">
                <div class="card-head">
                    <h4>All Orders</h4>
                    <p>{{$orders->count()}}</p>
                </div>
            </div>
        </a>
        <hr>
        <br>

        <a href="{{ url('contacts') }}">
            <div class="card">
                <div class="card-head">
                    <h4>Contacts</h4>
                    <p>{{$contacts->count()}}</p>
                </div>
            </div>
        </a>
    </div>
</div>
@endsection