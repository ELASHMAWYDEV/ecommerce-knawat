
@extends('admin.layouts.app')
@section('title','القائمة البريدية')
@section('style')

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
          </div><!-- /.row -->--}}
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->
  
      <!-- Main content -->
      <div class="content">
       
        
        <div class="card">
            <div class="card-header bg-primary">
              <h3 class="card-title ">القائمة البريدية</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body " style="overflow-x:scroll"> 
                    <div class="card">
                                
                            <!-- /.card-header -->
                            <div class="card-body">
                              <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        
                                     
                                      <th>#</th>
                                      <th>البريد</th>
                                      <th >العملية</th>
                                      
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $i=0; @endphp
                                    @if(count($emails) > 0)
                                    @foreach($emails as $email)
                                    <tr>
                                        
                                        <td>
                                            {{++$i}}
                                        </td>
                                        <td>{{$email->email}}</td>
                                        
                                        <td>
                                          
                                            <a  href="#" class="btn-danger btn btn-sm deleteemail" data-email="{{$email->email}}">
                                             <i class="fa fa-minus-circle  " style="position:relative;top:3px"
                                            ></i>
                                            حدف 
                                            </a>
                                          
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


            
            </div>
            
          </div>
              
              
             
              
@section('js')
<script type="text/javascript" src="{{asset('js/sweetalert.min.js')}}"></script>
<script>
$(document).on('click','.deleteemail',function(){
       let email = $(this).data('email');
      var dat = $(this);
      Swal.fire({ 
      title: 'سيتم حدف هدا البريد من القائمة',
      text: "لايمكن التراجع بعد الحدف",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'نعم !',
      cancelButtonText:'إلغاء'
    }).then((result) => {
      if (result.value) {
        $.ajax({
          url:'deletenewsletter/'+email,
          method:'get',
          data:{},
          dataType:'json',
          success:function(data){
              Swal.fire({
                icon: 'success',
                title: data,
                type: 'success',
                showConfirmButton: false,
                timer: 2500
              });
              $(dat).parent().parent().remove()

             
          }
        })
        
      }
    })
})
</script>
@endsection
@endsection