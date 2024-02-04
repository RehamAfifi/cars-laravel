<!doctype html>
<html lang="en">

 @include('includes.head')

  <body>


    <div class="site-wrap" id="home-section">

      <div class="site-mobile-menu site-navbar-target">
        <div class="site-mobile-menu-header">
          <div class="site-mobile-menu-close mt-3">
            <span class="icon-close2 js-menu-toggle"></span>
          </div>
        </div>
        <div class="site-mobile-menu-body"></div>
      </div>


@include('includes.header')
<div class="hero @yield('class')" style="background-image: url('{{asset('assets/images/hero_1_a.jpg')}}');">

  <div class="container">
    <div class="row align-items-center justify-content-center">
      <div class="col-lg-10">

        <div class="row mb-5">
          <div class="col-lg-7 intro">
 
                <h1><strong>@yield('title')</strong>@yield('title1')</h1>
            </div>
            </div>
            @yield('searchForm')
          </div>
        </div>
      </div>
    </div>
    
@yield('content')

@include('includes.footer')

    </div>
@include('includes.js')

  </body>

</html>

