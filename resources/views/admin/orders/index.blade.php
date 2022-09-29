@extends('layouts.admin')

@section('content')
@if ($message = session('success'))
    <div class="alert alert-success">
        {{ $message }}
    </div>
@endif
    <div class="card">
        <div class="card-header">
            <h1>Orders Page</h1>
            <hr>
        </div>
        <div class="card-body table-responsive ">
            <table class="table table-bordered table-striped overflow-auto">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Saloon Name</th>
                        <th>User Name</th>
                        <th>Date</th>
                        <th>Phone</th>
                        <th>Paid</th>
                        <th>Status</th>
                        {{-- <th>Result</th> --}}
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody >
                    @foreach($orders as $item)
                    <tr class="border">
                        <td>{{ $item->id }}</td>
                        <td >{{ $item->s_name }}</td>
                        <td >{{ $item->name }}</td>
                        <td >{{ $item->date }}</td>
                        <td>{{ $item->u_phone }}</td>
                        <td>{{ $item->paid }} / {{$item->payment}}</td>
                        <td>{{ $item->status }}</td>
                        {{-- <td>{{$item->result}}</td> --}}
                        <td>
                            {{-- <a href="{{ route('done-booking',$item->id) }}" class="btn btn-danger">Done</a> --}}
                            <a href="{{ url('invoice/'.$item->id) }}" class="btn btn-success">Invoice</a>
                            {{-- <a href="{{ url('edit-booking/'.$item->id) }}" class="btn btn-primary">Edit</a> --}}
                            {{-- <a href="{{ url('delete-booking/'.$item->id) }}" class="btn btn-danger">Delete</a> --}}
                        </td>
                    </tr>
                @endforeach
                </tbody>

            </table>
        </div>
    </div>
@endsection
