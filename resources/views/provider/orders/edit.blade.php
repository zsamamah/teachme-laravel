@extends('layouts.provider')

@section('content')
    <div class="card">
        <div class="card-header">
            <h4>Edit Booking</h4>
        </div>
        <div class="card-body">
            <form action="{{ route('update-order',$order->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-md-6">
                    <label for="paid">Paid for this test ?</label>
                    <br>
                    <input type="radio" name="paid" id="ypaid" value='yes' @if ($order['paid']=='yes') @checked(true) @endif>
                    <label for="ypaid">Yes</label>
                    <br>
                    <input type="radio" name="paid" id="npaid" value='no' @if ($order['paid']=='no') @checked(true) @endif>
                    <label for="npaid">No</label>
                    </div>
                    <div class="col-md-6">
                        <label for="notes">Notes</label>
                        <p>@if ($order->notes)
                            {{$order->notes}}
                        @else
                            No Notes.
                        @endif</p>
                    </div>
                    <div class="col-md-6">
                        <label for="status">Status</label>
                        <br>
                        <select name="status" id="status">
                            <option value="pending" @if ($order->status=='pending') @selected(true) @endif>Pending</option>
                            <option value="rejected" @if ($order->status=='rejected') @selected(true) @endif>Reject</option>
                            <option value="done" @if ($order->status=='done') @selected(true) @endif>Accept</option>
                        </select>
                    </div>
                </div>
                <div>
                    <p>Paid : {{$order->paid}} / {{$order->payment}}</p>
                    <p>Service Provider : {{$order->s_provider}}</p>
                    <p>Date : {{$order->date}}</p>
                </div>
                <div>
                    <div class="mb-3">
                        <table class="table table-striped">
                         <thead>
                           <tr>
                             <th scope="col">#</th>
                             <th scope="col">Material Name</th>
                             <th scope="col">Chapter Name</th>
                             <th scope="col">Price</th>
                           </tr>
                         </thead>
                         <tbody>
                            <?php $counter=1 ?>
                       @foreach ($details as $detail)
                          <tr>
                            <th scope="row">{{$counter++}}</th>
                            <td>{{$detail->m_name}}</td>
                            <td>{{$detail->c_name}}</td>
                            <td>{{$detail->price}} JD</td>
                          </tr>
                        @endforeach
                        </tbody>
                        </table>
                        <h4>Total = {{$total}} JD</h4>
                    </div>
                    <div class="col-mid-12">
                        <button type="submit" class="btn btn-primary">Edit order</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
