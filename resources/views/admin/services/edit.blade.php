@extends('layouts.admin')

@section('content')
@foreach ($single_service as $service)
<div class="card">
    <div class="card-header">
        <h4>Edit {{$service->service}}</h4>
    </div>
    <div class="card-body">
        <form action="{{route('store-service',$service->id)}}" method="POST" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="col-md-6 mb-3">
                <label for="name">Name</label>
                <input value="{{$service->service}}" id="name" type="text" name="name" class="btn ms-2 text-start border">
            </div>
            <div class="col-md-6 mb-3">
                <label for="price">Price</label>
                <input value="{{$service->price}}" id="price" type="text" name="price" class="btn ms-2 text-start border">
            </div>
            <div class="col-mid-6 mb-3">
                <label for="image">Image</label>
                <input type="text" id='image' value="{{$service['service_image']}}" class="btn ms-2 text-start border" name="service_image">
            </div>
            <div class="col-mid-12">
                <label for="description">Description</label>
                <textarea id="description" rows="3" name="description" class="form-control">{{$service['description']}}</textarea>
            </div>
            <div class="col-mid-12">
                <button type="submit" class="btn btn-primary">Edit Service</button>
            </div>
        </form>
    </div>
</div>
@endforeach
@endsection