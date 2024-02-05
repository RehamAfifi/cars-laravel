@extends('layouts.basic2')
@section('title','Listing')
@section('class','inner-page')
@section('content')
<div class="site-section bg-light">
  <div class="container">
@include('includes.carsSection')
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
