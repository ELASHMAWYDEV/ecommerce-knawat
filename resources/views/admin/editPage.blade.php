
@extends('admin.layouts.app')
@section('title','تعديل صفحة')
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
    .cke{    width: 94% !important;
    margin: auto !important;}
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
          </div><!-- /.row -->--}}
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->
  
      <!-- Main content -->
      <div class="content">
        <div class="container-fluid "> 
            <div class="flash-message">
                @foreach (['danger', 'warning', 'success', 'info'] as $msg)
                @if(Session::has('alert-' . $msg))

                <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
                @endif
                @endforeach
            </div> 
            @if($errors)
              @foreach($errors->all() as $err)
              <div class="alert alert-success alert-dismissible fade show  mr-auto ml-auto mb-3" role="alert">
                  {{$err}}   
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
              </div>
              @endforeach
            @endif
            
        </div>
        
        <div class="card">
           
            <!-- /.card-header -->
            <div class="card-body " style="overflow-x:scroll"> 
                 <div class="row">
                     <div class="col-md-8">
                         <div class="card card-success">
                            <div class="card-header">
                                <h3 class="card-title">تعديل صفحة</h3>
                            </div>
                            <div class="card-body">
                                <form action="{{route('admin.updatePage',['id'=>$page->id])}}" method="post" id="editPageForm" enctype="multipart/form-data">
                                   {{ csrf_field() }}
                                   <label for="title">العنوان بالعربية</label>
                                   <input class="form-control " name="title"  type="text" value="{{$page->title}}" required>
                                   <br>
                                   <label for="title_e">العنوان بالانجليزية</label>
                                   <input class="form-control" name="title_e" type="text" value="{{$page->title_e}}" required>
                                   <br>
                                    </div>

                                   <label for="content" style="width:94%" class="mr-auto ml-auto  mb-2">المحتوى بالعربية</label>
                                   <textarea name="content" minlength="50" class="form-control" id="content"  >{{$page->content}}</textarea>  
                                  
                                    <label for="content_e" style="width:94%" class="mr-auto ml-auto mt-2 mb-2">المحتوى بالانجليزية</label>
                                    <textarea name="content_e" minlength="50" class="form-control" id="content_e" >{{$page->content_e}}</textarea>  
                                   
                                     <div class="form-group">
                                             <button class="btn btn-success mt-4 mr-4" type="submit">تعديل</button>
                                     </div>
                                </form>
                                
                            <!-- /.card-body -->
                         </div>
                     </div>
                     <div class="col-md-4">
                       <div class="card card-success">
                          <div class="card-header">
                              <h3 class="card-title">الرابط</h3>
                          </div>
                          <div class="card-body">
                                <div class="form-group">
                                  @if($page->menu_id)
                                  <label> {{$page->menu->name}} - {{$page->menu->name_e}}</label>
                                  @else
                                  <label> {{$page->sub_menu->name}} - {{$page->sub_menu->name_e}}</label>
                                  @endif
                                  <input type="hidden" name="menu_id" value="{{($page->menu_id) ? ($page->menu_id) : ($page->sub_menu_id) }}">
                                  {{-- <select class="form-control" name="menu_id" form="editPageForm" required>
                                    <option value="" disabled >-- أساسي --</option>
                                    @forelse ($menus as $menuitem)
                                        
                                        <option value="0-{{$menuitem->id}}" @if($menuitem->id == $page->menu_id) selected @endif>{{$menuitem->name}}</option>
                                    @empty
                                        <option value="" disabled>لايوجد أي عنصر أساسي</option>
                                    @endforelse
                                    <option value="" disabled>-- فرعي --</option>
                                    @forelse ($submenus as $submenuitem)
                                        
                                        <option value="1-{{$submenuitem->id}}"  @if($submenuitem->id == $page->sub_menu_id) selected @endif>{{$submenuitem->name}}</option>
                                    @empty
                                        <option value="" disabled>لايوجد أي عنصر فرعي</option>
                                    @endforelse
                                  </select> --}}
                                </div>
                                <div class="form-group">
{{--                                   <label for="">تريد انشاء رابط جديد ؟ : <a href="{{route('admin.menus')}}" target="_blank">من هنا</a> </label>
 --}}                                </div>
                          </div>
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

<!-- AdminLTE for demo purposes
<script src="../../dist/js/demo.js"></script>
 page script -->

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


</script>
<script src="{{asset('tinymce/tinymce.min.js')}}"></script>
<script src="{{asset('js/tinymceFM.js')}}"></script>
<script>
 tinyreplace('textarea#content');
 tinyreplace('textarea#content_e');
</script>
@endsection
@endsection