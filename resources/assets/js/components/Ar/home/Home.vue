<template>
 
    <div  class="glob-home">
     <div class="container center-home pt-5 pb-5">
       <div class="row">
         <div class="col-lg-4 d-md-hide d-xs-hide">
           <ul class="navbar-nav ">
            <!-- the cataloque -->
            <cataloguear></cataloguear>
             
             </ul>
         </div>
        
         <div class="col-lg-4 col-md-6 about-our-services">
             <div class="media p-3">
                 
                 <div class="media-body">
                   <h6 class="mt-0">
                     <i class="fa fa-heart-o fa-2x"></i>
                     <strong>700+</strong>  من العملاء 
                   </h6>
                   نقدم لكم أفضل خدمة بأفضل سعر وجودة منتجات عالية
                 </div>
             </div>
             <hr style="width:95%;" class="m-auto">
             <div class="media p-3">
                 
                 <div class="media-body">
                   <h6 class="mt-0">
                       <i class="fa fa-globe fa-lg"></i>
                    التوصيل الى <strong>185</strong> بلد
                   </h6>
                    متاجرنا تخدم جميع العملاء في العالم ويمكنك الحصول على ايصال مجاني لجميع منتجاتك 
                 </div>
             </div>
             <hr style="width:95%;" class="m-auto">
             <div class="media p-3">
                 <div class="media-body">
                   <h6 class="mt-0">
                     <i class="fa fa-credit-card fa-lg"  aria-hidden="true"></i>
                      دفع آمن <strong> 100%</strong>
                   </h6>
                   نقدم لكم أفضل خدمة بأفضل سعر وجودة منتجات عالية
                 </div>
             </div>
         </div>
         <!--you may like-->
         <div class="col-lg-4 col-md-6 you-may-like mt-5 mt-md-0">
           <div class="p-3 bg-white">
               <h5 class="section-t">قد يعجبك
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
                             <a :href="'/products/'+p.sku" target="_blink">{{p.name.ar ? p.name.ar : p.name.en}}</a>
                           </h6>
                           <h5><strong class="text-danger">
                             {{currencySign}}{{ (currencyRate * (p.variations[0].sale_price)).toFixed(2)}}
                             </strong> 
                             <i class="fa fa-shopping-cart " @click="addToCartHome(p,$event)"></i>
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
                             <a :href="'/products/'+p.sku" target="_blink">{{p.name.ar ? p.name.ar : p.name.en}}</a>
                           </h6>
                           <h5><strong class="text-danger">
                             {{currencySign}}{{ (currencyRate * (p.variations[0].sale_price)).toFixed(2)}}
                             </strong> 
                             <i class="fa fa-shopping-cart " @click="addToCartHome(p,$event)"></i>
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
             <h5 class="section-t">التصنيفات
                   <a class="carousel-control-prev carousel-control" href="#carouselcategories" role="button" data-slide="prev">
                   
                     <i class="fa fa-chevron-left carousel-chevron" aria-hidden="true"></i>
                     <span class="sr-only ">Previous</span>
                   </a>
                   <a class="carousel-control-next carousel-control" href="#carouselcategories" role="button" data-slide="next">
                     <i class="fa fa-chevron-right carousel-chevron" aria-hidden="true"></i>
                     <span class="sr-only">Next</span>
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
                          <img @mouseenter="setCurrentCategory(c.name.en)" :src="getcatsrc(c.name.en)" alt="category image">
                        </a>
                        <h6 @mouseenter="setCurrentCategory(c.name.en)" class="p-name"><a href="/products" target="_blink">{{c.name.ar ? c.name.ar : c.name.en}}</a></h6>
                      </div>
                    </div>
                    
                  </div>
               </div>
               <div class="carousel-item">
                   <div class="row bg-white">
                       <div class="col-md-3 col-sm-4" v-for="(c,key) in catslider2 " :key="key">
                         <div class="single-category" >
                           <a href="/products" target="_blink" >
                             <img @mouseenter="setCurrentCategory(c.name.en)" :src="getcatsrc(c.name.en)" alt="category image">
                           </a>
                           <h6 @mouseenter="setCurrentCategory(c.name.en)" ><a href="/products" target="_blink">{{c.name.ar ? c.name.ar : c.name.en}}</a></h6>
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
       <a href="/products" target="_blink" id="all-product-img-link-lg" >
           <img src="/img/shop.jpg" class="w-100" alt="all product image link">
       </a>
       <a href="/products" target="_blink" id="all-product-img-link-sm" >
           <img src="/img/shopme.jpg" class="w-100" alt="all product image link">
       </a>
       
     </div>
     <!--the all product image link-->
 
       <!--featured products-->
     <div class="container  mb-3 ft-p ">
    
       <div class="p-3 bg-white">
           <h5 class="section-t">منتجات مخصصة
                 <a class="carousel-control-prev carousel-control" href="#ft-pC" role="button" data-slide="prev" style="    margin-right: 0;
                  ">
                 
                   <i class="fa fa-chevron-left carousel-chevron" aria-hidden="true"></i>
                   <span class="sr-only ">Previous</span>
                 </a>
                 <a class="carousel-control-next carousel-control" href="#ft-pC" role="button" data-slide="next">
                   <i class="fa fa-chevron-right carousel-chevron" aria-hidden="true"></i>
                   <span class="sr-only">Next</span>
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
                                       <a v-if="checkItemIsInCart(p.sku)"  class="btn incartbtn add-to-cart-btn" >في السلة
                                          <i class="fa fa-check text-light" style="position:relative;top:2px"></i>
                                       </a>
                                       <a v-else class="btn btn-primary add-to-cart-btn"
                                       @click="addToCart(p,$event)" >إضافة للمفضلة</a>
                                 
                                   <div class="sale-title label-product">بيع</div>
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
                                      
                                       <div class="p-rate mt-1 text-center">
                                             <i class="fa fa-star-o main-b-color"></i>
                                             <i class="fa fa-star-o main-b-color"></i>
                                             <i class="fa fa-star-o main-b-color"></i>
                                             <i class="fa fa-star-o main-b-color"></i>
                                             <i class="fa fa-star-o main-b-color"></i>
                                       </div>
                                       <h4 class="product-name text-center">
                                           <a :href="'/products/'+p.sku" target="_blink">{{index}}. {{p.name.ar ? p.name.ar : p.name.en}}</a>
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
                                       <a v-if="checkItemIsInCart(p.sku)"  class="btn incartbtn add-to-cart-btn" >في السلة
                                          <i class="fa fa-check text-light" style="position:relative;top:2px"></i>
                                       </a>
                                       <a v-else class="btn btn-primary add-to-cart-btn"
                                       @click="addToCart(p,$event)" >إضافة للسلة</a>
                                 
                                   <div class="sale-title label-product">بيع</div>
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
                                       
                                       <div class="p-rate mt-1 text-center">
                                             <i class="fa fa-star-o main-b-color"></i>
                                             <i class="fa fa-star-o main-b-color"></i>
                                             <i class="fa fa-star-o main-b-color"></i>
                                             <i class="fa fa-star-o main-b-color"></i>
                                             <i class="fa fa-star-o main-b-color"></i>
                                       </div>
                                       <h4 class="product-name text-center">
                                           <a :href="'/products/'+p.sku" target="_blink">{{index}}. {{p.name.ar ? p.name.ar : p.name.en}}</a>
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
                                       <a v-if="checkItemIsInCart(p.sku)"  class="btn incartbtn add-to-cart-btn" >في السلة
                                          <i class="fa fa-check text-light" style="position:relative;top:2px"></i>
                                       </a>
                                       <a v-else class="btn btn-primary add-to-cart-btn"
                                       @click="addToCart(p,$event)" >إضافة للسلة</a>
                                 
                                   <div class="sale-title label-product">بيع</div>
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
                                      
                                       <div class="p-rate mt-1 text-center">
                                             <i class="fa fa-star-o main-b-color"></i>
                                             <i class="fa fa-star-o main-b-color"></i>
                                             <i class="fa fa-star-o main-b-color"></i>
                                             <i class="fa fa-star-o main-b-color"></i>
                                             <i class="fa fa-star-o main-b-color"></i>
                                       </div>
                                       <h4 class="product-name text-center">
                                           <a :href="'/products/'+p.sku" target="_blink">{{index}}. {{p.name.ar ? p.name.ar : p.name.en}}</a>
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
                 <h5 class="section-t">أقمصة
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
                              <h6 class="mt-0 product-name mb-2"><a :href="'/products/'+p.sku" target="_blink">{{p.name.ar ? p.name.ar : p.name.en}}</a> </h6>
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
                              <h6 class="mt-0 product-name mb-2"><a :href="'/products/'+p.sku" target="_blink">{{p.name.ar ? p.name.ar : p.name.en}}</a> </h6>
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
                 <h5 class="section-t">هواتف & ملحقات
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
                              <h6 class="mt-0 product-name mb-2"><a :href="'/products/'+p.sku" target="_blink">{{p.name.ar ? p.name.ar : p.name.en}}</a> </h6>
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
                              <h6 class="mt-0 product-name mb-2"><a :href="'/products/'+p.sku" target="_blink">{{p.name.ar ? p.name.ar : p.name.en}}</a> </h6>
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
                 <h5 class="section-t">انضم الينا </h5>
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


import mixins from '../../../mixins/mixins.js';
import currencyMixins from '../../../mixins/currencyMixins';
import categoryMixins from '../../../mixins/categoryMixins';
import {cataloguear} from '../../Ar/home/Catalogue'

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
     
      addToCartHome(product,event){
         if(this.authId.length > 0){
           let  maxQTE =0;
           product.variations.forEach( variation =>{
              maxQTE+= variation.quantity;
           })
           if(maxQTE == 0){
             Swal.fire({
               type:'warning',
               title: 'الكمية غير متوفرة حاليا !',
             })
             return false;
           }
           
           Swal.fire({
               title: 'اختر الكمية',
               html:'<h6> الكمية المتوفرة : '+maxQTE+'</h6>',
               input: 'number',
               inputAttributes: {
               min: 1,
               max: maxQTE,
               step: 1
               },
               showCancelButton: true,
               confirmButtonText: 'Submit',
               showLoaderOnConfirm: true,
               preConfirm: (quantity) => {
                   
               },
               allowOutsideClick: () => !Swal.isLoading()
           }).then((quantity) => {
                 if(quantity.value){
                 axios.post('/user/carItems/add',{
                     user_id : this.authId,sku:product.sku,quantity:quantity.value
                 })
                 .then(res => {
                     event.target.parentNode.classList.add('main-b-color');
                     if(res.data.type == "success"){
                       this.$store.state.cartItems.push(product.sku)
                     }
                     Swal.fire({
                            title: res.data.msg,
                            type: res.data.type,
                     })
                 })
                 .catch(err =>{alert(err)})
                 }
         })
         }else{
         Swal.fire({
           type: 'error',
           html: 'قم بتسجيل الدخول للقيام بالعملية  <br>\
            <a href="" data-target="#login-modal" data-toggle="modal">تسجيل الدخول</a>',
         })
        // document.querySelector('#loginto').style.display = 'block';
       } 
     },
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
     },
     getcatsrc(catname){
        let products = this.$store.state.products;
        
          let fil = products
          .filter((element) => 
              element.categories.some((c) => c.name.en == catname))
          .map(element => {
              return Object.assign({}, element, {categories : element.categories.filter(subElement => subElement.name.en == catname)});

          }); 
          //get the image of first product
          let firstp = fil[Math.floor(Math.random() * (fil.length - 1))];
          return firstp.images[0];
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
      console.log("i msf ready")
      e.preventDefault();
      $(this).siblings('ul').classList.toggle('show');

    })

  $('.dropdown-submenu a.test').on("mouseenter", function(e){
    console.log('mouseenter')
    $(this).siblings('ul').toggleClass('show');
   
  });
   
});
</script>