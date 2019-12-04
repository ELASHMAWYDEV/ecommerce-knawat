<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="ar">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <script>window.laravel= {csrfToken : '{{csrf_token()}}'}</script>
  <title>@yield('title')</title>

  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="{{asset('adminlte-rtl/plugins/font-awesome/css/font-awesome.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('adminlte-rtl/dist/css/adminlte.min.css')}}">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

  <!-- bootstrap rtl -->
  <link rel="stylesheet" href="{{asset('adminlte-rtl/dist/css/bootstrap-rtl.min.css')}}">
  <!-- template rtl version -->
  <link rel="stylesheet" href="{{asset('adminlte-rtl/dist/css/custom-style.css')}}">
  <!-- added style by me -->
  <script type="text/javascript" src="{{asset('js/sweetalert.min.js')}}"></script>
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="{{asset('adminlte-rtl/plugins/datatables/dataTables.bootstrap4.css')}}">
  @yield('style')
  <style>
    .ayat-nav-sidebar{
        padding-right: 0;
    }
    .ayat-nav-sidebar .nav-item{
        border-bottom: 1px solid #4b545c;
    }
    #example1_wrapper > div:nth-child(2) > div{
      overflow-x:scroll; 
    }
    label.error{
      color: red;margin-top: 3px;margin-bottom: 0;
    }
    i{cursor: pointer}
  </style>
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper" > 
  <!-- Navbar -->
  @include('admin.layouts.navbar')
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
 @include('admin.layouts.sidebar')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper" id="adminapp">
   
    @yield('content')
    <!-- /.content -->
       {{-- model add benificier --}}
       <div class="modal fade" id="update_admin" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content mt-4">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLongTitle"></h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                    <form class="form-horizontal" method="POST" action="{{ route('admin.update_admin') }}">
                            {{ csrf_field() }}

                            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                <label for="name" class=" control-label">الاسم</label>
                                <div class="">
                                
                                    <input id="name" type="text" class="form-control" name="name" value="{{Auth::guard('admin')->user()->name}}" required autofocus>

                                    @if ($errors->has('name'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                

                            </div>

                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                <label for="email" class=" control-label">البريد الإلكتروني</label>

                                <div class="">
                                    <input id="email" type="email" class="form-control" name="email" value="{{Auth::guard('admin')->user()->email}}" required>

                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                                </div>

                            </div>

                            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                <label for="password" class=" control-label">كلمة السر</label>

                                <div class="">
                                    <input id="password" type="password" class="form-control" name="password" >

                                    @if ($errors->has('password'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                    @endif
                                </div>

                            </div>

                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary">
                                        تحديث
                                    </button>
                                </div>
                            </div>
                        </form>       
                                            
                                    
                        
            </div>
            <div class="modal-footer">
              
            </div>
      </div>
      </div>
</div>
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
 {{--  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
    <div class="p-3">
      <h5>Title</h5>
      <p>Sidebar content</p>
    </div>
  </aside> --}}
  <!-- /.control-sidebar -->

  <!-- Main Footer -->
  @include('admin.layouts.footer')
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="{{asset('adminlte-rtl/plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{asset('adminlte-rtl/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('adminlte-rtl/dist/js/adminlte.min.js')}}"></script>


<script src="{{asset('adminlte-rtl/plugins/slimScroll/jquery.slimscroll.min.js')}}"></script>
<!-- FastClick -->
<script src="{{asset('adminlte-rtl/plugins/fastclick/fastclick.js')}}"></script>
<script src="{{asset('js/app.js')}}"></script>
@yield('js')
</body>
</html>
