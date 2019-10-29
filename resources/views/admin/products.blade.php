
@extends('admin.layouts.app')
@section('title','إدارة المنتجات')
@section('style')
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="{{asset('adminlte-rtl/plugins/datatables/dataTables.bootstrap4.css')}}">
  <style>
    .pr-c .media{    padding: 2rem 2.2rem;background:#fff;    height: 10rem;
    }
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
<div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
          
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
        <div class="row pr-c">
                
                <div class="col-md-3 ">
                  
                  <div class="media product-stat">
                      <i class="fa fa-cubes  fa-2x ml-4" style=" color: rgba(0, 123, 255, 0.77);" aria-hidden="true"></i>
                      <div class="media-body">
                        <h4 class="mt-0" id="pr-count">
                            <div class="loader"></div>
                        </h4>
                        <p class="text-muted"> منتج كلي متوفر</p>
                      </div>
                      
                  </div>
                  
                </div>
                <div class="col-md-3 ">
                        <div class="media product-stat">
                            <i class="fa fa-heart  fa-2x ml-4" style="color: #F1A80A;" aria-hidden="true"></i>
                            <div class="media-body">
                              <h4 class="mt-0" id="fav-count" data-count="{{count($favorites)}}">
                                  <div class="loader"></div>
                              </h4>
                              <p class="text-muted">منتج في المفضلة</p>
                            </div>
                        </div>
                </div>
                <div class="col-md-3 ">
                    <div class="media product-stat">
                        <i class="fa fa-credit-card  fa-2x ml-4" style="color: #1E75EB;" aria-hidden="true"></i>
                        <div class="media-body">
                          <h4 class="mt-0" id="sale-count" data-count="0">
                              <div class="loader"></div>
                          </h4>
                          <p class="text-muted"> منتج قد تم بيعه  </p>
                        </div>
                </div>
                </div>
                <div class="col-md-3 ">
                    <div class="media product-stat">
                        <i class="fa fa-money  fa-2x ml-4" style="color: #84C874;" aria-hidden="true"></i>
                        <div class="media-body">
                          <h4 class="mt-0" id="earn-count" data-count="0">
                              <div class="loader"></div>
                          </h4>
                          <p class="text-muted"> الربح الكلي للمنتجات  </p>
                        </div>
                </div>
                </div>
            
          
        </div>
        <!--the product grouped by property -->
        <productstable></productstable>

        <!--/the products grouped by property-->
            
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

})
setTimeout(() => {
  $('#fav-count').text($('#fav-count').data('count'))
  $('#sale-count').text($('#sale-count').data('count'))
  $('#earn-count').text($('#earn-count').data('count'))
}, 3000);

fetch('/getProducts')
.then(res => res.json())
.then(res => {
  $('#pr-count').text(res.total)
})
</script>
@endsection
@endsection


