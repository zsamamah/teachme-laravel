@extends('layouts.template')

@section('content')
    
<section id="main-container" class="main-container pb-2">
    <div class="container">
      <div class="row">
  
        @foreach ($saloons as $item)
        <div class="col-lg-4 col-md-6 mb-5">
          <div class="ts-service-box">
              <div class="ts-service-image-wrapper">
                <img loading="lazy" class="w-100" src="{{$item->profile_image}}" alt="saloon-image">
              </div>
              <div class="d-flex">
                <div class="ts-service-info">
                    <h3 class="service-box-title"><a href="{{ route('single-saloon',$item->id) }}">{{$item->name}}</a></h3>
                    <p>Phone : {{$item->phone}} <br>
                    Location : {{$item->location}}</p>
                    <a class="learn-more d-inline-block" href="{{ route('single-saloon',$item->id) }}" aria-label="service-details"><i class="fa fa-caret-right"></i> Visit Saloon</a>
                </div>
              </div>
          </div><!-- Service1 end -->
        </div>  
        @endforeach

      </div><!-- Main row end -->
    </div><!-- Conatiner end -->
  </section>

@endsection