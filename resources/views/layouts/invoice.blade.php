@extends('layouts.template')

@section('content')

<div class="wrapper" style="padding: 1em">
    <!-- Main content -->
    <section class="invoice" style="padding: 1em">
      <!-- title row -->
      <div class="row">
        <div class="col-12">
          <h2 class="page-header">
            <i class="fas fa-globe"></i> Tajmelna Co.
            <small class="float-right">Date: {{date('Y-m-d')}}</small>
          </h2>
        </div>
        <!-- /.col -->
      </div>
      <!-- info row -->
      <div class="row invoice-info">
        <div class="col-sm-4 invoice-col">
          From
          <address>
            <strong>Tajmelna Co.</strong><br>
            {{$saloon['location']}} <br>
            Phone: {{$order['u_phone']}}<br>
            Email: contact@tajmelna.com
          </address>
        </div>
        <!-- /.col -->
        <div class="col-sm-4 invoice-col">
          To
          <address>
            <strong>{{$user['name']}}</strong><br>
            Date: {{$order['date']}}<br>
            Location: {{$saloon['location']}}<br>
            Phone: {{$order['u_phone']}}<br>
            Email: {{$user['email']}}
          </address>
        </div>
        <!-- /.col -->
        <div class="col-sm-4 invoice-col">
          {{-- <b>Invoice #{{$order['id']}}</b> --}}
          <br>
          <br>
          <b>order ID:</b> #{{$order['id']}}<br>
          <b>Payment Status:</b>
          @if ($order->paid=='yes')
              Paid
          @else
              Not Paid
          @endif
          <br>
          <b>Account:</b> #{{$user->id}}
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

      <!-- Table row -->
      <div class="row">
        <div class="col-12 table-responsive">
          <table class="table table-striped">
            <thead>
            <tr>
              <th>#</th>
              <th>Phone</th>
              <th>Service Provider</th>
              <th>Date</th>
              <th>Notes</th>
            </tr>
            </thead>
            <tbody>
              <tr>
                <td>{{$order['id']}}</td>
                <td>{{$order['u_phone']}}</td>
                <td>{{$order['s_provider']}}</td>
                <td>{{$order['date']}}</td>
                <td>{{$order['notes']}}</td>
              </tr>
            </tbody>
          </table>
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

      <br><br>


      <!-- Table row -->
      <div class="row">
        <div class="col-12 table-responsive">
          <table class="table table-striped">
            <thead>
            <tr>
              <th>#</th>
              <th>Material</th>
              <th>Chapter</th>
              <th>Total</th>
            </tr>
            </thead>
            <tbody>
              @foreach ($details as $detail)
              <tr>
                <td>{{$detail['id']}}</td>
                <td>{{$detail['m_name']}}</td>
                <td>{{$detail['c_name']}}</td>
                <td>{{$detail['price']}} JD</td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

  <hr>
      <div class="row">
        <!-- accepted payments column -->
        <div class="col-6">
          <p class="lead">Payment Methods:</p>
          @if ($order->payment=='visa')
          <img src="{{ asset('./images/credit/visa.png') }}" alt="Visa">
          <p class="text-muted well well-sm shadow-none" style="margin-top: 10px;">
            Paid with VISA
          </p>
          @else
          <img src="{{ asset('./images/credit/cash.png') }}" alt="Cash">
          <p class="text-muted well well-sm shadow-none" style="margin-top: 10px;">
            Pay with Cash 
          </p>
          @endif

          {{-- <img src="{{ asset('./images/credit/mastercard.png') }}" alt="Mastercard">
          <img src="{{ asset('./images/credit/american-express.png') }}" alt="American Express"> --}}

        </div>
        <!-- /.col -->
        <div class="col-6">
          <p class="lead">Total Amount</p>
  
          <div class="table-responsive">
            <table class="table">
              <tr>
                <th>Total:</th>
                <td>{{$total}}</td>
              </tr>
            </table>
          </div>
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>

    
@endsection
