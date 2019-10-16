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
                                       <a title="shop now" href="/collections/all" class="shop-btn">shop now</a>
                                       </div>
                                   </div>
                   </div>
                 </div>
                 <div class="carousel-item row justify-content-end" style="    background-image: url(img/mobilec.jpg);">
                     <div class="col-lg-7 col-md-8 text-center ml-md-auto ">
                         <div class="slider-text-info">
                             <h1 class="title-1">NEW ELECTRONIC &</h1>
                             <h2 class="title-2">MOBILE ACCESSORIES</h2>
                             <div class="slider-1-des slider-2-des">
                             <p>get up to <span>40% off</span></p>
                             </div>
                             <div class="slier-btn-1">
                             <a title="shop now" href="/collections/all" class="shop-btn">shop now</a>
                             </div>
                         </div>
                     </div>
                 </div>
                 </div>
                 
               </div>
              
           </div>
       </div>
       <div class="container center-home pt-5 pb-5">
         <div class="row">
           <div class="col-lg-4 d-md-hide d-xs-hide">
             <ul class="navbar-nav ">
   
             
               <li class="nav-item dropdown text-light d-none d-lg-inline-block open"><a href="#" id="allcategory" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link main-r-bg ">
                   All Categories   
                 </a> <ul class="dropdown-menu"><li class="dropdown-item"><a tabindex="-1">Men's Shoes</a></li><li class="dropdown-item"><a tabindex="-1">Jewelry &amp; Accessories</a></li><li class="dropdown-item"><a tabindex="-1">Kids' Accessories</a></li><li class="dropdown-item"><a tabindex="-1">Clothing</a></li><li class="dropdown-item"><a tabindex="-1">Men's Clothing</a></li><li class="dropdown-item"><a tabindex="-1">Men's Clothing</a></li><li class="dropdown-item"><a tabindex="-1">Clothing, Shoes &amp; Accessories</a></li><li class="dropdown-item"><a tabindex="-1">Coats &amp; Jackets</a></li><li class="dropdown-item"><a tabindex="-1">Casual Button-Down Shirts</a></li><li class="dropdown-item"><a tabindex="-1">Shirts</a></li> <li class="dropdown-submenu"><a tabindex="-1" class="test dropdown-item">
                           More <i class="fa fa-caret-right float-right"></i></a> <ul id="showrc" class="dropdown-menu" style="left: 103%; margin-top: -139%;"><li class="dropdown-item"><a>
                              Shirts
                          </a></li><li class="dropdown-item"><a>
                              Pants
                          </a></li><li class="dropdown-item"><a>
                              Boy's Clothing
                          </a></li><li class="dropdown-item"><a>
                              T-Shirts
                          </a></li><li class="dropdown-item"><a>
                              Ties, Bow Ties &amp; Cravats
                          </a></li><li class="dropdown-item"><a>
                              Vintage
                          </a></li><li class="dropdown-item"><a>
                              Vintage Accessories
                          </a></li><li class="dropdown-item"><a>
                              Cell Phone Accessories
                          </a></li><li class="dropdown-item"><a>
                              Cell Phones &amp; Accessories
                          </a></li><li class="dropdown-item"><a>
                              Screen Protectors
                          </a></li><li class="dropdown-item"><a>
                              Jewelry &amp; Watches
                          </a></li><li class="dropdown-item"><a>
                              Watches, Parts &amp; Accessories
                          </a></li><li class="dropdown-item"><a>
                              Wristwatches
                          </a></li></ul></li></ul>
                 </li>
               </ul>
           </div>
           <div class="col-12 d-block d-lg-none mb-20">
               some text eher
           </div>
           <div class="col-lg-4 col-md-6 bg-white about-our-services">
               <div class="media p-3">
                   
                   <div class="media-body">
                     <h6 class="mt-0">
                       <i class="fa fa-heart-o fa-2x"></i>
                       <strong>700+</strong> Clients Love Us
                     </h6>
                     We offer best service and great prices on high quality products
                   </div>
               </div>
               <hr style="width:95%;" class="m-auto">
               <div class="media p-3">
                   
                   <div class="media-body">
                     <h6 class="mt-0">
                         <i class="fa fa-globe fa-lg"></i>
                       Shipping To <strong>185</strong> Countries
                     </h6>
                     Our store operates worldwide and you can enjoy free delivery to all orders
                   </div>
               </div>
               <hr style="width:95%;" class="m-auto">
               <div class="media p-3">
                   <div class="media-body">
                     <h6 class="mt-0">
                       <i class="fa fa-credit-card fa-lg"  aria-hidden="true"></i>
                       <strong>100%</strong> Safe Payment
                     </h6>
                     We offer best service and great prices on high quality products
                   </div>
               </div>
           </div>
           <!--you may like-->
           <div class="col-lg-4 col-md-6 you-may-like ">
             <div class="p-3 bg-white">
                 <h5 class="section-t">YOU MAY LIKE
                       <a class="carousel-control-prev carousel-control" href="#carouselExampleControls" role="button" data-slide="prev">
                       
                         <i class="fa fa-chevron-left carousel-chevron" aria-hidden="true"></i>
                         <span class="sr-only ">Previous</span>
                       </a>
                       <a class="carousel-control-next carousel-control" href="#carouselExampleControls" role="button" data-slide="next">
                         <i class="fa fa-chevron-right carousel-chevron" aria-hidden="true"></i>
                         <span class="sr-only">Next</span>
                       </a>
                 </h5>
                 <hr style="width: 90%;" class="m-auto">
             </div>
             <!--the carousel of product -->
             <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                 <div class="carousel-inner">
                   <div class="carousel-item active">
                       <div class="media p-3">
                           <img class="mr-3" src="/img/1.jpg" alt="Generic placeholder image">
                           <div class="media-body">
                             <h6 class="mt-0">Product title</h6>
                             <h5><strong class="text-danger">$98</strong> 
                               <i class="fa fa-shopping-cart "></i>
                             </h5> 
                            
                           </div>
                           
                       </div>
                       <hr style="width: 90%;" class="m-auto">
                       <div class="media p-3">
                           <img class="mr-3" src="/img/1.jpg" alt="Generic placeholder image">
                           <div class="media-body">
                             <h6 class="mt-0">Product title</h6>
                             <h5><strong class="text-danger">$98</strong> 
                               <i class="fa fa-shopping-cart "></i>
                             </h5> 
                            
                           </div>
                       </div>
                       <hr style="width:90%;" class="m-auto">
                       <div class="media p-3">
                           <img class="mr-3" src="/img/1.jpg" alt="Generic placeholder image">
                           <div class="media-body">
                             <h6 class="mt-0">Product title</h6>
                             <h5><strong class="text-danger">$98</strong> 
                               <i class="fa fa-shopping-cart "></i>
                             </h5> 
                            
                           </div>
                       </div>
                   </div>
                   <div class="carousel-item">
                       <div class="media p-3">
                           <img class="mr-3" src="/img/4.jpg" alt="Generic placeholder image">
                           <div class="media-body">
                             <h6 class="mt-0">Product title</h6>
                             <h5><strong class="text-danger">$98</strong> 
                               <i class="fa fa-shopping-cart "></i>
                             </h5> 
                            
                           </div>
                       </div>
                   </div>
                 </div>
                 <!-- <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                   <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                   <span class="sr-only">Previous</span>
                 </a>
                 <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                   <span class="carousel-control-next-icon" aria-hidden="true"></span>
                   <span class="sr-only">Next</span>
                 </a> -->
               </div>
             <!--the carousel of product -->
              
           </div>
         </div>
       </div>
       <!--the categories-->
       <div class="you-may-like categories-options container mb-3 pb-3">
           <div class="p-3 bg-white">
               <h5 class="section-t">YOU MAY LIKE
                     <a class="carousel-control-next carousel-control" href="#carouselcategories" role="button" data-slide="next">
                       <i class="fa fa-chevron-right carousel-chevron" aria-hidden="true"></i>
                       <span class="sr-only">Next</span>
                     </a>
                     <a class="carousel-control-prev carousel-control" href="#carouselcategories" role="button" data-slide="prev">
                     
                       <i class="fa fa-chevron-left carousel-chevron" aria-hidden="true"></i>
                       <span class="sr-only ">Previous</span>
                     </a>
                     
               </h5>
               <hr style="width: 97%;" class="m-auto">
           </div>
           <!--the carousel of product -->
           <div id="carouselcategories" class="carousel slide" data-ride="carousel">
               <div class="carousel-inner">
                 <div class="carousel-item active">
                    <div class="row bg-white">
                      <div class="col-md-3 col-sm-4">
                        <div class="single-category">
                          <a href="#" target="_blink"><img src="/img/3.jpg" alt=""></a>
                          <h6><a href="#" target="_blink">category name</a></h6>
                        </div>
                      </div>
                      <div class="col-md-3 col-sm-4">
                         <div class="single-category">
                           <a href="#" target="_blink"><img src="/img/3.jpg" alt=""></a>
                           <h6><a href="#" target="_blink">category name</a></h6>
                         </div>
                       </div>
                       <div class="col-md-3 col-sm-4">
                        <div class="single-category">
                          <a href="#" target="_blink"><img src="/img/3.jpg" alt=""></a> 
                          <h6><a href="#" target="_blink">category name</a></h6>
                        </div>
                       </div>
                       <div class="col-md-3 col-sm-4">
                        <div class="single-category">
                          <a href="#" target="_blink"><img src="/img/3.jpg" alt=""></a>
                          <h6><a href="#" target="_blink">category name</a></h6>
                        </div>
                       </div>
                    </div>
                 </div>
                 <div class="carousel-item">
                     <div class="row bg-white">
                         <div class="col-md-3 col-sm-4">
                           <div class="single-category">
                             <a href="#" target="_blink"><img src="/img/3.jpg" alt=""></a>
                             <h6><a href="#" target="_blink">category name</a></h6>
                           </div>
                         </div>
                         <div class="col-md-3 col-sm-4">
                           <div class="single-category">
                             <a href="#" target="_blink"><img src="/img/3.jpg" alt=""></a>
                             <h6><a href="#" target="_blink">category name</a></h6>
                           </div>
                         </div>
                     </div>
                     
                 </div>
               </div>
               <!-- <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                 <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                 <span class="sr-only">Previous</span>
               </a>
               <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                 <span class="carousel-control-next-icon" aria-hidden="true"></span>
                 <span class="sr-only">Next</span>
               </a> -->
             </div>
           <!--the carousel of product -->
            
       </div>
       <!--the categories-->
       <!--the all product image link-->
       <div class="container products-link mt-2" style="max-height: 300px">
         <a href="#">
             <img src="/img/shop.jpg" class="w-100" alt="all product image link">
         </a>
         
       </div>
       <!--the all product image link-->
   
         <!--featured products-->
       <div class="container mt-3 mb-3 ft-p ">
      
         <div class="p-3 bg-white">
             <h5 class="section-t">FeaTURED PRODUCTS
                   <a class="carousel-control-next carousel-control" href="#carouselcategories" role="button" data-slide="next">
                     <i class="fa fa-chevron-right carousel-chevron" aria-hidden="true"></i>
                     <span class="sr-only">Next</span>
                   </a>
                   <a class="carousel-control-prev carousel-control" href="#carouselcategories" role="button" data-slide="prev">
                   
                     <i class="fa fa-chevron-left carousel-chevron" aria-hidden="true"></i>
                     <span class="sr-only ">Previous</span>
                   </a>
                   
             </h5>
             <hr style="width: 97%;" class="m-auto">
         </div>
         <div class="featured-slider shop-product-wrap bg-white pb-3">
               
             <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
               <div class="carousel-inner">
                   <div class="carousel-item active">
                           <div class="row m-0">
                                   <div class="col-lg-3 col-md-4 col-12">
                                     <div class=" single-product-item" >
                                     <img src="img/1.jpg" class="card-img-top" alt="...">
                                     
                                         <a href="#" class="btn btn-primary add-to-cart-btn">Add to cart</a>
                                   
                                     <div class="sale-title label-product">Sale</div>
                                     <div class="percent-count label-product bg-danger ">-15%</div>
                                     <div class="action-links">
   
   
   
                                     <a class="wishlist action-btn btn-wishlist" href="" title="Wishlist">
                                       <i class="fa fa-heart-o fa-lg text-white"></i>
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
                                   <div class="col-lg-3 col-md-4 col-12">
                                     <div class=" single-product-item" >
                                     <img src="img/2.jpg" class="card-img-top" alt="...">
                                     
                                         <a href="#" class="btn btn-primary add-to-cart-btn">Add to cart</a>
                                   
                                     <div class="sale-title label-product">Sale</div>
                                     <div class="percent-count label-product bg-danger ">-15%</div>
                                     <div class="action-links">
   
   
   
                                     <a class="wishlist action-btn btn-wishlist" href="" title="Wishlist">
                                       <i class="fa fa-heart fa-lg"></i>
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
                                   <div class="col-lg-3 col-md-4 col-12">
                                     <div class=" single-product-item" >
                                     <img src="img/3.jpg" class="card-img-top" alt="...">
                                     
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
                   <div class="carousel-item">
                           <div class="col-lg-3 col-md-4 col-12">
                                   <div class=" single-product-item" >
                                   <img src="img/1.jpg" class="card-img-top" alt="...">
                                   
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
       </div>
        <!--/featured products-->
        <!--some categories-->
       <div class="container mt-5 mb-3">
         <div class="row">
           <div class="col-sm-6 col-md-4 you-may-like SHIRTS">
               <div class="p-3 bg-white">
                   <h5 class="section-t">SHIRTS
                         <a class="carousel-control-prev carousel-control" href="#shirts" role="button" data-slide="prev">
                         
                           <i class="fa fa-chevron-left carousel-chevron" aria-hidden="true"></i>
                           <span class="sr-only ">Previous</span>
                         </a>
                         <a class="carousel-control-next carousel-control" href="#shirts" role="button" data-slide="next">
                           <i class="fa fa-chevron-right carousel-chevron" aria-hidden="true"></i>
                           <span class="sr-only">Next</span>
                         </a>
                   </h5>
                   <hr style="width: 90%;" class="m-auto">
               </div>
               <!--the carousel of product -->
               <div id="shirts" class="carousel slide" data-ride="carousel">
                   <div class="carousel-inner">
                     <div class="carousel-item active">
                         <div class="media p-3">
                             <img class="mr-3" src="/img/1.jpg" alt="Generic placeholder image">
                             <div class="media-body">
                               <div class="p-rate mb-2">
                                     <i class="fa fa-star-o main-b-color"></i>
                                     <i class="fa fa-star-o main-b-color"></i>
                                     <i class="fa fa-star-o main-b-color"></i>
                                     <i class="fa fa-star-o main-b-color"></i>
                                     <i class="fa fa-star-o main-b-color"></i>
                               </div>
                               <h6 class="mt-0 product-name mb-2"><a href="">Product title</a> </h6>
                               <h5><strong class="text-danger">$98</strong> 
                                 
                               </h5> 
                              
                             </div>
                             
                         </div>
                         <hr style="width: 90%;" class="m-auto">
                         <div class="media p-3">
                             <img class="mr-3" src="/img/1.jpg" alt="Generic placeholder image">
                             <div class="media-body">
                               <div class="p-rate mb-2">
                                     <i class="fa fa-star-o main-b-color"></i>
                                     <i class="fa fa-star-o main-b-color"></i>
                                     <i class="fa fa-star-o main-b-color"></i>
                                     <i class="fa fa-star-o main-b-color"></i>
                                     <i class="fa fa-star-o main-b-color"></i>
                               </div>
                               <h6 class="mt-0 product-name mb-2"><a href="">Product title</a> </h6>
                               <h5><strong class="text-danger">$98</strong> 
                                 
                               </h5> 
                              
                             </div>
                         </div>
                         <hr style="width:90%;" class="m-auto">
                         <div class="media p-3">
                             <img class="mr-3" src="/img/1.jpg" alt="Generic placeholder image">
                             <div class="media-body">
                               <div class="p-rate mb-2">
                                     <i class="fa fa-star-o main-b-color"></i>
                                     <i class="fa fa-star-o main-b-color"></i>
                                     <i class="fa fa-star-o main-b-color"></i>
                                     <i class="fa fa-star-o main-b-color"></i>
                                     <i class="fa fa-star-o main-b-color"></i>
                               </div>
                               <h6 class="mt-0 product-name mb-2"><a href="">Product title</a> </h6>
                               <h5><strong class="text-danger">$98</strong> 
                                 
                               </h5> 
                              
                             </div>
                         </div>
                     </div>
                     <div class="carousel-item">
                         <div class="media p-3">
                             <img class="mr-3" src="/img/4.jpg" alt="Generic placeholder image">
                             <div class="media-body">
                               <div class="p-rate mb-2">
                                     <i class="fa fa-star-o main-b-color"></i>
                                     <i class="fa fa-star-o main-b-color"></i>
                                     <i class="fa fa-star-o main-b-color"></i>
                                     <i class="fa fa-star-o main-b-color"></i>
                                     <i class="fa fa-star-o main-b-color"></i>
                               </div>
                               <h6 class="mt-0 product-name mb-2"><a href="">Product title</a> </h6>
                               <h5><strong class="text-danger">$98</strong> 
                                 
                               </h5> 
                              
                             </div>
                         </div>
                     </div>
                   </div>
   
                   </a> 
                 </div>
               <!--the carousel of product -->
                
           </div>
           <div class="col-sm-6 col-md-4 you-may-like PHONE ">
               <div class="p-3 bg-white">
                   <h5 class="section-t">PHONE & ACCESSORIES
                         <a class="carousel-control-prev carousel-control" href="#phonec" role="button" data-slide="prev">
                         
                           <i class="fa fa-chevron-left carousel-chevron" aria-hidden="true"></i>
                           <span class="sr-only ">Previous</span>
                         </a>
                         <a class="carousel-control-next carousel-control" href="#phonec" role="button" data-slide="next">
                           <i class="fa fa-chevron-right carousel-chevron" aria-hidden="true"></i>
                           <span class="sr-only">Next</span>
                         </a>
                   </h5>
                   <hr style="width: 90%;" class="m-auto">
               </div>
               <!--the carousel of product -->
               <div id="phonec" class="carousel slide" data-ride="carousel">
                   <div class="carousel-inner">
                     <div class="carousel-item active">
                         <div class="media p-3">
                             <img class="mr-3" src="/img/1.jpg" alt="Generic placeholder image">
                             <div class="media-body">
                                 <div class="p-rate mb-2">
                                     <i class="fa fa-star-o main-b-color"></i>
                                     <i class="fa fa-star-o main-b-color"></i>
                                     <i class="fa fa-star-o main-b-color"></i>
                                     <i class="fa fa-star-o main-b-color"></i>
                                     <i class="fa fa-star-o main-b-color"></i>
                               </div>
                               <h6 class="mt-0 product-name mb-2"><a href="">Product title</a> </h6>
                               <h5><strong class="text-danger">$98</strong> 
                               
                               </h5> 
                              
                             </div>
                             
                         </div>
                         <hr style="width: 90%;" class="m-auto">
                         <div class="media p-3">
                             <img class="mr-3" src="/img/1.jpg" alt="Generic placeholder image">
                             <div class="media-body">
                                 <div class="p-rate mb-2">
                                     <i class="fa fa-star-o main-b-color"></i>
                                     <i class="fa fa-star-o main-b-color"></i>
                                     <i class="fa fa-star-o main-b-color"></i>
                                     <i class="fa fa-star-o main-b-color"></i>
                                     <i class="fa fa-star-o main-b-color"></i>
                               </div>
                               <h6 class="mt-0 product-name mb-2"><a href="">Product title</a> </h6>
                               <h5><strong class="text-danger">$98</strong> 
                               
                               </h5> 
                              
                             </div>
                         </div>
                         <hr style="width:90%;" class="m-auto">
                         <div class="media p-3">
                             <img class="mr-3" src="/img/1.jpg" alt="Generic placeholder image">
                             <div class="media-body">
                                 <div class="p-rate mb-2">
                                     <i class="fa fa-star-o main-b-color"></i>
                                     <i class="fa fa-star-o main-b-color"></i>
                                     <i class="fa fa-star-o main-b-color"></i>
                                     <i class="fa fa-star-o main-b-color"></i>
                                     <i class="fa fa-star-o main-b-color"></i>
                               </div>
                               <h6 class="mt-0 product-name mb-2"><a href="">Product title</a> </h6>
                               <h5><strong class="text-danger">$98</strong> 
                               
                               </h5> 
                              
                             </div>
                         </div>
                     </div>
                     <div class="carousel-item">
                         <div class="media p-3">
                             <img class="mr-3" src="/img/4.jpg" alt="Generic placeholder image">
                             <div class="media-body">
                                 <div class="p-rate mb-2">
                                     <i class="fa fa-star-o main-b-color"></i>
                                     <i class="fa fa-star-o main-b-color"></i>
                                     <i class="fa fa-star-o main-b-color"></i>
                                     <i class="fa fa-star-o main-b-color"></i>
                                     <i class="fa fa-star-o main-b-color"></i>
                               </div>
                               <h6 class="mt-0 product-name mb-2"><a href="">Product title</a> </h6>
                               <h5><strong class="text-danger">$98</strong> 
                               
                               </h5> 
                              
                             </div>
                         </div>
                     </div>
                   </div>
                  
                 </div>
               <!--the carousel of product -->
                
           </div>
           <div class="col-sm-6 col-md-4 you-may-like joinus">
               <div class="p-3 bg-white">
                   <h5 class="section-t">JOIN US NOW </h5>
                   <hr style="width: 90%;" class="m-auto">
               </div>
               <ul class="social-link-follow pb-2 bg-white">
                   <li><a href="#" class="twitter"><i class="fa fa-twitter fa-lg"></i></a></li>                        
                   <li><a href="#" class="Youtube"><i class="fa fa-youtube fa-lg"></i></a></li>        
                   <li><a href="#" class="Facebook"><i class="fa fa-facebook fa-lg"></i></a></li>        
                   <li><a href="#" class="instagram"><i class="fa fa-instagram fa-lg"></i></a></li>        
               </ul>
                
           </div>
         </div>
       </div>
       <!--some categories-->
   
   
@endsection

@section('js')
<script>
    $('.center-home #allcategory').on('click',function(e){
      e.preventDefault();
      $(this).siblings('ul').toggleClass('show');

    })
  </script>
@endsection