
@extends('admin.layouts.app')
@section('title','الرئيسية')
@section('style')
  <!-- Ionicons -->
{{--   <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
 --}}  <!-- DataTables -->
  <link rel="stylesheet" href="{{asset('adminlte-rtl/plugins/datatables/dataTables.bootstrap4.css')}}">
  <style>
    .home-c .media{    padding: 2rem 2.2rem;color:#fff;
    }
    .user-stat{background:#37B047}
    .product-stat{background:#8262E4}
    .message-stat{background:#FB8F17}
    .loader {
  border: 16px solid #f3f3f3; /* Light grey */
  border-top: 16px solid #3498db; /* Blue */
  border-radius: 50%;
  width: 30px;
  height: 30px;
  animation: spin 2s linear infinite;
}

@keyframes spin {
  0% { transform: rotate(0deg); }
  100% { transform: rotate(360deg); }
}
  </style>
@endsection
@section('content')
      
      <!-- /.content-header -->
  
      <!-- Main content -->
      <div class="content">
        
        <div class="card">
            <div class="card-header bg-primary">
              <h3 class="card-title ">الرئيسية</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body home-c" style="overflow-x:scroll"> 
                <div class="row">
                  <div class="col-md-3 ">
                    
                    <div class="media user-stat">
                        <i class="fa fa-user-circle-o fa-2x ml-4"></i>
                        <div class="media-body">
                          <h3 class="mt-0" id="us-count" data-count="{{$users}}">
                              <div class="loader"></div>
                          </h3>
                          <h3>  مستخدم </h3>
                        </div>
                        
                    </div>
                    
                  </div>
                  <div class="col-md-3 ">
                    
                    <div class="media product-stat">
                        <i class="fa fa-cubes  fa-2x ml-4" aria-hidden="true"></i>
                        <div class="media-body">
                          <h3 class="mt-0" id="pr-count"><div class="loader"></div>
                          </h3>
                          <h3>منتج</h3>
                        </div>
                        
                    </div>
                    
                  </div>
                  <div class="col-md-3 ">
                    
                    <div class="media message-stat">
                        <i class="fa fa-envelope fa-2x ml-4"></i>
                        <div class="media-body">
                          <h3 class="mt-0">5</h3>
                          <h3> رسائل </h3>
                        </div>
                        
                    </div>
                    
                  </div>
            
                </div>
                <div class="card mt-5 pt-2">
                  <div class="card-header bg-primary ">
                   <h4 class="card-title">اخر الطلبات</h4>  
                  </div>
                 
                  <div class="panel-body p-2">
                      <table id="example1" class="table table-bordered table-striped">
                          <thead>
                            <tr>
                              <th>العميل</th>
                              <th>رقم المنتج</th>
                              <th>التاريخ </th>
                            </tr>
                            <tr>
                              <td>ahmed amine</td>
                              <td>LMD45E69D-SKU</td>
                              <td>25-05-2019</td>
                            </tr>
                          </thead>
                      </table>
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
setTimeout(() => {
  $('#us-count').text($('#us-count').data('count'))
}, 3000);
 fetch('/getProducts')
.then(res => res.json())
.then(res => {
  $('#pr-count').text(res.total)
})
</script>
@endsection
@endsection