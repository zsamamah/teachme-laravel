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
                        <th>Teacher Name</th>
                        <th>City</th>
                        <th>Date</th>
                        <th>Time</th>
                        <th>Students #</th>
                        <th>Status</th>
                        {{-- <th>Result</th> --}}
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody >
                    @foreach($orders as $item)
                    <tr class="border">
                        <td>{{ $item->id }}</td>
                        <td >{{ $item->name }}</td>
                        <td >{{ $item->city }}</td>
                        <td >{{ $item->date }}</td>
                        <td>{{ $item->start_time }} - {{$item->end_time}}</td>
                        <td>{{ $item->students_num }}</td>
                        <td>{{ $item->status }}</td>
                        <td>
                            {{-- <a href="{{ route('done-booking',$item->id) }}" class="btn btn-danger">Done</a> --}}
                            {{-- <a href="{{ url('invoice/'.$item->id) }}" class="btn btn-success">Invoice</a> --}}
                            <a href="{{ route('show-details',$item->id) }}" class="btn btn-success">Details</a>
                            <form style="display:inline-block" action="{{ route('delete_order_admin',$item->id) }}" method="POST">
                                @csrf
                                @method('delete')
                                <button class="btn btn-danger" type="submit">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>

            </table>
        </div>
    </div>
@endsection
