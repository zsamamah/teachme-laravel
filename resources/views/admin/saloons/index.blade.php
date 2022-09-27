@extends('layouts.admin')

@section('content')
@if ($message = session('success'))
<div class="alert alert-success">
    {{ $message }}
</div>
@endif
<div class="card">
    <div class="card-header">
        <h1>Saloons Page</h1>
        {{-- <a href="#" class="btn btn-primary">Add New Saloon!</a> --}}
        <hr>
    </div>
    <div class="card-body">
        <table class="table table-responsive table-bordered table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Saloon Name</th>
                    <th>Owner Name</th>
                    <th>Phone</th>
                    <th>Location</th>
                    {{-- <th>Action</th> --}}
                </tr>
            </thead>
            <tbody>
                @foreach($saloons as $item)
                <tr class="border">
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->o_name }}</td>
                    <td>{{ $item->phone }}</td>
                    <td>{{ $item->location }}</td>
                    <td>
                        {{-- <a href="{{ url('editService',$item->id) }}" class="btn btn-primary">Edit</a> --}}
                        {{-- <form method="POST" style="display: inline;" action="{{route('delete-saloon-a',$item->id)}}">
                            @csrf
                            @method('delete')
                            <button type="submit" style="display: inline;" class="btn btn-danger">Delete</button>
                        </form> --}}
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {{-- <div class="d-flex justify-content-center">
            {{$saloons->links()}}
        </div>  --}}
    </div>
</div>
@endsection
