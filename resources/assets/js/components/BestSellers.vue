
<style scoped>
.favorited {
    background: #0879c9;
}

</style>
<template>

     <div class="featured-slider shop-product-wrap box-module mt-3">
         <div v-if="allproducts.length == 0" class="media single-product-item row m-0">
         <img src="/img/loadingP.gif" alt="loading" style="margin: auto;display:list-item">
         </div>
          <div id="ft-pC" class="carousel slide" data-ride="carousel">
             <div class="carousel-inner pb-4">
                 <div class="carousel-item active">
                    <div class="row m-0">    
                      <div class="col-lg-4 col-md-6 col-12" v-for="(p,index) in allproducts.slice(0,3)" :key="index">
                                   <div class=" single-product-item" >
                                   <img onerror="this.onerror=null; this.src='/img/notfound.png'" 
                                    :src="p.images[0]" class="card-img-top" alt="...">
                                       <a v-if="checkItemIsInCart(p.sku)"  class="btn incartbtn add-to-cart-btn" >{{!lang ? 'In cart ' : 'في السلة'}}
                                          <i class="fa fa-check text-light" style="position:relative;top:2px"></i>
                                       </a>
                                       <a v-else class="btn btn-primary add-to-cart-btn"
                                       @click="addToCart(p,$event)" >{{!lang ? 'Add to cart' : 'إضافة للسلة'}}</a>
                                 
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
                                             <i class="fa fa-star-o oldmain-b-color"></i>
                                             <i class="fa fa-star-o oldmain-b-color"></i>
                                             <i class="fa fa-star-o oldmain-b-color"></i>
                                             <i class="fa fa-star-o oldmain-b-color"></i>
                                             <i class="fa fa-star-o oldmain-b-color"></i>
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
                      <div class="col-lg-4 col-md-6 col-12" v-for="(p,index) in allproducts.slice(3,6)" :key="index">
                                   <div class=" single-product-item" >
                                   <img onerror="this.onerror=null; this.src='/img/notfound.png'" 
                                    :src="p.images[0]" class="card-img-top" alt="...">
                                       <a v-if="checkItemIsInCart(p.sku)"  class="btn incartbtn add-to-cart-btn" >{{!lang ? 'In cart ': 'في السلة'}}
                                          <i class="fa fa-check text-light" style="position:relative;top:2px"></i>
                                       </a>
                                       <a v-else class="btn btn-primary add-to-cart-btn"
                                       @click="addToCart(p,$event)" >{{!lang ? 'Add to cart' : 'إضافة للسلة'}}</a>
                                 
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
                                             <i class="fa fa-star-o oldmain-b-color"></i>
                                             <i class="fa fa-star-o oldmain-b-color"></i>
                                             <i class="fa fa-star-o oldmain-b-color"></i>
                                             <i class="fa fa-star-o oldmain-b-color"></i>
                                             <i class="fa fa-star-o oldmain-b-color"></i>
                                       </div>
                                       <h4 class="product-name text-center">
                                           <a :href="'/products/'+p.sku" target="_blink">{{index}}. {{!lang ? p.name.en : p.name.ar}}</a>
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
                      <div class="col-lg-4 col-md-6 col-12" v-for="(p,index) in allproducts.slice(6,9)" :key="index">
                                   <div class=" single-product-item" >
                                   <img onerror="this.onerror=null; this.src='/img/notfound.png'" 
                                    :src="p.images[0]" class="card-img-top" alt="...">
                                       <a v-if="checkItemIsInCart(p.sku)"  class="btn incartbtn add-to-cart-btn" >In cart 
                                          <i class="fa fa-check text-light" style="position:relative;top:2px"></i>
                                       </a>
                                       <a v-else class="btn btn-primary add-to-cart-btn"
                                       @click="addToCart(p,$event)" >{{!lang ? 'Add to cart' : 'إضافة للسلة'}}</a>
                                 
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
                                             <i class="fa fa-star-o oldmain-b-color"></i>
                                             <i class="fa fa-star-o oldmain-b-color"></i>
                                             <i class="fa fa-star-o oldmain-b-color"></i>
                                             <i class="fa fa-star-o oldmain-b-color"></i>
                                             <i class="fa fa-star-o oldmain-b-color"></i>
                                       </div>
                                       <h4 class="product-name text-center">
                                           <a :href="'/products/'+p.sku" target="_blink">{{index}}. {{!lang ? p.name.en : p.name.ar}}</a>
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
</template>
<script>
import currencyMixins from '../mixins/currencyMixins';
import mixins from '../mixins/mixins';
export default {
    data(){
        return {

        }
    },
    mixins:[mixins, currencyMixins],
    methods:{
     /// add to favorite fonctionality
       addPToFavorite(sku,event){
          if(this.authId.length > 0){
          event.target.classList.add('favorited')
          axios.post('/user/favorites/add',{user_id:this.authId,sku:sku})
          .then(res => {
            //console.log(res)
          
            Swal.fire({
              type: 'success',
              html: res.data.data,
            })
            if(res.data.data !== "the product already favorited"){
              this.$store.state.favoritedProducts.push(sku) ;
            }
            
          })
          }else{
            let content =  '';
            if(this.lang){
              contnet =  'قم بتسجيل الدخول للاضافة الى المفضلة <br>\
              <a href="" data-target="#login-modal" data-toggle="modal">تسجيل الدخول</a>';
            }else{
              content =  'please login to add to your favorites <br>\
              <a href="" data-target="#login-modal" data-toggle="modal">login</a>';
            }
            Swal.fire({
              type: 'error',
              html:content,
            })
          // document.querySelector('#loginto').style.display = 'block';
          }
       },
    },
    computed:{
       allproducts(){
            return this.$store.state.products;
        },
        favoritedProducts(){
            return this.$store.state.favoritedProducts;
        }
    }
}
</script>