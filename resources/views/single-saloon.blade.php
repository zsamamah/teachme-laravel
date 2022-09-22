@extends('layouts.template')

@section('content')

<section id="main-container" class="main-container">
    <div class="container">
  
      <div class="row">
        <div class="col-lg-8">
          <div id="page-slider" class="page-slider small-bg">
            @foreach ($images as $image)
            <div class="item">
                <img loading="lazy" class="img-fluid" src="{{$image->image}}" alt="saloon-image" />
              </div>
            @endforeach
          </div><!-- Page slider end -->
        </div><!-- Slider col end -->
  
        <div class="col-lg-4 mt-5 mt-lg-0">
  
          <h3 class="column-title mrt-0">{{$saloon->name}}</h3>
          <p>
            <a href="tel:{{$saloon->phone}}">{{$saloon->phone}}</a> <br>
            {{$saloon->location}}
          </p>
  
          <h4>Services : </h4>
          <ul class="project-info list-unstyled">
            @foreach ($services as $item)
            <li>
                <p class="project-info-label">{{$item->m_name}} - $$$
                </p>
              </li>
            @endforeach
          </ul>
  
        </div><!-- Content col end -->
  
      </div><!-- Row end -->
  
    </div><!-- Conatiner end -->
  </section>

@endsection