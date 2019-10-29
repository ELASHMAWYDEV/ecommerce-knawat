
@extends('admin.layouts.app')
@section('title','إعدادات العملاء')
@section('style')
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="{{asset('adminlte-rtl/plugins/datatables/dataTables.bootstrap4.css')}}">
  <style>
    label.error{
        color: red;
        font-weight: 500;
        margin-bottom: 0;
    }
  </style>
@endsection
@section('content')
<div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            {{--<div class="col-sm-6">
              <h1 class="m-0 text-dark">الرئيسية</h1>
            </div><!-- /.col -->
             <div class="col-sm-6">
              <ol class="breadcrumb float-sm-left">
                <li class="breadcrumb-item"><a href="#">خانه</a></li>
                <li class="breadcrumb-item active">الرئيسية</li>
              </ol>
            </div ><!-- /.col -->
          <!-- /.row -->--}}
        </div>
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->
  
      <!-- Main content -->
      <div class="content">
        <div class="container-fluid ">
            <div class="flash-message">
                @foreach (['danger', 'warning', 'success', 'info'] as $msg)
                @if(Session::has('alert-' . $msg))

                <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} 
                  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                </p>
                @endif
                @endforeach
            </div> 
           
            @if($errors)
              @foreach($errors->all() as $err)
              <div class="alert alert-danger alert-dismissible fade show  mr-auto ml-auto mb-3" role="alert">
                  {{$err}}   
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
              </div>
              @endforeach
            @endif
            
        </div>
        
        <div class="card">
                <div class="card-header">
                  <h3 class="card-title">جدول بقائمة المستخدمين</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                        <div class="card">
                                
                                <!-- /.card-header -->
                                <div class="card-body">
                                  <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            
                                         
                                          <th>الاسم الأول</th>
                                          <th>الاسم الأخير</th>
                                          <th>العنوان</th>
                                          <th>البريد</th>
                                          <th>رقم الهاتف</th>
                                          {{-- <th> الصورة</th> --}}
                                          <th ></th>
                                          
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if(count($users) > 0)
                                        @foreach($users as $user)
                                        <tr>
                                            
                                            <td>
                                                {{$user->firstname}}
                                            </td>
                                            <td>{{$user->lastname}}</td>
                                            <td>{{$user->address}}</td>
                                            <td>{{$user->email}}</td>
                                            <td>+{{$user->phone}}</td>
                                            {{-- <td>
                                                 <button type="button" data-toggle="modal"  data-target="#viewImage" 
                                                    data-img="{{asset('img/profile/').'/'.$user->image}}" 
                                                    class="btn btn-info btn-sm text-light  view-img">
                                                    <i class="fa fa-eye" style="position:relative;top:3px"> </i>
                                            </button>
                                            </td> --}}
                                            <td>
                                              @if($user->state == true)
                                                <a href="{{route('admin.block_user',['id'=>$user->id])}}" class="btn-danger btn btn-sm">
                                                 <i class="fa fa-minus-circle  " style="position:relative;top:3px"
                                                ></i>
                                                حظر
                                                </a>
                                              @else
                                                 <a href="{{route('admin.unblock_user',['id'=>$user->id])}}" class="btn  btn-warning btn-sm text-light">
                                                  <i class="fa fa-plus-circle  " style="position:relative;top:3px"
                                                 ></i>
                                                 رفع الحظر
                                                 </a>
                                              @endif
                                            </td>
                                           
                                          </tr>
                                     
                                        @endforeach
                                        @endif
                                    
                                    </tfoot>
                                  </table>
                                </div>
                                <!-- /.card-body -->
                              </div>
                </div>
                <!-- /.card-body -->
              </div>
            
              {{-- model view Image --}}
              <div class="modal fade"  id="viewImage" tabindex="-1" role="dialog" aria-labelledby="exa" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content mt-4" style="background:none;box-shadow:none;border:0">
                      
                      <div class="modal-body">
                              <img src="" alt="" style="    max-height: 100%;
                              max-width: 100%;cursor:zoom-in">
                      </div>
                     
                    </div>
              </div>
              </div>
            
</div>
@section('js')
    

<script src="{{asset('adminlte-rtl/plugins/datatables/jquery.dataTables.js')}}"></script>
<script src="{{asset('adminlte-rtl/plugins/datatables/dataTables.bootstrap4.js')}}"></script>
<!-- SlimScroll -->
<script src="{{asset('adminlte-rtl/plugins/slimScroll/jquery.slimscroll.min.js')}}"></script>
<!-- FastClick -->
<script src="{{asset('adminlte-rtl/plugins/fastclick/fastclick.js')}}"></script>

<script>
  $(function () {
    $("#example1").DataTable({
        "language": {
            "paginate": {
                "next": "التالي",
                "previous" : "السابق"
            }
        },
        "info" : false,
    });  
    /* $('#example2').DataTable({
         "language": {
            "paginate": {
                "next": "بعدی",
                "previous" : "قبلی"
            }
        }, 
      "info" : false,
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "autoWidth": false
    }); */
  });
  
function preview_image() 
{
 var total_file=document.getElementById("certificate_img").files.length;
 for(var i=0;i<total_file;i++)
 {
  $('#image_preview').append("<img src='"+URL.createObjectURL(event.target.files[i])+"' style='max-height:75px;width:32%;border-left:2px solid #fff'>");
 }
}

  //view the image of user 
  $(document).on('click','.view-img',function(){
     $('#viewImage').find('img').attr('src',$(this).data('img'));
  })
  $(document).on('click','#viewImage img',function(){
    if($(this).css('cursor') == 'zoom-in'){
    $(this).css({
      'transform':'scale(1.9,1.9)',
      'cursor':'zoom-out'
    });
    }else{
      $(this).css({
      'transform':'scale(1,1)',
      'cursor':'zoom-in'
    });
    }
  })
 
</script>
@endsection
@endsection


