@extends('En.app')
@section('title','products')
@section('content')

<!-- main product content-->
<div class="main-product-content">
    <div class="container pt-4 pb-4">
      <div class="row flex-row-reverse">
          <div class="col-lg-9 col-12">
             <div class="row">
                 <div class="col">
                     <div class="shop-top-bar mb-30 pb-1 pt-2">
                           <div class="shop-bar-inner">
                                   <div class="product-view-mode">
                                   <!-- shop-item-filter-list start -->
                                   <!-- <ul class="shop-item-filter-list list-unstyled d-flex">
                                   <li>
                                       <a class="change-view change-view--active" data-view="grid" title="Grid view"><i class="fa fa-th"></i></a>
                                   </li>
                                   <li>
                                       <a class="change-view" data-view="list" title="List view"><i class="fa fa-th-list"></i></a>
                                   </li>
                                   </ul> -->
                                   <!-- shop-item-filter-list end -->
                                   </div>
                                   <div class="toolbar-amount">
                                       <span>Showing 1 - 18 of 33 item(s)</span>
                                   </div>
                           </div>
           
                               <div class="product-select-box">
                                <sortproducts></sortproducts>
                               </div>
                     </div>
                     <!--products-->
                     <div class="shop-products-wrapper">
                         <div id="grid">

                               <Products userId="{{Auth::id()}}"></Products>
                            
                         </div>
                         <paginateProducts></paginateProducts>
                     </div>

                     <!--products-->
                     <!-- featured services -->
                     <div class="featured-servicesborder-0" style="padding: 14px;    clear: both;" >
                         <div class="row bg-white">
                               <div class="media col-md-4 border p-2">
                                       <i class="fa fa-truck main-b-color fa-3x mr-3"></i>
                                       <div class="media-body">
                                           <h5 class="mt-0">Free Shipping</h5>
                                           Start from order 200$
                                       </div>
                               </div>
                               <div class="media col-md-4 border p-2">
                                       <i class="fa fa-phone main-b-color  fa-3x mr-3"></i>
                                       <div class="media-body">
                                           <h5 class="mt-0">Support 24/7</h5>
                                           Call us in service
                                       </div>
                               </div>       
                               <div class="media col-md-4 border p-2">
                                       <i class="fa fa-paper-plane main-b-color fa-3x mr-3"></i>
                                       <div class="media-body">
                                           <h5 class="mt-0">Hot Offers</h5>
                                           Discount up to 50%
                                       </div>
                               </div>       
                         </div>
                      
                     </div>
                     
                     <!--featured services-->
                     <!--best sellter-->
                     <h6 class="mt-2 ">
                           <span class="slide-choosen-categories main-b-color d-inline-block">BEST SELLERS <hr class="hr-choosen-c"></span>
                           <hr class="hr-full-slide-section">
                     </h6>
                     <div class="featured-slider shop-product-wrap box-module mt-3">
                           
                         <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                           <div class="carousel-inner">
                               <div class="carousel-item active">
                                       <div class="row m-0">
                                               <div class="col-lg-4 col-md-6 col-12">
                                                 <div class=" single-product-item" >
                                                 <img src="{{asset('img/1.jpg')}}" class="card-img-top" alt="...">
                                                 
                                                     <a href="#" class="btn btn-primary add-to-cart-btn">Add to cart</a>
                                                
                                                 <div class="sale-title label-product">Sale</div>
                                                 <div class="percent-count label-product bg-danger ">-15%</div>
                                                 <div class="action-links">
               
         
         
                                                 <a class="wishlist action-btn btn-wishlist" href="" title="Wishlist">
                                                   <i class="fa fa-heart-o fa-lg  text-white"></i>
                                                 </a>
                                                 <a class="action-btn btn-quickview" data-toggle="modal" data-target="#view-product" >
                                                   <i class="fa fa-eye fa-lg  text-white"></i>
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
                                               <div class="col-lg-4 col-md-6 col-12">
                                                 <div class=" single-product-item" >
                                                 <img src="{{asset('img/2.jpg')}}" class="card-img-top" alt="...">
                                                 
                                                     <a href="#" class="btn btn-primary add-to-cart-btn">Add to cart</a>
                                                
                                                 <div class="sale-title label-product">Sale</div>
                                                 <div class="percent-count label-product bg-danger ">-15%</div>
                                                 <div class="action-links">
               
         
         
                                                 <a class="wishlist action-btn btn-wishlist" href="" title="Wishlist">
                                                   <i class="fa fa-heart-o fa-lg  text-white"></i>
                                                 </a>
                                                 <a class="action-btn btn-quickview" data-toggle="modal" data-target="#view-product" >
                                                   <i class="fa fa-eye fa-lg  text-white"></i>
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
                                               <div class="col-lg-4 col-md-6 col-12">
                                                 <div class=" single-product-item" >
                                                 <img src="{{asset('img/3.jpg')}}" class="card-img-top" alt="...">
                                                 
                                                     <a href="#" class="btn btn-primary add-to-cart-btn">Add to cart</a>
                                                
                                                 <div class="sale-title label-product">Sale</div>
                                                 <div class="percent-count label-product bg-danger ">-15%</div>
                                                 <div class="action-links">
               
         
         
                                                 <a class="wishlist action-btn btn-wishlist" href="" title="Wishlist">
                                                   <i class="fa fa-heart-o fa-lg  text-white"></i>
                                                 </a>
                                                 <a class="action-btn btn-quickview" data-toggle="modal" data-target="#view-product" >
                                                   <i class="fa fa-eye fa-lg  text-white"></i>
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
                               <div class="carousel-item">
                                       <div class="col-lg-4 col-md-6 col-12">
                                               <div class=" single-product-item" >
                                               <img src="{{asset('img/1.jpg')}}" class="card-img-top" alt="...">
                                               
                                                   <a href="#" class="btn btn-primary add-to-cart-btn">Add to cart</a>
                                              
                                               <div class="sale-title label-product">Sale</div>
                                               <div class="percent-count label-product bg-danger ">-15%</div>
                                               <div class="action-links">
             
       
       
                                               <a class="wishlist action-btn btn-wishlist" href="" title="Wishlist">
                                                 <i class="fa fa-heart-o fa-lg  text-white"></i>
                                               </a>
                                               <a class="action-btn btn-quickview" data-toggle="modal" data-target="#view-product" >
                                                 <i class="fa fa-eye fa-lg  text-white"></i>
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
                                                           <i class="fa fa-star-o  main-b-color"></i>
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
                           <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                               <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                               <span class="sr-only">Previous</span>
                           </a>
                           <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                               <span class="carousel-control-next-icon" aria-hidden="true"></span>
                               <span class="sr-only">Next</span>
                           </a>
                         </div>
                     </div>
                      <!--best sellter-->
                      <!-- most seller categories-->
                      <h6 class="mt-2 ">
                           <span class="slide-choosen-categories main-b-color d-inline-block">Popular Categories <hr class="hr-choosen-c"></span>
                           <hr class="hr-full-slide-section">
                     </h6>
                     <div class="most-cat-sellers shop-product-wrap  mt-3">
                         <div class="row">
                             <div class="col-md-4 ">
                                 <div class="media  p-2 bg-white" style="box-shadow: 0px 0px 4px 0 #b8adad;">
                                   <img src="{{asset('img/4.jpg')}}" class="img-responsive " alt="category image" >
                                   <div class="media-body" style="font-size: 14px">
                                           <a href="" class="mt-0  cat-name">Category name</a>
                                           <p class="text-muted">some description here</p>
                                           <a href="">See All</a>
                                   </div>
                                   
                                 </div>
                                  
                             </div>
                              <div class="col-md-4 ">
                                 <div class="media  p-2 bg-white" style="box-shadow: 0px 0px 4px 0 #b8adad;">
                                   <img src="{{asset('img/4.jpg')}}" class="img-responsive " alt="category image" >
                                   <div class="media-body" style="font-size: 14px">
                                           <a href="" class="mt-0  cat-name">Category name</a>
                                           <p class="text-muted">some description here</p>
                                           <a href="">See All</a>
                                   </div>
                                   
                                 </div>
                                  
                             </div>
                              <div class="col-md-4 ">
                                 <div class="media  p-2 bg-white" style="box-shadow: 0px 0px 4px 0 #b8adad;">
                                   <img src="{{asset('img/4.jpg')}}" class="img-responsive " alt="category image" >
                                   <div class="media-body" style="font-size: 14px">
                                           <a href="" class="mt-0  cat-name">Category name</a>
                                           <p class="text-muted">some description here</p>
                                           <a href="">See All</a>
                                   </div>
                                   
                                 </div>
                                  
                             </div>
                             
                         </div>
                     </div>

                      <!-- most seller categories-->
                 </div>
                   
             </div>
             <div class="shop-products-wrapper">

             </div>
          </div>
          <div class="col-lg-3">
              <div class="shop-sidebar">
                   <div class="categories-box sidebar-categores-box">
                         <div class="section-title">
                           <h5 class="font-weight-bold">CATEGORIES</h5>
                         </div>
                          <div class="sidebar-categores-inner">
                           <div class="filter-group">
                             
                             
                             <a class="" href="best-sellers.html"><i class="fa fa-check main-b-color "></i> Best Sellers <span>(16)</span></a>
                             
                             <a class="active" href="camera.html"><i class="fa fa-check main-b-color "></i> CAMERA <span>(21)</span></a>
                             
                             <a class="" href="deal.html"><i class="fa fa-check main-b-color "></i> deal <span>(15)</span></a>
                             
                             <a class="" href="featured.html"><i class="fa fa-check main-b-color "></i> Featured <span>(16)</span></a>
                             
                             <a class="" href="new-arrivals.html"><i class="fa fa-check main-b-color "></i> New arrivals <span>(15)</span></a>
                             
                     
                           </div>
                          </div>
                   </div>
                    <div class="categories-box sidebar-categores-box">
                         <div class="section-title">
                           <h5 class="font-weight-bold">CATALOGUES</h5>
                         </div>
                          <div class="sidebar-categores-inner">
                           <div class="filter-group">
                             
                             
                             <a class="" href="best-sellers.html"><i class="fa fa-check main-b-color "></i> Fashion<span>(16)</span></a>
                             
                             <a class="" href="camera.html"><i class="fa fa-check main-b-color "></i> Sports <span>(21)</span></a>
                             
                             <a class="active" href="deal.html"><i class="fa fa-check main-b-color "></i> Electronic <span>(15)</span></a>
                             
                             <a class="" href="featured.html"><i class="fa fa-check main-b-color "></i> Digital <span>(16)</span></a>
                             
                             <a class="" href="new-arrivals.html"><i class="fa fa-check main-b-color "></i> Furniture<span>(15)</span></a>
                             
                     
                           </div>
                          </div>
                   </div>
                   <div class="categories-box sidebar-categores-box">
                         <div class="section-title">
                           <h5 class="font-weight-bold">COLOR</h5>
                         </div>
                          <div class="sidebar-categores-inner">
                           <div class="filter-group">
                             
                             
                             <a class="" href="best-sellers.html"><i class="fa fa-check main-b-color "></i> red<span>(16)</span></a>
                             
                             <a class="" href="camera.html"><i class="fa fa-check main-b-color "></i> green <span>(21)</span></a>
                             
                             <a class="" href="deal.html"><i class="fa fa-check main-b-color "></i> blue <span>(15)</span></a>
                             
                             <a class="" href="featured.html"><i class="fa fa-check main-b-color "></i> white <span>(16)</span></a>
                             
                             <a class="" href="new-arrivals.html"><i class="fa fa-check main-b-color "></i> yellow<span>(15)</span></a>
                             <a class="" href="new-arrivals.html"><i class="fa fa-check main-b-color "></i> black<span>(15)</span></a>
                             
                     
                           </div>
                          </div>
                   </div>
                   <div class="categories-box sidebar-categores-box">
                         <div class="section-title">
                           <h5 class="font-weight-bold">SIZE</h5>
                         </div>
                        <sizefilter></sizefilter>
                   </div>
              </div>
          </div>
      </div>
    </div> 
    <!--main product content-->

    </div>
@endsection