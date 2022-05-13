<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;300;400;500;600;700&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;1,100;1,300;1,400;1,700&display=swap" rel="stylesheet">
    
    <script src="https://kit.fontawesome.com/b3aeabf072.js" crossorigin="anonymous"></script>  
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <link href="{{ asset('Geogrotesque/Geogrotesque Bold.ttf') }}" rel="stylesheet">
    <link href="{{ asset('Geogrotesque/Geogrotesque Medium.ttf') }}" rel="stylesheet">
    <link href="{{ asset('Geogrotesque/Geogrotesque Regular.ttf') }}" rel="stylesheet">
    <link href="{{ asset('css/plantilla.css') }}" rel="stylesheet">
     <link href="{{ asset('css/page.css') }}" rel="stylesheet">
     <link href="{{ asset('css/font.css') }}" rel="stylesheet">
    {{--<link href="{{ asset('css/page/presupuesto.css') }}" rel="stylesheet"> --}}
    <link rel="stylesheet" type="text/css" href="/slick/slick-theme.css"/>

    <title></title>
    @yield('style')

    <style>
     


      .navbar-nav .nav-item .nav-link.active{
        border-bottom: 3px solid #B32B2D;
        padding-top: 25px;
        padding-bottom: 25px;
      }
    </style>  
  </head>
 <body>
<div id="app">
        @include('page.layouts.header')
        <main>
            @yield('content')
        </main>
        @include('page.layouts.footer')
</div>


<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->

<script type="text/javascript" src="//code.jquery.com/jquery-1.11.0.min.js"></script>
<script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
<script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
<!-- Option 1: Bootstrap Bundle with Popper -->
{{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script> --}}

<!-- Option 2: Separate Popper and Bootstrap JS -->

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    <script type="text/javascript" src="{{ asset('js/app.js') }}?3"></script> 

  @yield('js')
  </body>
</html>
  <script>
    function mostrar(){
      
      
  }
  $('.zp_container a').click(function(){
      $('#area_privada').toggle('ocultar_')
      console.log('aca');
  });
  </script>