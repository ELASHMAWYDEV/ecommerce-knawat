@extends('En.app')
@section('title','contact')
@section('content')
   
<!-- page wapper-->
<div class="columns-container container p-3 ">
        <div class="container bg-white pt-3 pb-3" id="columns">
            <!-- breadcrumb -->
            <div class="breadcrumb clearfix">
                <a class="home" href="{{route('frontEnd.home')}}" title="Return to Home">Home</a>
                <span class="navigation-pipe">&nbsp; 
                    <i class="fa fa-chevron-right mr-2" style="font-size: 0.7rem;"></i>
                </span>
                <span class="navigation_page">Contact us</span>
            </div>
           <div class="text-center">
                <div class="alert alert-info col-md-8 m-auto">If you have any request or question please feel free to contact us</div>
                <br>
                <div><label for="adr">Address : </label> <strong>{{$settings->address}}</strong></div>
                <div><label for="adr">Contact Mail : </label> <strong>{{$settings->contact_us_email}}</strong></div> 
                <br>
           </div>
            
            <div class="page-content p-4 bg-white col-md-8 m-auto text-center" style="box-shadow: rgb(193, 179, 179) 0px 0px 8px 0px;">
               
                <contact></contact>
            </div>
        </div>
</div>
    <!-- ./page wapper-->
@endsection