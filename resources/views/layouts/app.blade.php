<!doctype html>
<html lang="zxx">
    <head>
        <!-- Required meta tags -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <!-- Favicon -->
        <link rel="icon" type="image/png" href="{{ asset('assets/backend/image/common/logo2.png')}}">
        <!-- Bootstrap Min CSS --> 
        <link rel="stylesheet" href="{{ asset('assets/frontend/assets/css/bootstrap.min.css') }}">
        <!-- Owl Theme Default Min CSS --> 
        <link rel="stylesheet" href="{{ asset('assets/frontend/assets/css/owl.theme.default.min.css')}}">
        <!-- Owl Carousel Min CSS --> 
        <link rel="stylesheet" href="{{ asset('assets/frontend/assets/css/owl.carousel.min.css')}}">
        <!-- Boxicons Min CSS --> 
        <link rel="stylesheet" href="{{ asset('assets/frontend/assets/css/boxicons.min.css')}}"> 
        <!-- Flaticon CSS --> 
        <link rel="stylesheet" href="{{ asset('assets/frontend/assets/css/flaticon.css')}}">
        <!-- Meanmenu Min CSS -->
        <link rel="stylesheet" href="{{ asset('assets/frontend/assets/css/meanmenu.min.css')}}">
        <!-- Animate Min CSS --> 
        <link rel="stylesheet" href="{{ asset('assets/frontend/assets/css/animate.min.css')}}">
        <!-- Nice Select Min CSS -->
        <link rel="stylesheet" href="{{ asset('assets/frontend/assets/css/nice-select.min.css')}}">
        <!-- Odometer Min CSS -->
        <link rel="stylesheet" href="{{ asset('assets/frontend/assets/css/odometer.min.css')}}">
        <!-- Date Picker CSS-->
        <link rel="stylesheet" href="{{ asset('assets/frontend/assets/css/date-picker.min.css')}}">
        <!-- Magnific Popup Min CSS --> 
        <link rel="stylesheet" href="{{ asset('assets/frontend/assets/css/magnific-popup.min.css')}}"> 
        <!-- Beautiful Fonts CSS --> 
        <link rel="stylesheet" href="{{ asset('assets/frontend/assets/css/beautiful-fonts.css')}}">
        <!-- Style CSS -->
        <link rel="stylesheet" href="{{ asset('assets/frontend/assets/css/style.css')}}">
        <!-- Dark CSS -->
        <link rel="stylesheet" href="{{ asset('assets/frontend/assets/css/dark.css')}}">
        <!-- Responsive CSS -->
        <link rel="stylesheet" href="{{ asset('assets/frontend/assets/css/responsive.css')}}">
      
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/frontend/style/css/custom.css')}}">
        
        <!-- TITLE -->
        <title>@yield('title')</title>
        @yield('css')
    </head>

    <body>
        <!-- Start Preloader Area -->
       {{--  <div class="preloader">
            <div class="lds-ripple">
                <div></div>
                <div></div>
            </div>
        </div> --}}
        <!-- End Preloader Area -->
    
        <!-- Start Ecorik Navbar Area -->
        @include('front.files.header')
        <!-- End Ecorik Navbar Area -->

           @section('main')
           
           @show
         @include('front.files.footer')
        <!-- Start Footer Area -->
       
        <!-- End Footer Area -->

        <!-- Start Go Top Area -->
        <div class="go-top">
            <i class='bx bx-chevrons-up bx-fade-up'></i>
            <i class='bx bx-chevrons-up bx-fade-up'></i>
        </div>
        <!-- End Go Top Area --> 

        
        <!-- Jquery Min JS -->
        <script src="{{ asset('assets/frontend/assets/js/jquery.min.js')}}"></script> 
        <!-- Bootstrap Bundle Min JS -->
        <script src="{{ asset('assets/frontend/assets/js/bootstrap.bundle.min.js')}}"></script>
        <!-- Meanmenu Min JS -->
        <script src="{{ asset('assets/frontend/assets/js/meanmenu.min.js')}}"></script>
        <!-- Owl Carousel Min JS -->
        <script src="{{ asset('assets/frontend/assets/js/owl.carousel.min.js')}}"></script>
        <!-- Wow Min JS -->
        <script src="{{ asset('assets/frontend/assets/js/wow.min.js')}}"></script>
        <!-- Nice Select Min JS -->
        <script src="{{ asset('assets/frontend/assets/js/nice-select.min.js')}}"></script>
        <!-- Magnific Popup Min JS -->
        <script src="{{ asset('assets/frontend/assets/js/magnific-popup.min.js')}}"></script>
        <!-- Mixitup JS --> 
        <script src="{{ asset('assets/frontend/assets/js/jquery.mixitup.min.js')}}"></script>
        <!-- Appear Min JS --> 
        <script src="{{ asset('assets/frontend/assets/js/appear.min.js')}}"></script>
        <!-- Odometer Min JS --> 
        <script src="{{ asset('assets/frontend/assets/js/odometer.min.js')}}"></script>
        <!-- Datepicker Min JS --> 
        <script src="{{ asset('assets/frontend/assets/js/bootstrap-datepicker.min.js')}}"></script>
        <!-- Ofi Min JS --> 
        <script src="{{ asset('assets/frontend/assets/js/ofi.min.js')}}"></script>
        <!-- jarallax Min JS --> 
        <script src="{{ asset('assets/frontend/assets/js/jarallax.min.js')}}"></script>
        <!-- Form Validator Min JS -->
        <script src="{{ asset('assets/frontend/assets/js/form-validator.min.js')}}"></script>
        <!-- Contact JS -->
        <script src="{{ asset('assets/frontend/assets/js/contact-form-script.js')}}"></script>
        <!-- Ajaxchimp Min JS -->
        <script src="{{ asset('assets/frontend/assets/js/ajaxchimp.min.js')}}"></script>
        <!-- Custom JS -->
        <script src="{{ asset('assets/frontend/assets/js/custom.js')}}"></script>
        <script src="{{ asset('assets/backend/style/js/sweet-alert.js')}}"></script>
        <script src="{{ asset('assets/backend/style/js/sweet-custom.js')}}"></script>
       <script>
         $.ajaxSetup({
             headers: {
                 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
             }
         });
      </script>

        <script>
            @if(Session::has('message'))
              var type="{{Session::get('alert-type','success')}}"
              switch(type){
                  case 'info':
                       sweet("{{ Session::get('message') }}",'info');
                      
                       break;
                  case 'success':
                      sweet("{{ Session::get('message') }}",'success');
                      break;
                  case 'warning':
                      sweet("{{ Session::get('message') }}",'warning');
                      break;
                  case 'error':
                      sweet("{{ Session::get('message') }}",'error');
                     break;
              }
            @endif
      </script>
        @yield('js')
    </body>
</html>