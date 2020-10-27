<!doctype html>
<html class="no-js" lang="">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>@yield('title')</title>
    <meta name="description" content="Ela Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Favicons -->
    <link href="{{ asset('assets/img/favicon/favicon-32x32.png') }}" rel="icon">
    <link href="{{ asset('assets/img/favicon/apple-touch-icon.png') }}" rel="apple-touch-icon">

    <!-- STYLE -->
    @stack('before-style')
    @include('admin.includes.style')
    @stack('after-style')

</head>

<body>
    
    <!-- SIDEBAR -->
    @include('admin.includes.sidebar')

    <div id="right-panel" class="right-panel">
        
        <!-- NAVBAR -->
        @include('admin.includes.navbar')

        <div class="content">
            
            <!-- PAGES -->
            @yield('content')

        </div>
        
        <div class="clearfix"></div>
        
        <!-- FOOTER -->
        @include('admin.includes.footer')

    </div>

    <!-- SCRIPT -->
    @stack('before-script')
    @include('admin.includes.script')
    @stack('after-script')
    
</body>
</html>
