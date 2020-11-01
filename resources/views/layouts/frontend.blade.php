<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>@yield('title')</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- STYLE -->
  @stack('before-style')
  @include('includes.style')
  @stack('after-style')
</head>

<body>

  <!-- HEADER -->
  @include('includes.header')

  @yield('hero-section')

  <main id="main">

    @yield('content-main')

  </main>

  <!-- FOOTER -->
  @include('includes.footer')

  <a href="#" class="back-to-top"><i class="ri-arrow-up-line"></i></a>
  <div id="preloader"></div>

  <!-- SCRIPT -->
  @stack('before-script')
  @include('includes.script')
  @stack('after-script')

</body>

</html>