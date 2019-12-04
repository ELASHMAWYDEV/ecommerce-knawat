@extends('Ar.app')
@section('title','اتصل بنا')
@section('content')
   
<!-- page wapper-->
<div class="columns-container container p-3 ">
        <div class="container bg-white pt-3 pb-3" id="columns">
            <!-- breadcrumb -->
            <div class="breadcrumb clearfix">
                <a class="home" href="{{route('frontEnd.home')}}" title="Return to Home">الرئيسية</a>
                <span class="navigation-pipe">&nbsp; 
                    <i class="fa fa-chevron-left mr-2" style="font-size: 0.7rem;"></i>
                </span>
                <span class="navigation_page">اتصل بنا</span>
            </div>
           <div class="text-center">
                <div class="alert alert-info col-md-8 m-auto">ادا كان لديك أي سؤال او استفسار تفضل بمراسلتنا</div>
                <br>
                <div><label for="adr">العنوان : </label> <strong>{{$settings->address}}</strong></div>
                <div><label for="adr">البريد الالكتروني : </label> <strong>{{$settings->contact_us_email}}</strong></div> 
                <br>
           </div>
            
            <div class="page-content p-4 bg-white col-md-8 m-auto text-center" style="box-shadow: rgb(193, 179, 179) 0px 0px 8px 0px;">
               
                <contact></contact>
            </div>
        </div>
</div>
    <!-- ./page wapper-->
@endsection