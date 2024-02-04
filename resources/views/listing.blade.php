@extends('layouts.basic2')
@section('title','Listing')
@section('class','inner-page')
@section('content')
<div class="site-section bg-light">
  <div class="container">
    <div class="row">
      <div class="col-lg-7">
        <h2 class="section-heading"><strong>Car Listings</strong></h2>
        <p class="mb-5">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
      </div>
    </div>


    <div class="row">
      @foreach ($cars as $car)
      <div class="col-md-6 col-lg-4 mb-4">

        <div class="listing d-block  align-items-stretch">
          <div class="listing-img h-100 mr-4">
            <img src="{{asset('assets/images/cars/'.$car->image)}}" alt="{{$car->carTitle}}" class="img-fluid">
          </div>
          <div class="listing-contents h-100">
            <h3>{{$car->carTitle}}</h3>
            <div class="rent-price">
              <strong>${{$car->price}}</strong><span class="mx-1">/</span>day
            </div>
            <div class="d-block d-md-flex mb-3 border-bottom pb-3">
              <div class="listing-feature pr-4">
                <span class="caption">Luggage:</span>
                <span class="number">{{$car->luggages}}</span>
              </div>
              <div class="listing-feature pr-4">
                <span class="caption">Doors:</span>
                <span class="number">{{$car->doors}}</span>
              </div>
              <div class="listing-feature pr-4">
                <span class="caption">Passenger:</span>
                <span class="number">{{$car->passengers}}</span>
              </div>
            </div>
            <div>
              <p>{{ substr($car->content,0,96)}}</p>
              <p><a href="{{route('single',$car->id)}}" class="btn btn-primary btn-sm">Rent Now</a></p>
            </div>
          </div>

        </div>
      </div>
      @endforeach
    </div>
    <div class="row">
      <div class="col-5">
        {{-- <div class="custom-pagination">
          <a href="{{$cars->url(1)}}">1</a>
          <a href="{{$cars->url(2)}}">2</a>
          <a href="{{$cars->url(3)}}">3</a>
          <a href="{{$cars->url(4)}}">4</a>
          <a href="{{$cars->url(5)}}">5</a>
        </div> --}}
        <div class="custom-pagination">
          @for ($i = 1; $i <= min(5, $cars->lastPage()); $i++)
              <a href="{{ $cars->url($i) }}" class="{{ $i == $cars->currentPage() ? 'bg-secondary' : '' }}">{{ $i }}</a>
          @endfor
        </div>
      </div>
    </div>
  </div>
</div>

{{-- last tree testimonials section --}}
<div class="site-section">
  @include('includes.last3Testiimonials')
</div>

@include('includes.rentNow')
@endsection