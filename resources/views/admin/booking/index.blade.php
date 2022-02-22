@extends('layouts.admin')

@section('content')
@if ($message = session('success'))
    <div class="alert alert-success">
        {{ $message }}
    </div>
@endif
    <div class="card">
        <div class="card-header">
            <h1>Bookings Page</h1>
            <hr>
        </div>
        <div class="card-body table-responsive ">
            <table class="table table-bordered table-striped overflow-auto">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Service Name</th>
                        <th>Location</th>
                        <th>Date</th>
                        <th>Phone</th>

                        <th>Username</th>
                        <th>Result</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody >
                    @foreach($bookings as $item)
                    <tr class="border">
                        <td>{{ $item->id }}</td>
                        <td >{{ $item->service }}</td>
                        <td >{{ $item->location }}</td>
                        <td >{{ $item->date }}</td>
                        <td>{{ $item->phone }}</td>
                        <td>{{ $item->name }}</td>
                        <td>{{$item->result}}</td>



                        <td>
                            <a href="{{ url('edit-booking/'.$item->id) }}" class="btn btn-primary">Edit</a>
                            <a href="{{ url('delete-booking/'.$item->id) }}" class="btn btn-danger">Delete</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>

            </table>
        </div>
    </div>
@endsection
