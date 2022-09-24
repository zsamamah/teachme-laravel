@extends('layouts.template')

@section('content')

<!-- Table row -->
<div class="container">
              <h2>Hello, {{$user->name}}</h2>
            <div class="col-15 table-responsive">
              <table class="table table-striped">
                <thead>
                <tr>
                  <th>#</th>
                  <th>Saloon</th>
                  <th>Phone</th>
                  <th>Date</th>
                  <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                  @foreach ($orders as $order)
                  <tr>
                    <td>{{$order['id']}}</td>
                    <td>{{$order['s_name']}}</td>
                    <td>{{$order['s_phone']}}</td>
                    <td>{{$order['date']}}</td>
                    <td><a href="{{ route('invoice',$order->id) }}" class="btn btn-primary">Invoice</a></td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->
@endsection