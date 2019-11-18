@extends('Ar.app')
@section('title','Home')
@section('css')
<link rel="stylesheet" href="{{asset('css/ar/home.css')}}">
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
                 <div class="col-lg-7 col-md-8 text-center mr-md-auto ">
                                 <div class="slider-text-info">
                                     <h1 class="title-1">موضة X</h1>
                                     <h2 class="title-2">مجوهرات & ملحقات</h2>
                                     <div class="slider-1-des">
                                     <p> خصم حتى <span>40% </span></p>
                                     </div>
                                     <div class="slier-btn-1">
                                     <a target="_blink"  href="{{route('frontEnd.products')}}" class="shop-btn">تسوق الان</a>
                                     </div>
                                 </div>
                 </div>
               </div>
               <div class="carousel-item row justify-content-end" style="    background-image: url(img/mobilec.jpg);">
                   <div class="col-lg-7 col-md-8 text-center mr-md-auto ">
                       <div class="slider-text-info">
                           <h1 class="title-1 text-white">الكترونيك &</h1>
                           <h2 class="title-2 text-white">ملحقات الهواتف</h2>
                           <div class="slider-1-des slider-2-des text-white">
                           <p>خصم حتى <span>40% </span></p>
                           </div>
                           <div class="slier-btn-1">
                           <a target="_blink" href="{{route('frontEnd.products')}}" class="shop-btn">تسوق الان</a>
                           </div>
                       </div>
                   </div>
               </div>
               </div>
               
             </div>
            
         </div>
    </div>
  <homear></homear>
@endsection

@section('js')
<script>

  </script>
@endsection