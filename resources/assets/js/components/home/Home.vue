<template>
 
    <div  class="glob-home">
     <div class="container center-home pt-5 pb-5">
       <div class="row">
         <div class="col-lg-4 d-md-hide d-xs-hide">
           <ul class="navbar-nav ">
            <!-- the cataloque -->
            <catalogue></catalogue>
             
             </ul>
         </div>
        
         <div class="col-lg-4 col-md-6 about-our-services">
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
         <div class="col-lg-4 col-md-6 you-may-like mt-5 mt-md-0">
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
                     <div v-for="(p,i) in youmaylike1" :key="i">
                     <div class="media p-3"  >
                         <img class="mr-3" :src="p.images[0]" alt="product image">
                         <div class="media-body">
                           <h6 class="mt-0 p-name">
                             <a :href="'/products/'+p.sku" target="_blink">{{p.name.en}}</a>
                           </h6>
                           <h5><strong class="text-danger">
                             {{currencySign}}{{ (currencyRate * (p.variations[0].sale_price)).toFixed(2)}}
                             </strong> 
                             <i class="fa fa-shopping-cart " @click="addToCart(p,$event)"></i>
                           </h5> 
                          
                         </div>
                         
                     </div>
                     <hr style="width: 90%;" class="m-auto">
                     </div>
                  
                 </div>
                 <div class="carousel-item">
                     <div v-for="(p,i) in youmaylike2" :key="i">
                     <div class="media p-3"  >
                         <img class="mr-3" :src="p.images[0]" alt="product image">
                         <div class="media-body">
                           <h6 class="mt-0 p-name">
                             <a :href="'/products/'+p.sku" target="_blink">{{p.name.en}}</a>
                           </h6>
                           <h5><strong class="text-danger">
                             {{currencySign}}{{ (currencyRate * (p.variations[0].sale_price)).toFixed(2)}}
                             </strong> 
                             <i class="fa fa-shopping-cart " @click="addToCart(p,$event)"></i>
                           </h5> 
                          
                         </div>
                         
                     </div>
                     <hr style="width: 90%;" class="m-auto">
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
     <div class="you-may-like categories-options container mb-3 pb-5">
         <div class="p-3 bg-white position-relative">
             <h5 class="section-t">CATEGORIES
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
                    <div class="col-md-3 col-sm-4" v-for="(c,key) in catslider1 " :key="key">
                      <div class="single-category">
                        <a href="/products" target="_blink">
                          <img @mouseenter="setCurrentCategory(c.name.en)" :src="'https://app.knawat.com/images/categories/empty.svg'" alt="">
                        </a>
                        <h6 @mouseenter="setCurrentCategory(c.name.en)" class="p-name"><a href="/products" target="_blink">{{c.name.en}}</a></h6>
                      </div>
                    </div>
                    
                  </div>
               </div>
               <div class="carousel-item">
                   <div class="row bg-white">
                       <div class="col-md-3 col-sm-4" v-for="(c,key) in catslider2 " :key="key">
                         <div class="single-category" >
                           <a href="/products" target="_blink" >
                             <img @mouseenter="setCurrentCategory(c.name.en)" :src="'https://app.knawat.com/images/categories/empty.svg'" alt="">
                           </a>
                           <h6 @mouseenter="setCurrentCategory(c.name.en)" ><a href="/products" target="_blink">{{c.name.en}}</a></h6>
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
     <div class="container products-link  mb-5" style="max-height: 300px">
       <a href="/products" target="_blink">
           <img src="/img/shop.jpg" class="w-100" alt="all product image link">
       </a>
       
     </div>
     <!--the all product image link-->
 
       <!--featured products-->
     <div class="container  mb-3 ft-p ">
    
       <div class="p-3 bg-white">
           <h5 class="section-t">FEATURED PRODUCTS
                 <a class="carousel-control-next carousel-control" href="#ft-pC" role="button" data-slide="next">
                   <i class="fa fa-chevron-right carousel-chevron" aria-hidden="true"></i>
                   <span class="sr-only">Next</span>
                 </a>
                 <a class="carousel-control-prev carousel-control" href="#ft-pC" role="button" data-slide="prev">
                 
                   <i class="fa fa-chevron-left carousel-chevron" aria-hidden="true"></i>
                   <span class="sr-only ">Previous</span>
                 </a>
                 
           </h5>
           <hr style="width: 97%;" class="m-auto">
       </div>
       <div class="featured-slider shop-product-wrap bg-white mb-3">
             
           <div id="ft-pC" class="carousel slide" data-ride="carousel">
             <div class="carousel-inner pb-4">
                 <div class="carousel-item active">
                    <div class="row m-0">    
                      <div class="col-lg-3 col-md-4 col-12" v-for="(p,index) in allproducts.slice(0,4)" :key="index">
                                   <div class=" single-product-item" >
                                   <img onerror="this.onerror=null; this.src='/img/notfound.png'" 
                                    :src="p.images[0]" class="card-img-top" alt="...">
                                       <a v-if="checkItemIsInCart(p.sku)"  class="btn incartbtn add-to-cart-btn" >In cart 
                                          <i class="fa fa-check text-light" style="position:relative;top:2px"></i>
                                       </a>
                                       <a v-else class="btn btn-primary add-to-cart-btn"
                                       @click="addToCart(p,$event)" >Add to cart</a>
                                 
                                   <div class="sale-title label-product">Sale</div>
                                   <div class="percent-count label-product bg-danger ">-15%</div>
                                   <div class="action-links">
 
                                    <a class="wishlist action-btn btn-wishlist" 
                                    :class="(favoritedProducts.indexOf(p.sku) >-1) ? 'favorited' : ''" 
                                    :datasku="p.sku" @click.stop="addPToFavorite(p.sku,$event)" 
                                     title="Wishlist">
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
                                           <a :href="'/products/'+p.sku" target="_blink">{{index}}. {{p.name.en}}</a>
                                       </h4>
                                       <div class="price-box text-center">
                                         <span class="new-price">
                                             <span class="money" data-currency-usd="$110.00">
                                               {{currencySign}}{{ (currencyRate * (p.variations[0].sale_price)).toFixed(2)}}
                                             </span>
                                         </span>
                                         
                                         <!-- <span class="old-price">
                                             <span class="money" data-currency-usd="$130.00">$130.00</span>
                                         </span> -->
                                         
                                       </div>
                                  </div>
                      </div>
                    </div>    
                 </div>
                 <div class="carousel-item">
                    <div class="row m-0">
                      <div class="col-lg-3 col-md-4 col-12" v-for="(p,index) in allproducts.slice(4,8)" :key="index">
                                   <div class=" single-product-item" >
                                   <img onerror="this.onerror=null; this.src='/img/notfound.png'" 
                                    :src="p.images[0]" class="card-img-top" alt="...">
                                       <a v-if="checkItemIsInCart(p.sku)"  class="btn incartbtn add-to-cart-btn" >In cart 
                                          <i class="fa fa-check text-light" style="position:relative;top:2px"></i>
                                       </a>
                                       <a v-else class="btn btn-primary add-to-cart-btn"
                                       @click="addToCart(p,$event)" >Add to cart</a>
                                 
                                   <div class="sale-title label-product">Sale</div>
                                   <div class="percent-count label-product bg-danger ">-15%</div>
                                   <div class="action-links">
 
                                    <a class="wishlist action-btn btn-wishlist" 
                                    :class="(favoritedProducts.indexOf(p.sku) >-1) ? 'favorited' : ''" 
                                    :datasku="p.sku" @click.stop="addPToFavorite(p.sku,$event)" 
                                     title="Wishlist">
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
                                           <a :href="'/products/'+p.sku" target="_blink">{{index}}. {{p.name.en}}</a>
                                       </h4>
                                       <div class="price-box text-center">
                                         <span class="new-price">
                                             <span class="money" data-currency-usd="$110.00">
                                               {{currencySign}}{{ (currencyRate * (p.variations[0].sale_price)).toFixed(2)}}
                                             </span>
                                         </span>
                                         
                                         <!-- <span class="old-price">
                                             <span class="money" data-currency-usd="$130.00">$130.00</span>
                                         </span> -->
                                         
                                       </div>
                                  </div>
                      </div>  
                    </div>
                 </div>
                 <div class="carousel-item">
                    <div class="row m-0">
                      <div class="col-lg-3 col-md-4 col-12" v-for="(p,index) in allproducts.slice(8,12)" :key="index">
                                   <div class=" single-product-item" >
                                   <img onerror="this.onerror=null; this.src='/img/notfound.png'" 
                                    :src="p.images[0]" class="card-img-top" alt="...">
                                       <a v-if="checkItemIsInCart(p.sku)"  class="btn incartbtn add-to-cart-btn" >In cart 
                                          <i class="fa fa-check text-light" style="position:relative;top:2px"></i>
                                       </a>
                                       <a v-else class="btn btn-primary add-to-cart-btn"
                                       @click="addToCart(p,$event)" >Add to cart</a>
                                 
                                   <div class="sale-title label-product">Sale</div>
                                   <div class="percent-count label-product bg-danger ">-15%</div>
                                   <div class="action-links">
 
                                    <a class="wishlist action-btn btn-wishlist" 
                                    :class="(favoritedProducts.indexOf(p.sku) >-1) ? 'favorited' : ''" 
                                    :datasku="p.sku" @click.stop="addPToFavorite(p.sku,$event)" 
                                     title="Wishlist">
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
                                           <a :href="'/products/'+p.sku" target="_blink">{{index}}. {{p.name.en}}</a>
                                       </h4>
                                       <div class="price-box text-center">
                                         <span class="new-price">
                                             <span class="money" data-currency-usd="$110.00">
                                               {{currencySign}}{{ (currencyRate * (p.variations[0].sale_price)).toFixed(2)}}
                                             </span>
                                         </span>
                                         
                                         <!-- <span class="old-price">
                                             <span class="money" data-currency-usd="$130.00">$130.00</span>
                                         </span> -->
                                         
                                       </div>
                                  </div>
                      </div>  
                    </div>
                 </div>
             </div>
             <a class="carousel-control-prev" href="#ft-pC" role="button" data-slide="prev">
                 <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                 <span class="sr-only">Previous</span>
             </a>
             <a class="carousel-control-next" href="#ft-pC" role="button" data-slide="next">
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
         <div class="col-sm-6 col-md-4 you-may-like SHIRTS mb-3">
             <div class="p-3 bg-white ">
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
                        <div v-for="(p,k) in ShirtsProducts1" :key="k">
                            <div class="media p-3" >
                            <img class="mr-3" :src="p.images[0]" alt="product image">
                            <div class="media-body">
                              <div class="p-rate mb-2">
                                    <i class="fa fa-star-o main-b-color"></i>
                                    <i class="fa fa-star-o main-b-color"></i>
                                    <i class="fa fa-star-o main-b-color"></i>
                                    <i class="fa fa-star-o main-b-color"></i>
                                    <i class="fa fa-star-o main-b-color"></i>
                              </div>
                              <h6 class="mt-0 product-name mb-2"><a :href="'/products/'+p.sku" target="_blink">{{p.name.en}}</a> </h6>
                              <h5><strong class="text-danger">
                                {{currencySign}}{{ (currencyRate * (p.variations[0].sale_price)).toFixed(2)}}
                                </strong> 
                                
                              </h5> 
                              
                            </div>
                            
                            </div>
                             <hr style="width: 90%;" class="m-auto">
                        </div>
                   </div>
                   <div class="carousel-item" v-show="ShirtsProducts2.length > 0">
                        <div v-for="(p,k) in ShirtsProducts2" :key="k">
                            <div class="media p-3" >
                            <img class="mr-3" :src="p.images[0]" alt="product image">
                            <div class="media-body">
                              <div class="p-rate mb-2">
                                    <i class="fa fa-star-o main-b-color"></i>
                                    <i class="fa fa-star-o main-b-color"></i>
                                    <i class="fa fa-star-o main-b-color"></i>
                                    <i class="fa fa-star-o main-b-color"></i>
                                    <i class="fa fa-star-o main-b-color"></i>
                              </div>
                              <h6 class="mt-0 product-name mb-2"><a :href="'/products/'+p.sku" target="_blink">{{p.name.en}}</a> </h6>
                              <h5><strong class="text-danger">
                                {{currencySign}}{{ (currencyRate * (p.variations[0].sale_price)).toFixed(2)}}
                                </strong> 
                                
                              </h5> 
                              
                            </div>
                            
                            </div>
                             <hr style="width: 90%;" class="m-auto">
                        </div>
                   </div>
                 </div>
  
             </div>
             <!--the carousel of product -->
              
         </div>
         <div class="col-sm-6 col-md-4 you-may-like PHONE mb-3">
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
                      <div v-for="(p,k) in PhoneProducts1" :key="k">
                            <div class="media p-3" >
                            <img class="mr-3" :src="p.images[0]" alt="product image">
                            <div class="media-body">
                              <div class="p-rate mb-2">
                                    <i class="fa fa-star-o main-b-color"></i>
                                    <i class="fa fa-star-o main-b-color"></i>
                                    <i class="fa fa-star-o main-b-color"></i>
                                    <i class="fa fa-star-o main-b-color"></i>
                                    <i class="fa fa-star-o main-b-color"></i>
                              </div>
                              <h6 class="mt-0 product-name mb-2"><a :href="'/products/'+p.sku" target="_blink">{{p.name.en}}</a> </h6>
                              <h5><strong class="text-danger">
                                {{currencySign}}{{ (currencyRate * (p.variations[0].sale_price)).toFixed(2)}}
                                </strong> 
                                
                              </h5> 
                              
                            </div>
                            
                            </div>
                             <hr style="width: 90%;" class="m-auto">
                      </div>   
                   </div>
                   
                   <div class="carousel-item" v-show="PhoneProducts2.length > 0">
                        <div v-for="(p,k) in PhoneProducts2" :key="k">
                            <div class="media p-3" >
                            <img class="mr-3" :src="p.images[0]" alt="product image">
                            <div class="media-body">
                              <div class="p-rate mb-2">
                                    <i class="fa fa-star-o main-b-color"></i>
                                    <i class="fa fa-star-o main-b-color"></i>
                                    <i class="fa fa-star-o main-b-color"></i>
                                    <i class="fa fa-star-o main-b-color"></i>
                                    <i class="fa fa-star-o main-b-color"></i>
                              </div>
                              <h6 class="mt-0 product-name mb-2"><a :href="'/products/'+p.sku" target="_blink">{{p.name.en}}</a> </h6>
                              <h5><strong class="text-danger">
                                {{currencySign}}{{ (currencyRate * (p.variations[0].sale_price)).toFixed(2)}}
                                </strong> 
                                
                              </h5> 
                              
                            </div>
                            
                            </div>
                             <hr style="width: 90%;" class="m-auto">
                        </div>
                   </div>
                 </div>
                
              </div>
             <!--the carousel of product -->
              
         </div>
         <div class="col-sm-6 col-md-4 you-may-like joinus mb-3">
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
  </div>
 
</template>
<script>


import mixins from '../../mixins/mixins.js';
import currencyMixins from '../../mixins/currencyMixins.js';
import categoryMixins from '../../mixins/categoryMixins';
import {catalogue} from './Catalogue';

export default {
   data(){
       return {
         products :[],
         categories :[], 
         restOfCategories :[] ,
         youmaylike1:[],
         youmaylike2:[],
         catslider1:[],
         catslider2:[],
         ShirtsProducts1:[],
         ShirtsProducts2:[],
         PhoneProducts1:[],
         PhoneProducts2:[],
       }
   },
   mixins:[mixins,currencyMixins,categoryMixins],
   mounted(){
     this.getFirstProducts();
   },
   methods:{
      getFirstProducts(){
          let sessionproducts = sessionStorage.getItem('products');
           if((sessionproducts != null) && (sessionproducts !='undefined')){
            
              this.$store.state.products = JSON.parse(sessionproducts)
              this.$store.state.currentProducts = JSON.parse(sessionproducts).splice(1,10)
              
              this.shuffleYouMayLike();
              this.setCategories();
              this.shuffleCategories();
              this.setPhoneProducts();
              this.setShirtsProducts();
           }else{
              this.fetchfirstProducts();
              
           }
           
            
     },
      shuffleYouMayLike(){
       
       this.currentProducts.sort(() => Math.random() - 0.5);
       this.youmaylike1 = this.currentProducts.slice(0,3);
       this.youmaylike2 = this.currentProducts.slice(3,6);
          
          //this.shuffleCategories();
         
       
      
       
     },
     shuffleCategories(){
       let c = [];
       if(this.allcategories.length > 0){ c = this.allcategories;}else{c = this.categories}
       this.catslider1 = c.slice(0,4);
       this.catslider2 = c.slice(4,7);
       
     },
     setShirtsProducts(){
       
        let products = this.$store.state.products;
          let types = ['Shirts','T-Shirts'];
          let fil = products
          .filter((element) => 
              element.categories.some((c) => (c.name.en == types[0]) || (c.name.en == types[1])))
          .map(element => {
              return Object.assign({}, element, {categories : element.categories.filter(subElement => (subElement.name.en == types[0] || (subElement.name.en == types[1])))});

          }); 
          this.ShirtsProducts1 = fil.slice(0,3);;
          this.ShirtsProducts2 = fil.slice(3,6);
     },
     setPhoneProducts(){
       
        let products = this.$store.state.products;
        let types = ["Cell Phone Accessories","Screen Protectors","Cell Phones & Accessories",
        "Watches, Parts & Accessories"]
          let fil = products
          .filter((element) => 
              element.categories.some((c) => {
                 return ((c.name.en == types[0]) || 
                    (c.name.en == types[1]) || (c.name.en == types[2])
                    || (c.name.en == types[3])
                 )}
               ))
          .map(element => {
              return Object.assign({}, element, {categories : element.categories.filter(subElement => {
                return (
                  (subElement.name.en == types[0]) || (subElement.name.en == types[1]) ||
                  (subElement.name.en == types[2]) || (subElement.name.en == types[3]) 
                )
              })});

          }); 
          this.PhoneProducts1 = fil.slice(0,3);
          this.PhoneProducts2 = fil.slice(3,6);
     }
   },
   computed:{

        favoritedProducts(){
            return this.$store.state.favoritedProducts;
        }
   }

}
     
    /*/ toggle to the rest of categories button */
$(document).ready(function(){
    $('.center-home #allcategory').on('click',function(e){
      e.preventDefault();
      $(this).siblings('ul').toggleClass('show');

    })

  $('.dropdown-submenu a.test').on("mouseenter", function(e){
   console.log('mouseenter')
    $(this).siblings('ul').toggleClass('show');
   
  });
   
});
</script>