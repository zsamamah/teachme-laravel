@extends('layouts.provider')

@section('content')
@if ($message = session('success'))
<div class="alert alert-success">
    {{ $message }}
</div>
@endif
<div class="card">
    <div class="card-header">
        <h1>Saloons Page</h1>
        <a href="{{ route('create-saloon') }}" class="btn btn-info">Add New Saloon!</a>
        <hr>
    </div>
    <div class="card-body">
        <table class="table table-responsive table-bordered table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Saloon</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($saloons as $item)
                <tr class="border">
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->name }}</td>
                    <td>
                        <a href="{{ route('edit-saloon',$item->id) }}" class="btn btn-success">View</a>
                        <a href="{{ route('edit-saloon',$item->id) }}" class="btn btn-primary">Edit</a>
                        <form method="POST" style="display: inline;" action="{{route('delete-saloon',$item->id)}}">
                            @csrf
                            @method('delete')
                            <button type="submit" style="display: inline;" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {{-- <div class="d-flex justify-content-center">
            {{$saloons->name}}
        </div>  --}}
    </div>
</div>
@endsection
