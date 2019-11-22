@extends('Ar.app')
@section('title','favorites')
@section('content')
@if(Auth::check())

<favorites auth="{{Auth::id()}}"></favorites>
@else
<div class="container p-3">
<div class="columns-container p-3 bg-white col-md-8 m-auto text-center" style="box-shadow: rgb(193, 179, 179) 0px 0px 8px 0px;">
  <div class="alert alert-info">
     من فضلك قم بتسجيل الدخول لرؤية المفضلة
     
  </div>
  <a data-target="#login-modal" data-toggle="modal" class="btn btn-primary text-white">تسجيل الدخول</a>
</div>
</div>


@endif


 @endsection