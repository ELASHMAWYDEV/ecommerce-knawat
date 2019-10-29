@extends('admin.layouts.app')
@section('title','إعدادات الموقع')
@section('content')
 <!-- Content Header (Page header) -->
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
            @if(Session::has('success'))
              
              <div class="alert alert-success alert-dismissible fade show col-sm-8 mr-auto ml-auto mb-3" role="alert">
                     {{Session::get('success')}}    
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
              </div>
            @endif
                <div class="card card-primary col-sm-8 p-0 m-auto">
                        <div class="card-header">
                          <h3 class="card-title">ظبط إعدادات الموقع</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form role="form" id="update_home_settings" method="POST" action="{{route('admin.updateSiteSettings')}}" enctype="multipart/form-data">
                            {{ csrf_field() }}
                          <div class="card-body">
                            <div class="form-group">
                              <label for="name">اسم الموقع</label>
                            <input type="text" name="name" id="name" value="{{$settings->site_name}}" class="form-control" id="exampleInputEmail1" >
                            </div>
                            <div class="form-group">
                              <label for="name_e">اسم الموقع بالانجليزي</label>
                            <input type="text" name="name_e" id="name_e" value="{{$settings->site_name_e}}" class="form-control">
                            </div>
                            
                            <div class="form-group">
                              <label for="exampleInputEmail1">البريد الإلكتروني الرئيسي</label>
                              <input type="email" name="email" value="{{$settings->site_email}}" class="form-control" >
                            </div>
                            <div class="form-group">
                              <label for="contact_us_email">البريد الإلكتروني (اتصل بنا)</label>
                              <input type="email" name="contact_us_email" id="contact_us_email" value="{{$settings->contact_us_email}}" class="form-control" >
                            </div>
                            <div class="form-group">
                              <label for="address">العنوان</label>
                              <input type="text" name="address" id="address" value="{{$settings->address}}" class="form-control" >
                            </div>
                            <div class="form-group">
                              <label for="phone">رقم الهاتف</label>
                              <input type="phone" name="phone" id="phone" value="{{$settings->phone}}" class="form-control" >
                            </div>
                            <h5 class="text-center text-info">روابط</h5>
                            <hr>
                            <div class="form-group">
                              <label for="facebook_u">facebook</label>
                              <input type="text" name="facebook_u" id="facebook_u" value="{{$settings->facebook_link}}" class="form-control">
                            </div>
                            <div class="form-group">
                              <label for="twitter_u">twitter</label>
                              <input type="text" name="twitter_u" id="twitter_u" value="{{$settings->twitter_link}}" class="form-control">
                            </div>
                            <div class="form-group">
                              <label for="instagram_u">instagram</label>
                              <input type="text" name="twitter_u" id="twitter_u" value="{{$settings->twitter_link}}" class="form-control">
                            </div>
                            <div class="form-group">
                              <label for="linkedin_u">linked in</label>
                              <input type="text" name="twitter_u" id="twitter_u" value="{{$settings->twitter_link}}" class="form-control">
                            </div>
                            <div class="form-group">
                              <label for="youtube_u">youtube</label>
                              <input type="text" name="youtube_u" id="youtube_u" value="{{$settings->youtube_link}}" class="form-control">
                            </div>
                            
                            <div class="form-group">
                              <label for="exampleInputFile">الشعار</label>
                              <div class="input-group">
                                <div class="custom-file">
                                  <input type="file" name="logo" class="custom-file-input" id="exampleInputFile">
                                  <label class="custom-file-label" for="exampleInputFile">{{$settings->logo}}</label>
                                </div>
                                
                              </div>
                              <p>
                                <a class="btn btn-primary  btn-sm mt-3" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
                                  رؤية الشعار
                                  <i class="fa fa-eye "></i>
                                </a>
                              </p>
                              <div class="collapse" id="collapseExample">
                                <div class="card card-body ">
                                  <img src="{{asset('img').'/'.$settings->logo}}" class="m-auto"    width= "100px" height="80px" alt="">
                                </div>
                              </div>
                            </div>
                          </div>
                          <!-- /.card-body -->
          
                          <div class="card-footer">
                            <button type="submit" class="btn btn-primary">تعديل</button>
                          </div>
                        </form>
                </div>
            </div>
        <!-- /.row -->
      </div>
 </div>

@section('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/additional-methods.min.js"></script>
 <script>
 jQuery.extend(jQuery.validator.messages, {
    required: "هذا الحقل ضروري",
    remote: "Please fix this field.",
    email: "ادخل بريدا الكترونيا صحيحا",
    url: "ادخل رابطا صحيحا",
    number: "ادخل رقما صحيحا",
    digits: "Please enter only digits.",
    creditcard: "Please enter a valid credit card number.",
    equalTo: "Please enter the same value again.",
    accept: "Please enter a value with a valid extension.",
    minlength: jQuery.validator.format("ادخل رقم الجوال أكثر من 10 أحرف."),
    maxlength: jQuery.validator.format("ادخل رقم الجوال أقل من 12 حرف."),
    rangelength: jQuery.validator.format("Please enter a value between {0} and {1} characters long."),
    range: jQuery.validator.format("Please enter a value between {0} and {1}."),
    max: jQuery.validator.format("Please enter a value less than or equal to {0}."),
    min: jQuery.validator.format("Please enter a value greater than or equal to {0}.")
});
 </script>
<script>
 $( "#update_home_settings" ).validate({
    rules: {
        name:{
            required :true
        },
        name_e:{
            required :true
        },
        twitter_u: {
          url: true
        },
        facebook_u: {
          url: true
        },
        youtube_u: {
          url: true
        },
        instagram_u: {
          url: true
        },
        linkedin_u: {
          url: true
        },
        contact_us_email:{
            required :true
        }
        },
        address:{
            required :true
        }
        
        
    }
     ,
    submitHandler: function(form) {
       form.submit();
     }

    });
</script>
@endsection
@endsection