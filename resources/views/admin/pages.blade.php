
@extends('admin.layouts.app')
@section('title',$page->slug)
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
              <h3 class="card-title ">{{$page->slug}}</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body " style="overflow-x:scroll"> 
                <form action="{{route('admin.updatePage',['slug'=>$page->slug])}}" method="post" id="addPageForm" enctype="multipart/form-data">
                  {{ csrf_field() }}
                  <label for="description_ar">المحتوى بالعربية</label>
                  <textarea class="form-control " id="des1" minlength="50" name="description_ar"  required>
                    {{$page->description_ar}}
                  </textarea>
                  <br>
                  <label for="description">المحتوى بالانجليزية</label>
                  <textarea class="form-control " id="des2" minlength="50" name="description"   required>
                      {{$page->description}}
                  </textarea>                  
                  <br>
                  <input type="submit" class="form-control btn-success btn " value="تحديث">
                </form>

               
            </div>


            
            </div>
            
          </div>
              
              
             
              
@section('js')
<script src='https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js' referrerpolicy="origin"></script>


<script>
 tinymce.init({
    selector: '#des1'
  });
 tinymce.init({
    selector: '#des2'
  });
</script>
@endsection
@endsection