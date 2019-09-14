<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
     <!-- CSRF Token -->
     <meta name="csrf-token" content="{{ csrf_token() }}">
     <script>window.laravel= {csrfToken : '{{csrf_token()}}'}</script>
     <link href="https://fonts.googleapis.comcss?family=Roboto&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/bootstrap.min.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/font-awesome.min.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{asset('css/index.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{asset('css/responsive.css')}}" />
    <title>@yield('title')</title>
    @yield('css')
    <style>
     input{width: 100%}
    </style>
</head>
<body>
   <div id="app">
      @include('layouts.header')

      @yield('content')
      @include('layouts.footer')
   </div>
   



    <a href="#" class="scroll_top" title="Scroll to Top" style="display: inline;">Scroll</a>
    <!-- Script-->

    <!-- Modal quick view of product -->
    <div class="modal fade" id="view-product" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
          <div class="modal-content">
          <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
              </button>
          </div>
          <div class="modal-body">
              
          </div>
          <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              
          </div>
          </div>
      </div>
      </div>
    <script type="text/javascript" src="{{asset('assets/js/jquery-3.3.1.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/js/bootstrap.min.js')}}"></script>
    <script src="{{ asset('js/app.js') }}"></script>
    @yield('js')
     
</body>
</html>