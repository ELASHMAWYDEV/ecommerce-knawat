
@extends('admin.layouts.app')
@section('title','إعدادات الشحن')
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
              <h3 class="card-title ">اسعار الشحن</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body " style="overflow-x:scroll"> 
                    <button class="btn btn-info mb-2" data-toggle="modal" data-target="#addShipping">إضافة تسعيرة</button>
                    
                    @if(count($shippings) > 0 && ($shippings[0]->adjustment_price))
                    <button class="btn btn-danger mb-2 unactivate_adjustment_price" data-toggle="modal"
                     data-target="#activate_adjustment_price"  >تعطيل قيمة التوظيب (2 دولار)</button>
                    @else
                    <button class="btn btn-success mb-2 activate_adjustment_price"
                     data-toggle="modal" data-target="#activate_adjustment_price" 
                     > تفعيل قيمة التوظيب (2 دولار)</button> 
                    @endif

                    <button class="btn btn-success mb-2" data-toggle="modal" data-target="#changeShippingCompany">تغيير شركة الشحن</button>

                    <div class="row"><div class="col-sm-12"><table id="example1" class="table table-bordered table-striped dataTable" role="grid">
                            <thead>
                            <tr role="row">
                                <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="موتور رندر: activate to sort column descending" > الرقم</th>
                                <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="موتور رندر: activate to sort column descending" > الشركة</th>
                                <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="موتور رندر: activate to sort column descending" >  الدولة</th>
                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="مرورگر: activate to sort column ascending" >الوزن </th>
                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="مرورگر: activate to sort column ascending" >السعر </th>
                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="مرورگر: activate to sort column ascending" > </th>
                               
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($shippings as $shipping)
                                <tr role="row" class="odd">
                                  <td class="sorting_1">{{$shipping->id}}</td>
                                  <td class="sorting_1">{{$shipping->company->company_name}}</td>
                                  <td class="sorting_1">
                                      {{$shipping->country}}
                                  </td>
                                 
                                  <td>{{$shipping->weight}}</td>
                                  <td>{{$shipping->price}}</td>
                                  <td>
                                      <i class="fa fa-pencil text-primary ml-2 updateShipping" 
                                        data-toggle="modal" data-target="#updateShipping"
                                        data-action="{{route('admin.updateShipping',['id'=>$shipping->id])}}" 
                                        data-title={{$shipping->company_name}}
                                        data-country={{$shipping->country}}
                                        data-weight={{$shipping->weight}}
                                        data-price={{$shipping->price}}
                                      ></i>
                                       <i class="fa fa-trash text-danger deleteShipping" data-toggle="modal" data-target="#deleteShipping"
                                        data-action="{{route('admin.deleteShipping',['id'=>$shipping->id])}}"></i>
                                  </td>
                                </tr>
                            @endforeach
                            

                             </tbody>
                          
                          </table></div></div>
            
            </div>
            
          </div>
              
              
             
              {{-- model add slider --}}
              <div class="modal fade"  id="addShipping" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content mt-4">
                      <div class="modal-header">
                        <h6 class="modal-title" id="exampleModalLongTitle">إضافة تسعيرة</h6>
                        <button type="button" class="close ml-0" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                           <form action="{{route('admin.addShipping')}}" method="POST" enctype="multipart/form-data">
                             {{ csrf_field() }} 
                             
                                <div class="form-group">
                                    <label>الشركة</label>
                                    <select name="company_id" class="form-control"  >
                                      @foreach ($shipping_companies as $company)
                                      <option value="{{$company->id}}">{{$company->company_name}}</option> 
                                      @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label >الدولة</label>
                                    <select name="country" id="country" class="form-control">

                                    </select>
                                </div>
                                <div class="form-group">
                                    <label >الوزن (كغ)</label>
                                    <input type="text" class="form-control" name="weight" >
                                </div>
                                <div class="form-group">
                                    <label >السعر</label>
                                    <input type="text" class="form-control" name="price" >
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
              <div class="modal fade"  id="updateShipping" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content mt-4">
                      <div class="modal-header">
                        <h6 class="modal-title" id="exampleModalLongTitle">تحديث تسعيرة</h6>
                        <button type="button" class="close ml-0" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                           <form action="" method="POST" enctype="multipart/form-data">
                             {{ csrf_field() }} 
                             
                                <div class="form-group">
                                  <label>الشركة</label>
                                  <select name="company_id" class="form-control"  >
                                    @foreach ($shipping_companies as $company)
                                    <option value="{{$company->id}}">{{$company->company_name}}</option> 
                                    @endforeach
                                  </select>
                                </div>
                                <div class="form-group">
                                    <label >الدولة</label>
                                    <input disabled="disabled" name="country" type="text" class="form-control" id="country_name">
                                </div>
                                <div class="form-group">
                                    <label >الوزن (كغ)</label>
                                    <input type="text" class="form-control" name="weight" >
                                </div>
                                <div class="form-group">
                                    <label >السعر</label>
                                    <input type="text" class="form-control" name="price" >
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
              <div class="modal fade"  id="deleteShipping" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content mt-4">
                      <div class="modal-header">
                        <h6 class="modal-title" id="exampleModalLongTitle">حدف شحن</h6>
                        <button type="button" class="close ml-0" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                           <form action="">
                             {{ csrf_field() }} 
                             <h5 class="text-info text-center" for="">هل تريد بالفعل حدف هدا الشحن</h5>
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
              {{-- model changeShippingCompany--}}
              <div class="modal fade"  id="changeShippingCompany" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content mt-4">
                      <div class="modal-header">
                        <h6 class="modal-title" id="exampleModalLongTitle">تغيير شركة الشحن</h6>
                        <button type="button" class="close ml-0" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                           <form action="{{route('admin.changeShippingcompany')}}" method="post">
                             {{ csrf_field() }} 
                             <h5 class=" text-center" for="">شركة الشحن الحالية هي 
                               @foreach ($shipping_companies as $c)
                                   @if($c->state == true)
                                      <strong class="text-info ">{{$c->company_name}}</strong>
                                   @endif
                               @endforeach
                             </h5>
                             <div class="text-center">
                              <label for="company_id">تغيير </label>
                              <select name="company_id" id="comp_id" class="form-conrol">
                                @foreach ($shipping_companies as $c)
                                <option value="{{$c->id}}" @if($c->state == true) 
                                  selected="selected" @endif>{{$c->company_name}}</option>
                                @endforeach
                              </select> 
                             </div>
                             
                             <div class="form-group">
                                <div class="text-center">
                                    <button type="submit" class="btn btn-success">
                                        تأكيد
                                    </button>
                                </div>
                             </div>
                           </form>      
                      </div>
                    </div>
               </div>
            
              </div>
               {{-- model activate adjustment price--}}
               <div class="modal fade"  id="activate_adjustment_price" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                  <div class="modal-content mt-4">
                    <div class="modal-header">
                      <h6 class="modal-title" id="exampleModalLongTitle">سعر التوظيب</h6>
                      <button type="button" class="close ml-0" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                         <form action="">
                           {{ csrf_field() }} 
                           <h5 class="text-info text-center msg" for=""></h5>
                           <div class="form-group">
                              <div class="text-center">
                                  <button type="submit" class="btn btn-primary">
                                      تأكيد
                                  </button>
                              </div>
                           </div>
                         </form>      
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
$(document).on('click','.deleteShipping',function(){
 let action= $(this).data('action');
 $('#deleteShipping').find('form').attr('action',action);
});
$(document).on('click','.updateShipping',function(){
  let action = $(this).data('action');

    $('#updateShipping form').attr('action',action);
   console.log(action)
  $('#updateShipping').find('input[name="country"]').val($(this).data('country'));
  $('#updateShipping').find('input[name="weight"]').val($(this).data('weight'));
  $('#updateShipping').find('input[name="price"]').val($(this).data('price'));
  $('#updateShipping').find(`option[name=${$(this).data('company_name')}]`).attr('selected','selected');
   
})
$(document).on('click','.activate_adjustment_price',function(){
  let action = 'adjustmentPriceStatus/'+1;

    $('#activate_adjustment_price form').attr('action',action);
    $('#activate_adjustment_price form').find('.msg').text('هل تريد تفعيل 2 دولار سعر التوظيب على كل منتج ؟');
})
$(document).on('click','.unactivate_adjustment_price',function(){
  let action = 'adjustmentPriceStatus/'+0;

    $('#activate_adjustment_price form').attr('action',action);
    $('#activate_adjustment_price form').find('.msg').text('هل تريد تعطيل 2 دولار سعر التوظيب على كل منتج ؟');
    
   
})
setTimeout(() => {
    getCountries();
}, 2000);
function getCountries(){
  fetch('https://restcountries.eu/rest/v2/all')
  .then(function(res){
     return res.json();
  })
  .then((data) => {
       //console.log(JSON.stringify(data.Response));
       var countries  = data;
      
       //console.log(countries);
          /*   if(countries.length == 0){
             countries = [{'Name':'algeria'}];
            } */
    countries.forEach(c =>{
           //console.log(c)
           $('#country').append('<option value="'+c.name+'">'+c.name+'</option>')
        }) 
  })
}

</script>
@endsection
@endsection