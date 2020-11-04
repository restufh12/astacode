<!-- ======= Header ======= -->
<header id="header" class="fixed-top @yield('class-header')">
  <div class="container d-flex align-items-center">

    <a href="{{ url('/') }}" class="logo mr-auto"><img src="{{ $company_setting->company_logo }}" alt="" class="img-fluid"></a>

    <nav class="nav-menu d-none d-lg-block">
      <ul>
        <li class="active"><a href="{{ url('/') }}">Home</a></li>
        <li><a href="{{ url('/') }}#about">About</a></li>
        <li><a href="{{ url('/') }}#services">Services</a></li>
        <li><a href="{{ url('/') }}#portfolio">Portfolio</a></li>
        <li><a href="{{ url('/') }}#team">Team</a></li>
        <li><a href="{{ url('/') }}#contact">Contact</a></li>
        <li class="d-block d-sm-none"><a href="{{ url('/login') }}">Login</a></li>

      </ul>
    </nav><!-- .nav-menu -->

    @php
      if(Auth::check()){
        $LoginCaption = "Admin";
      } else {
        $LoginCaption = "Login";
      }
    @endphp
    <a href="{{ url('/login') }}" class="get-started-btn scrollto d-none d-sm-block">{{$LoginCaption}}</a>

  </div>
</header><!-- End Header -->