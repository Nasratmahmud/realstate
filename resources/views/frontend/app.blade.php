<!DOCTYPE html>
<html lang="en">
  <head>
    <!--=============== basic  ===============-->
    <meta charset="UTF-8" />
    <meta charset="UTF-8">
    <meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="author" content="bdCalling IT Ltd.">
    <meta name="keywords" content="pure_water_innovation">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title')</title>
    <!--=============== css  ===============-->
    @include('frontend.partials.styles')
    <!--=============== favicons ===============-->
    <link rel="shortcut icon" href="{{ asset('frontend/images/favicon.ico') }}" />
  </head>
  <body>
    <!--loader-->
    <div class="loader-wrap">
      <div class="loader-inner">
        <svg>
          <defs>
            <filter id="goo">
              <fegaussianblur
                in="SourceGraphic"
                stdDeviation="2"
                result="blur"
              />
              <fecolormatrix
                in="blur"
                values="1 0 0 0 0  0 1 0 0 0  0 0 1 0 0  0 0 0 5 -2"
                result="gooey"
              />
              <fecomposite in="SourceGraphic" in2="gooey" operator="atop" />
            </filter>
          </defs>
        </svg>
      </div>
    </div>
    <!--loader end-->
    <!--  main   -->
    <div id="main">
            {{-- Header --}}
            @include('frontend.partials.headers')
            {{-- Header --}}
                        @yield('content')
            <a href="#top" id="back-to-top">
              <i class="fa fa-long-arrow-up"></i>
            </a>
            @include('frontend.partials.footer')
    </div>
<!--=============== scripts  ===============-->
           @include('frontend.partials.scripts')
</body>
</html>
