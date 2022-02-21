@extends('layouts.admin')

@section('content')
@if ($message = session('success'))
    <div class="alert alert-success">
        {{ $message }}
    </div>
@endif
    <div class="card">
        <div class="card-header">
            <h1>Contacts Page</h1>
            <hr>
        </div>
        <div class="card-body table-responsive ">
            <table class="table table-bordered table-striped overflow-auto">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>email</th>
                        <th>Phone</th>
                        <th>Message</th>
                    </tr>
                </thead>
                <tbody >
                    @foreach($contacts as $item)
                    <tr class="border">
                        <td>{{ $item->id }}</td>
                        <td >{{ $item->name }}</td>
                        <td ><a href="mailto:{{ $item->email }}">{{ $item->email }}</a></td>
                        <td ><a href="tel:{{ $item->phone }}">{{ $item->phone }}</a></td>
                        <td >{{ $item->message }}</td>
                        <td>
                            <form style="display:inline-block" action="{{ url('contacts-dashboard/delete/'.$item->id) }}" method="POST">
                                @csrf
                                @method('delete')
                                <button class="btn btn-primary" type="submit">Delete</button>
                            </form>

                        </td>
                    </tr>
                @endforeach
                </tbody>

            </table>
        </div>
    </div>
@endsection