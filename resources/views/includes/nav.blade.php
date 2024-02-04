<div class="col-9  text-right">

    <span class="d-inline-block d-lg-none"><a href="#" class=" site-menu-toggle js-menu-toggle py-5 "><span class="icon-menu h3 text-black"></span></a></span>

    <nav class="site-navigation text-right ml-auto d-none d-lg-block" role="navigation">
      <ul class="site-menu main-menu js-clone-nav ml-auto ">
        <li><a href="{{url('pages/index')}}" class="nav-link {{ request()->is('pages/index') ? 'active' : '' }}">Home</a></li>
        <li ><a href="{{url('pages/listing')}}" class="nav-link {{ request()->is('pages/listing') ? 'active' : '' }}">Listing</a></li>
        <li><a href="{{url('pages/testimonials')}}" class="nav-link {{ request()->is('pages/testimonials') ? 'active' : '' }}">Testimonials</a></li>
        <li><a href="{{url('pages/blog')}}" class="nav-link {{ request()->is('pages/blog') ? 'active' : '' }}">Blog</a></li>
        <li><a href="{{url('pages/about')}}" class="nav-link {{ request()->is('pages/about') ? 'active' : '' }}">About</a></li>
        <li><a href="{{url('pages/contact')}}"class="nav-link {{ request()->is('pages/contact') ? 'active' : '' }}">Contact</a></li>
      </ul>
    </nav>
  </div>

