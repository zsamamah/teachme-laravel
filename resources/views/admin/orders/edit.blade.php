@extends('layouts.admin')

@section('content')
    <div class="card">
        <div class="card-header">
            <h4>Order: {{$order->id}}</h4>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-4">
                    <label>Teacher Name</label>
                    <input class="form-control" type="text" value="{{$order->name}}" disabled readonly>
                </div>
                <div class="col-md-4">
                    <label>Student Name</label>
                    <input class="form-control" type="text" value="{{$booking->name}}" disabled readonly>
                </div>
                <div class="col-md-4">
                    <label>Status</label>
                    <input class="form-control" type="text" value="{{$order->status}}" disabled readonly>
                </div>
                <div class="col-md-4">
                    <label>Students #</label>
                    <input class="form-control" type="text" value="{{$order->students_num}}" disabled readonly>
                </div>
                <div class="col-md-4">
                    <label>Date</label>
                    <input class="form-control" type="text" value="{{$order->date}}" disabled readonly>
                </div>
                <div class="col-md-4">
                    <label>Time</label>
                    <input class="form-control" type="text" value="{{$order->start_time}} - {{$order->end_time}}" disabled readonly>
                </div>
                <div class="col-md-4">
                    <label>Teacher City</label>
                    <input class="form-control" type="text" value="{{$order->city}}" disabled readonly>
                </div>
                <div class="col-md-4">
                    <label>Teacher Phone</label>
                    <input class="form-control" type="text" value="{{$order->phone}}" disabled readonly>
                </div>
                <div class="col-md-4">
                    <label>Student City</label>
                    <input class="form-control" type="text" value="{{$order->city}}" disabled readonly>
                </div>
                <div class="col-md-4">
                    <label>Student Phone</label>
                    <input class="form-control" type="text" value="{{$booking->phone}}" disabled readonly>
                </div>
                <div class="col-md-4">
                    <label>Student University</label>
                    <input class="form-control" type="text" value="{{$booking->university}} / {{$booking->major}}" disabled readonly>
                </div>
            </div>
        </div>
    </div>
@endsection
