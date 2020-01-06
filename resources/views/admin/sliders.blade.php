
@extends('admin.layouts.app')
@section('title','إعدادات السلايدر')
@section('style')
  
  <style>
  
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
            <div class="card-header bg-primary">
              <h3 class="card-title ">السلايدر</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body " style="overflow-x:scroll"> 
                    <button class="btn btn-info mb-2" data-toggle="modal" data-target="#addSlider">إضافة سلايدر</button>
                    <div class="row"><div class="col-sm-12"><table id="example1" class="table table-bordered table-striped dataTable" role="grid">
                            <thead>
                            <tr role="row">
                                <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="موتور رندر: activate to sort column descending" > الرقم</th>
                                <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="موتور رندر: activate to sort column descending" >  الصورة</th>
                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="مرورگر: activate to sort column ascending" >العنوان </th>
                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="مرورگر: activate to sort column ascending" s>خيارات </th>
                               
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($sliders as $slider)
                                <tr role="row" class="odd">
                                  <td class="sorting_1">{{$slider->id}}</td>
                                  <td class="sorting_1">
                                      <img src="{{asset('slider_img/'.$slider->image)}}" height="40px" width="60px" class="img-responsive" alt="">
                                  </td>
                                 
                                  <td>{{$slider->title}}</td>
                                  <td>
                                      <i class="fa fa-pencil text-primary ml-2 updateSlider" 
                                        data-toggle="modal" data-target="#updateSlider"
                                        data-action="{{route('admin.updateSlider',['id'=>$slider->id])}}" data-description="{{$slider->description}}"
                                        data-title={{$slider->title}}
                                      ></i>
                                       <i class="fa fa-trash text-danger deleteSlider" data-toggle="modal" data-target="#deleteSlider"
                                        data-action="{{route('admin.deleteSlider',['id'=>$slider->id])}}"></i>
                                  </td>
                                </tr>
                            @endforeach
                            

                             </tbody>
                          
                          </table></div></div>
            
            </div>
            
          </div>
              
              
             
              {{-- model add slider --}}
              <div class="modal fade"  id="addSlider" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content mt-4">
                      <div class="modal-header">
                        <h6 class="modal-title" id="exampleModalLongTitle">إضافة سلايدر</h6>
                        <button type="button" class="close ml-0" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                           <form action="{{route('admin.addSlider')}}" method="POST" enctype="multipart/form-data">
                             {{ csrf_field() }} 
                             
                                <div class="form-group">
                                    <label>العنوان</label>
                                    <input type="text" name="title" maxlength="50" class="form-control" placeholder="">
                                </div>
                                <div class="form-group">
                                    <label >الصورة</label>
                                    <input type="file" required name="image" class="form-control" placeholder="">
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-success" >إضافة</button>
                                </div>
                            
                           </form>      
                      </div>
                      <div class="modal-footer">
                        
                      </div>
                    </div>
               </div>
            
              </div>
              {{-- model update slider --}}
              <div class="modal fade"  id="updateSlider" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content mt-4">
                      <div class="modal-header">
                        <h6 class="modal-title" id="exampleModalLongTitle">تحديث سلايدر</h6>
                        <button type="button" class="close ml-0" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                           <form action="" method="POST" enctype="multipart/form-data">
                             {{ csrf_field() }} 
                             
                                <div class="form-group">
                                    <label>العنوان</label>
                                    <input type="text" name="title" maxlength="50" class="form-control" placeholder="">
                                </div>
                                <div class="form-group">
                                    <label >الصورة</label>
                                    <input type="file"  name="image" class="form-control" placeholder="">
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-success" >تعديل</button>
                                </div>
                            
                           </form>      
                      </div>
                      <div class="modal-footer">
                        
                      </div>
                    </div>
               </div>
            
              </div>
              {{-- model deleteSlider--}}
              <div class="modal fade"  id="deleteSlider" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content mt-4">
                      <div class="modal-header">
                        <h6 class="modal-title" id="exampleModalLongTitle">حدف سلايدر</h6>
                        <button type="button" class="close ml-0" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                           <form action="">
                             {{ csrf_field() }} 
                             <h5 class="text-info text-center" for="">هل تريد بالفعل حدف هدا السلايدر</h5>
                             <div class="form-group">
                                <div class="text-center">
                                    <button type="submit" class="btn btn-danger">
                                        حدف
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
      
@section('js')
    

<script src="{{asset('adminlte-rtl/plugins/datatables/jquery.dataTables.js')}}"></script>
<script src="{{asset('adminlte-rtl/plugins/datatables/dataTables.bootstrap4.js')}}"></script>


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
// edit the menu 
$(document).on('click','.deleteSlider',function(){
 let action= $(this).data('action');
 $('#deleteSlider').find('form').attr('action',action);
});
$(document).on('click','.updateSlider',function(){
  let action = $(this).data('action');
  console.log(action)
    $('#updateSlider form').attr('action',action);
  $('#updateSlider form').find('input[name="title"]').val($(this).data('title'));
  $('#updateSlider form').find('textarea[name="description"]').text($(this).data('description'));
   
})
</script>
@endsection
@endsection