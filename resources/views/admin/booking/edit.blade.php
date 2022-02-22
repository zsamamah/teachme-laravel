@extends('layouts.admin')

@section('content')
    <div class="card">
        <div class="card-header">
            <h4>Edit Result</h4>
        </div>
        <div class="card-body">
            <form action="{{ url('update-booking/'.$booking->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-md-6 mb-3" >
                        <label for="">Result</label>
                       <textarea name="result" class="form-control w-100" cols="20" rows="3" >{{$booking->result}}</textarea>
                        <hr>
                    </div>
                    <div class="col-mid-12">
                        <button type="submit" class="btn btn-primary">Edit Booking</button>
                    </div>


                </div>
            </form>
        </div>
    </div>
@endsection
