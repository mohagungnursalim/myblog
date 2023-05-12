<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @yield('meta')
    {{-- <link rel="shortcut icon"  href="{{ asset('img/favicon.ico') }} " type="image/x-icon" > --}}
  
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css">
    @stack('styles')
    @yield('style')
 
  <link rel="stylesheet" href="{{ asset('/css/style1.css') }}">
 
    <!-- Vendor CSS Files -->
 
    <!-- Template Main CSS File -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <title>{{ $title }}</title>
  

  </head>
  <body>
      
    
    @include('partials.navbar')
   
      <div class="container ">
      
      <div class="col-md">
          @yield('container')
        @include('sweetalert::alert')
        @stack('baseScripts')
      </div>
      </div>
      @include('partials.footer')

{{-- js  --}}
   
  
  <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
   
    <script src="https://kit.fontawesome.com/e45dd697a1.js" crossorigin="anonymous"></script>
    
    @stack('script')
    @yield('footer')
  </body>
</html>