@extends('layouts.basic2')
@section('title','Blog')
@section('class','inner-page')
  @section('content')

    <div class="site-section bg-light">
      <div class="container">
        <div class="row">
@foreach ($cars as $car )
    
          <div class="col-lg-4 col-md-6 mb-4">
            <div class="post-entry-1 h-100">
              <a href="{{route('single',$car->id)}}">
                <img src="{{asset('assets/images/cars/'.$car->image)}}" alt="Image"
                 class="img-fluid">
              </a>
              <div class="post-entry-1-contents">

                <h2><a href="{{route('single',$car->id)}}">The best car rent in the entire planet</a></h2>
                <span class="meta d-inline-block mb-3">July 17, 2019 <span class="mx-2">by</span> <a href="{{route('single',$car->id)}}">Admin</a></span>
                <p>{{ substr($car->content,0,113)}}</p>
              </div>
            </div>
          </div>
          @endforeach
          {{-- {{ $cars->links() }} --}}

        </div>

        <div class="row">
          <div class="col-5">
            <div class="custom-pagination">
              <a href="{{$cars->url(1)}}" class="{{ 1 == $cars->currentPage() ? 'bg-secondary' : '' }}">1</a>
              <a href="{{$cars->url(2)}}" class="{{ 2== $cars->currentPage() ? 'bg-secondary' : '' }}">2</a>
              <a href="{{$cars->url(3)}}" class="{{ 3 == $cars->currentPage() ? 'bg-secondary' : '' }}">3</a>
              <a href="{{$cars->url(4)}}">4</a>
              <a href="{{$cars->url(5)}}">5</a>
            </div>
          </div>
        </div>

      </div>
    </div>

    @include('includes.rentNow')

@endsection


