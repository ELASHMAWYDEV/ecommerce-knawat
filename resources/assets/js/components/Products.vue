
<style scoped>
.favorited {
    background: #0879c9;
}

</style>
<template>

 <div  class="shop-product-wrap box-module">
  
  <div class="row" >
    <img v-if="ploading" src="/img/loadingP.gif" alt="loading" style="margin: auto;display:list-item">
    <div v-else-if="currentProducts.length > 0" class="col-lg-4 col-md-6 col-12 pb-2" v-for="(product,index) in currentProducts" v-bind:key="product.sku">
                                <div class=" single-product-item" >
                                       <img :src="product.images[0]" 
                                       onerror="this.onerror=null; this.src='img/1.jpg'" class="card-img-top" alt="...">
                                       
                                       <a v-if="checkItemIsInCart(product.sku)"  class="btn incartbtn add-to-cart-btn" >{{!lang ? 'In cart' : 'في السلة'}}</a>
                                       <a  v-else class="btn oldmain-b-bg add-to-cart-btn" @click="addToCart(product,$event)">{{!lang ? 'Add to cart' : 'إضافة للسلة' }}</a>
                                      
                                       <div class="sale-title label-product">Sale</div>
                                       <div class="percent-count label-product bg-danger ">-15%</div>
                                       <div class="action-links">
     


                                       <a class="wishlist action-btn btn-wishlist" :datasku="product.sku" @click="addPToFavorite(product.sku,$event)"  title="Wishlist">
                                         <i class="fa fa-heart-o fa-lg text-white"></i>
                                       </a>
                                       <a class="action-btn btn-quickview" data-toggle="modal" data-target="#view-product" >
                                         <i class="fa fa-eye fa-lg text-white"></i>
                                       </a>
                                           
                                          
                                           
                                      </div>
                                </div>      
                                <div class="product-info">
                                        
                                           <div class="p-rate mt-1 text-center">
                                                   <i class="fa fa-star oldmain-b-color"></i>
                                                   <i class="fa fa-star oldmain-b-color"></i>
                                                   <i class="fa fa-star oldmain-b-color"></i>
                                                   <i class="fa fa-star-o oldmain-b-color"></i>
                                                   <i class="fa fa-star-o oldmain-b-color"></i>
                                           </div>
                                           <h4 class="product-name text-center">
                                               <a :href="'/products/'+product.sku" target="_blink"><strong>{{index + 1}} </strong>- {{!lang ? product.name.en : product.name.ar}} </a>
                                           </h4>
                                           <div class="price-box text-center">
                                             <span class="new-price">
                                                 <span class="money" data-currency-usd="$110.00">
                                                   {{currencySign}}{{ (currencyRate * (product.variations[0].sale_price)).toFixed(2)}}
                                                 </span>
                                             </span>
                                             
                                             <span class="old-price">
                                                 <span class="money" data-currency-usd="$130.00">$130.00</span>
                                             </span>
                                             
                                           </div>
                                </div>                          
    </div>                                  
    <h5 v-else class="alert alert-info text-weight w-100 text-center">
      There is no product avalaible !
    </h5>                             
  </div>
 </div>
</template>
<script>
import mixins from '../mixins/mixins.js';
export default{
   data(){
      return {
        products :[],
        loading: false,
        activeCategory:'',
      }
   },
   props:['userid'],
   mixins:[mixins],
   created(){
          //set the authenticated id
          this.setAuthId(); 
          let sessionproducts = sessionStorage.getItem('products');
           if((sessionproducts != null) && sessionproducts != "undefined" ){
            
              //this.products =  sessionproducts;
              this.$store.state.products = JSON.parse(sessionproducts)
              this.$store.state.currentProducts = JSON.parse(sessionproducts).splice(1,10)
              
              //this.fetchallProducts();
           }else{
              this.fetchfirstProducts();
           }
           //test if the catalogue name came from home page
           if(this.currentCategory && this.currentCategory.length > 0){
             this.activeCategory = this.currentCategory;
             
              this.filterproducts(this.activeCategory)
             
              
              
              
          }else{
            console.log('no no catalogue')
          } 
       
     
   }
   ,
   methods:{
       
        
        
       
        setAuthId(){
          this.$store.state.authId = this.userid;
          setTimeout(() => {
            if( this.userid != null){
            this.checkFavoritedProducts();
          }
          }, 7000);
        }
        

   },
    computed:{
      
      allproducts(){
        return this.$store.state.products;
      },
      ploading(){
          return this.loading
      },
      currencyRate(){
            return this.$store.state.currencyRate;
        },
      currencySign(){
        
        return this.$store.state.currencySign
      },
      authId(){
        return this.$store.state.authId
      },
      favoritedProducts(){
        return this.$store.state.favoritedProducts;
      },
      currentCategory(){
        return localStorage.getItem('activeCategory');
      }
     
    },
    destroyed(){
      localStorage.clear('activeCategory');
    }
}
</script>
