<template>

 <div  class="shop-product-wrap box-module">
  
  <div class="row" >
    <img v-if="ploading" src="/img/loadingP.gif" alt="loading" style="margin: auto;display:list-item">
    <div v-else-if="currentProducts.length > 0" class="col-lg-4 col-md-6 col-12 pb-2" v-for="(product,index) in currentProducts" v-bind:key="product.sku">
                                <div class=" single-product-item" >
                                       <img :src="product.images[0]" 
                                       onerror="this.onerror=null; this.src='img/1.jpg'" class="card-img-top" alt="...">
                                       
                                       <a href="#" class="btn main-b-bg add-to-cart-btn">Add to cart</a>
                                      
                                       <div class="sale-title label-product">Sale</div>
                                       <div class="percent-count label-product bg-danger ">-15%</div>
                                       <div class="action-links">
     


                                       <a class="wishlist action-btn btn-wishlist"  title="Wishlist">
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
                                                   <i class="fa fa-star main-b-color"></i>
                                                   <i class="fa fa-star main-b-color"></i>
                                                   <i class="fa fa-star main-b-color"></i>
                                                   <i class="fa fa-star-o main-b-color"></i>
                                                   <i class="fa fa-star-o main-b-color"></i>
                                           </div>
                                           <h4 class="product-name text-center">
                                               <a href="#"><strong>{{index + 1}} </strong>- {{product.name.en}} </a>
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
      There is no product avalaible in this cateogry !
    </h5>                             
  </div>
 </div>
</template>
<script>

export default{
   data(){
      return {
        products :[],
        loading: false,
      }
   },
 
   created(){
          let sessionproducts = sessionStorage.getItem('products');
           if(sessionproducts != null){
            
              //this.products =  sessionproducts;
              this.$store.state.products = JSON.parse(sessionproducts)
              this.$store.state.currentProducts = JSON.parse(sessionproducts).splice(1,10)
              
              //this.fetchallProducts();
           }else{
              this.fetchfirstProducts();

           }
       
     
   },
    computed:{
      currentProducts(){
        return this.$store.state.currentProducts ;
      },
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
      }
     
    }
   ,
   mounted(){
    
   },
   methods:{
       
        fetchfirstProducts(){
          this.loading = true;
          axios.get('/get10Products')
          .then(res => {
            console.log(res)
            
            this.$store.state.currentProducts = res.data.products;
            setTimeout(() => {
              this.loading = false;
            }, 3000);
            
            sessionStorage.setItem('products',JSON.stringify(res.data.products))
            //this.$store.state.products = res.data.products
           
            setTimeout(this.fetchallProducts(), 4000);
          })
          .catch(error => {
                    this.loading = false
                    //do whatever with response
                })
        },
        fetchallProducts(){
          
          axios.get('/getProducts')
          .then(res => {
            console.log("all",res)
           // this.products = res.data.products;
            //sessionStorage.setItem('products',JSON.stringify(this.products))
            this.$store.state.products = res.data.products
             sessionStorage.setItem('products',JSON.stringify(res.data.products))
             
           
          })
          .catch(error => {
                  alert("error")
                })
        }
   }
}
</script>
