@extends('layouts.indexLay')
@section('title1',' is within your finger tips. ')
@section('title','Rent a car')
@section('searchForm')
@include('includes.searchForm')
@endsection
  @section('content') 

 @include('includes.howItWorksSec')

@include('includes.promoSec')



    <div class="site-section bg-light">
      <div class="container">
@include('includes.carsSection')
      </div>
    </div>

@include('includes.features')

    <div class="site-section bg-light">
          @include('includes.last3Testiimonials')
      </div>
  

    @include('includes.rentNow')

@endsection