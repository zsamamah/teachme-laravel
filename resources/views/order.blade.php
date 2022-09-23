@extends('layouts.template')

@section('content')

<div class="container mt-3 mb-4">
    <h1>Book Now @ <span class="text-warning">{{$saloon->name}}</span></h1>
    <br>
    <form method="POST" action="{{ route('store-order',$saloon->id) }}">
    @csrf
    <div>
        <div class="row gap-3">
          <div class="form-group col-md-4">
            <label for="phone" class="text-warning h4">Phone Number</label>
            <input type="tel" class="form-control" id="phone" name="u_phone" placeholder="(+1) 954-523-587">
          </div>
          <div class="form-group col-md-4">
            <label for="s_provider" class="text-warning h4">Service Provider</label>
            <select class="form-control" name="s_provider" id="s_provider">
              <option value="male">Male</option>
              <option value="female">Female</option>
            </select>
          </div>
        </div>
          <div class="form-group">
            <label for="notes" class="text-warning h4">Your Notes</label>
            <textarea class="form-control" id="notes" name="notes" rows="4"></textarea>
          </div>
    </div>
    <p class="text-warning h4">Selected Services</p>
    <div class="row">
        @foreach ($mats as $item)
    <div class="col-md-3">
      <div class="custom-control custom-checkbox">
        <input type="checkbox" class="custom-control-input" id="material_{{$item->id}}" name="material{{$item->id}}" value="{{$item->id}}">
        <label class="custom-control-label" for="{{$item->id}}">{{$item->m_name}} ( {{$item->price}} JD )</label>
        <div style="height:15em;margin-left: 1em; overflow-y:scroll ;">
            @foreach ($chapters as $chapter)
                @if ($chapter->m_id==$item->id)
                    <input type="checkbox" onchange="check(this,{{$item->id}})" name="chapter{{$chapter->id}}" id="chapter{{$chapter->id}}" value="{{$chapter->id}}">
                    <label for="chapter{{$chapter->id}}">{{$chapter->c_name}}</label>
                    <br>
                @endif
            @endforeach
        </div>
      </div>
    </div>
    @endforeach
    </div>
    <div>
        <p class="text-warning h4">Payment Method</p>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="payment" id="cash" value="cash" checked>
            <label class="form-check-label" for="cash">
              Cash In Saloon
            </label>
          </div>
          <div class="form-check">
            <input class="form-check-input" type="radio" name="payment" id="visa" value="visa">
            <label class="form-check-label" for="visa">
              VISA
            </label>
          </div>
        </div>
        <button type="submit" class="btn btn-primary mt-4">Book Now !</button>
</form>
</div>

@endsection

@section('scripts')

    <script>
        function check(ele,m_id){
            if(ele.checked)
                document.getElementById(`material_${m_id}`).checked=true;
            else
                document.getElementById(`material_${m_id}`).checked=false;
        }
    </script>

@endsection