@extends('En.app')
@section('title','products')
@section('content')
<!-- mian product content-->
<div class="container pt-4 pb-4">
    
    <!-- single product--> 
   
     
       <productdetails vid="{{$sku}}"></productdetails>
         

   
   <!--related products-->
   <div class="related-products mt-4 bg-white p-2 p-des" style="box-shadow: 0px 0px 8px 0 #c1b3b3;">
        <div class="row">
                <div class="col-lg-3 col-md-6 col-12">
                  <div class=" single-product-item" >
                  <img src="{{asset('img/1.jpg')}}" class="card-img-top" alt="...">
                  
                      <a href="#" class="btn btn-primary add-to-cart-btn">Add to cart</a>
                 
                  <div class="sale-title label-product">Sale</div>
                  <div class="percent-count label-product bg-danger ">-15%</div>
                  <div class="action-links">



                  <a class="wishlist action-btn btn-wishlist" href="" title="Wishlist">
                    <i class="fa fa-heart-o fa-lg text-white text-white"></i>
                  </a>
                  <a class="action-btn btn-quickview" data-toggle="modal" data-target="#view-product" >
                    <i class="fa fa-eye fa-lg text-white text-white"></i>
                  </a>
                      
                     
                      
                      </div>
                 </div> 
                 <div class="product-info">
                      <div class="rating-box">
                        <ul class="rating d-flex">
                          <span class="shopify-product-reviews-badge" data-id="1724497690697"></span>
                        </ul>
                      </div>
                      <div class="p-rate mt-1 text-center">
                            <i class="fa fa-star-o main-b-color"></i>
                            <i class="fa fa-star-o main-b-color"></i>
                            <i class="fa fa-star-o main-b-color"></i>
                            <i class="fa fa-star-o main-b-color"></i>
                            <i class="fa fa-star-o main-b-color"></i>
                      </div>
                      <h4 class="product-name text-center">
                          <a href="#">1. New and sale badge product</a>
                      </h4>
                      <div class="price-box text-center">
                        <span class="new-price">
                            <span class="money" data-currency-usd="$110.00">$110.00</span>
                        </span>
                        
                        <span class="old-price">
                            <span class="money" data-currency-usd="$130.00">$130.00</span>
                        </span>
                        
                      </div>
                  </div>
                </div>
                 <div class="col-lg-3 col-md-6 col-12">
                  <div class=" single-product-item" >
                  <img src="{{asset('img/4.jpg')}}" class="card-img-top" alt="...">
                  
                      <a href="#" class="btn btn-primary add-to-cart-btn">Add to cart</a>
                 
                  <div class="sale-title label-product">Sale</div>
                  <div class="percent-count label-product bg-danger ">-15%</div>
                  <div class="action-links">



                  <a class="wishlist action-btn btn-wishlist" href="" title="Wishlist">
                    <i class="fa fa-heart-o fa-lg text-white"></i>
                  </a>
                  <a class="action-btn btn-quickview" data-toggle="modal" data-target="#view-product" >
                    <i class="fa fa-eye fa-lg text-white"></i>
                  </a>
                      
                     
                      
                      </div>
                 </div> 
                 <div class="product-info">
                      <div class="rating-box">
                        <ul class="rating d-flex">
                          <span class="shopify-product-reviews-badge" data-id="1724497690697"></span>
                        </ul>
                      </div>
                      <div class="p-rate mt-1 text-center">
                            <i class="fa fa-star-o main-b-color"></i>
                            <i class="fa fa-star-o main-b-color"></i>
                            <i class="fa fa-star-o main-b-color"></i>
                            <i class="fa fa-star-o main-b-color"></i>
                            <i class="fa fa-star-o main-b-color"></i>
                      </div>
                      <h4 class="product-name text-center">
                          <a href="#">1. New and sale badge product</a>
                      </h4>
                      <div class="price-box text-center">
                        <span class="new-price">
                            <span class="money" data-currency-usd="$110.00">$110.00</span>
                        </span>
                        
                        <span class="old-price">
                            <span class="money" data-currency-usd="$130.00">$130.00</span>
                        </span>
                        
                      </div>
                  </div>
                </div>
                <div class="col-lg-3 col-md-6 col-12">
                  <div class=" single-product-item" >
                  <img src="{{asset('img/2.jpg')}}" class="card-img-top" alt="...">
                  
                      <a href="#" class="btn btn-primary add-to-cart-btn">Add to cart</a>
                 
                  <div class="sale-title label-product">Sale</div>
                  <div class="percent-count label-product bg-danger ">-15%</div>
                  <div class="action-links">



                  <a class="wishlist action-btn btn-wishlist" href="" title="Wishlist">
                    <i class="fa fa-heart-o fa-lg text-white"></i>
                  </a>
                  <a class="action-btn btn-quickview" data-toggle="modal" data-target="#view-product" >
                    <i class="fa fa-eye fa-lg text-white text-white"></i>
                  </a>
                      
                     
                      
                      </div>
                 </div> 
                 <div class="product-info">
                      <div class="rating-box">
                        <ul class="rating d-flex">
                          <span class="shopify-product-reviews-badge" data-id="1724497690697"></span>
                        </ul>
                      </div>
                      <div class="p-rate mt-1 text-center">
                            <i class="fa fa-star-o main-b-color"></i>
                            <i class="fa fa-star-o main-b-color"></i>
                            <i class="fa fa-star-o main-b-color"></i>
                            <i class="fa fa-star-o main-b-color"></i>
                            <i class="fa fa-star-o main-b-color"></i>
                      </div>
                      <h4 class="product-name text-center">
                          <a href="#">1. New and sale badge product</a>
                      </h4>
                      <div class="price-box text-center">
                        <span class="new-price">
                            <span class="money" data-currency-usd="$110.00">$110.00</span>
                        </span>
                        
                        <span class="old-price">
                            <span class="money" data-currency-usd="$130.00">$130.00</span>
                        </span>
                        
                      </div>
                  </div>
                </div>
                <div class="col-lg-3 col-md-6 col-12">
                  <div class=" single-product-item" >
                  <img src="{{asset('img/3.jpg')}}" class="card-img-top" alt="...">
                  
                      <a href="#" class="btn btn-primary add-to-cart-btn">Add to cart</a>
                 
                  <div class="sale-title label-product">Sale</div>
                  <div class="percent-count label-product bg-danger ">-15%</div>
                  <div class="action-links">



                  <a class="wishlist action-btn btn-wishlist" href="" title="Wishlist">
                    <i class="fa fa-heart-o fa-lg text-white"></i>
                  </a>
                  <a class="action-btn btn-quickview" data-toggle="modal" data-target="#view-product" >
                    <i class="fa fa-eye fa-lg text-white"></i>
                  </a>
                      
                     
                      
                      </div>
                 </div> 
                 <div class="product-info">
                      <div class="rating-box">
                        <ul class="rating d-flex">
                          <span class="shopify-product-reviews-badge" data-id="1724497690697"></span>
                        </ul>
                      </div>
                      <div class="p-rate mt-1 text-center">
                            <i class="fa fa-star-o main-b-color"></i>
                            <i class="fa fa-star-o main-b-color"></i>
                            <i class="fa fa-star-o main-b-color"></i>
                            <i class="fa fa-star-o main-b-color"></i>
                            <i class="fa fa-star-o main-b-color"></i>
                      </div>
                      <h4 class="product-name text-center">
                          <a href="#">1. New and sale badge product</a>
                      </h4>
                      <div class="price-box text-center">
                        <span class="new-price">
                            <span class="money" data-currency-usd="$110.00">$110.00</span>
                        </span>
                        
                        <span class="old-price">
                            <span class="money" data-currency-usd="$130.00">$130.00</span>
                        </span>
                        
                      </div>
                  </div>
                </div>
              
        </div>
   </div>
   <!--related products-->
</div>
@endsection
@section('js') 

<script type="text/javascript" src="https://cdn.rawgit.com/igorlino/elevatezoom-plus/1.1.6/src/jquery.ez-plus.js"></script>
<script>
$(document).ready(function(){
  
    $("#img_01").ezPlus({
            zoomType: 'lens',
            lensShape: 'round',
            lensSize: 100
        });
})
</script>
@endsection