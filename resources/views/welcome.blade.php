 
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
     
    {{-- <link rel="icon" href="{{ asset('favicon.ico') }}"> --}}

    <title> Accueil </title>


    <!-- Styles -->
    @livewireStyles 
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    
     
    <!-- Scripts -->
   {{--  <script src="{{ asset('js/jquery-3.6.0.min.js') }}"></script> --}}
    <script src="{{ asset('js/app.js') }}"></script>
   {{--  <script src="{{ asset('js/chart.js') }}"></script> --}}


    {{-- <script src="{{ asset('lib/') }}"></script> --}}

     
</head>

<body>

  

    <!-- Page Content -->
    <!--Container Main start-->

    <div class="main-c  mt-10">
        @yield('content')

    </div>


 
    @livewireScripts 

</body>

</html>
