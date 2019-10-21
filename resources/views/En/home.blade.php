@extends('En.app')
@section('title','Home')
@section('css')
<link rel="stylesheet" href="{{asset('css/home.css')}}">
<style>
    
</style>
@endsection
@section('content')

   <!--main content -->
    <!-- slider -->
    <div class="slider-main-area">
      <div class="container mainSlider p-3">
         <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
             <ol class="carousel-indicators">
               <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
               <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
             </ol>
             <div class="carousel-inner" id="home-slide-1">
               <div class="carousel-item active row justify-content-end" style="    background-image: url(img/home1.jpg);
               ">
                 <div class="col-lg-7 col-md-8 text-center ml-md-auto ">
                                 <div class="slider-text-info">
                                     <h1 class="title-1">FASHION X</h1>
                                     <h2 class="title-2">JEWELRY & ACCESSOIIES</h2>
                                     <div class="slider-1-des">
                                     <p>get up to <span>40% off</span></p>
                                     </div>
                                     <div class="slier-btn-1">
                                     <a target="_blink"  href="{{route('frontEnd.products')}}" class="shop-btn">shop now</a>
                                     </div>
                                 </div>
                 </div>
               </div>
               <div class="carousel-item row justify-content-end" style="    background-image: url(img/mobilec.jpg);">
                   <div class="col-lg-7 col-md-8 text-center ml-md-auto ">
                       <div class="slider-text-info">
                           <h1 class="title-1 text-white">NEW ELECTRONIC &</h1>
                           <h2 class="title-2 text-white">MOBILE ACCESSORIES</h2>
                           <div class="slider-1-des slider-2-des text-white">
                           <p>get up to <span>40% off</span></p>
                           </div>
                           <div class="slier-btn-1">
                           <a target="_blink" href="{{route('frontEnd.products')}}" class="shop-btn">shop now</a>
                           </div>
                       </div>
                   </div>
               </div>
               </div>
               
             </div>
            
         </div>
    </div>
  <home></home>
@endsection

@section('js')
<script>

  </script>
@endsection