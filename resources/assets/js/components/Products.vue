<style scoped>
.favorited{    background: #0879c9;}
</style>
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
     


                                       <a class="wishlist action-btn btn-wishlist" :datasku="product.sku" @click="addToFavorite(product.sku,$event)"  title="Wishlist">
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
                                               <a :href="'/products/'+product.sku" target="_blink"><strong>{{index + 1}} </strong>- {{product.name.en}} </a>
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

export default{
   data(){
      return {
        products :[],
        loading: false,
        favoritedProducts:[]
      }
   },
   props:['userid']
   ,
   created(){
          //set the authenticated id
          this.setAuthId();
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
   mounted(){
     if( this.userid != null){
       this.getFavoritedProducts();
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
      },
      authId(){
        return this.$store.state.authId
      }
     
    }
   ,
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
            setTimeout(this.setfirstCategories(),2000)
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
             /* set alll the categories */
             setTimeout(this.setCategories(),2000)
           
          })
          .catch(error => {
                  alert("error")
                })
        },
        setfirstCategories(){
          let cat = new Set();

          
          this.currentProducts.forEach(product=>{
            product.categories.forEach(element => {
              
              cat.add(element);
            });             
             
            
          })
          this.$store.state.categories = this.getUnique(Array.from(cat),'id');
          sessionStorage.setItem('categories',JSON.stringify(this.getUnique(Array.from(cat),'id')))
        },
        setCategories(){
          let cat = new Set();

          
          this.allproducts.forEach(product=>{
            product.categories.forEach(element => {
              
              cat.add(element);
            });             
             
            
          })
          this.$store.state.categories = this.getUnique(Array.from(cat),'id');
          sessionStorage.setItem('categories',JSON.stringify(this.getUnique(Array.from(cat),'id')))
        },
        /*filter duplicated objects **/
        getUnique(arr, comp) {

        const unique = arr
            .map(e => e[comp])

          // store the keys of the unique objects
          .map((e, i, final) => final.indexOf(e) === i && i)

          // eliminate the dead keys & store unique objects
          .filter(e => arr[e]).map(e => arr[e]);

        return unique;
      },
      //get favorited items 
      getFavoritedProducts(){
        
        
        axios.get('/users/'+this.authId+'/favorites')
        .then(res => {
          
          //console.log(res.data)
          this.favoritedProducts = res.data;
          //set the favorites count in store 
          console.log('leengt',this.favoritedProducts.length)
          this.$store.state.favoritesCount = this.favoritedProducts.length;
          document.querySelectorAll('.wishlist').forEach(item =>{
            if(this.favoritedProducts.indexOf(item.getAttribute("datasku")) > -1 ){
              item.classList.add('favorited');
            }
          })
        })
        .catch(err => console.log(err))
      },
      /// add to favorite fonctionality
      addToFavorite(sku,event){
        if(this.authId.length > 0){
        event.target.parentNode.classList.add('favorited')
        axios.post('/user/favorites/add',{user_id:this.authId,sku:sku})
        .then(res => {
          //console.log(res)
         
          Swal.fire({
            type: 'success',
            html: res.data.data,
          })
           this.$store.state.favoritesCount =  this.$store.state.favoritesCount + 1 ;
        })
        }else{
          Swal.fire({
            type: 'error',
            html: 'please login to add to your favorites <br>\
             <a href="" data-target="#login-modal" data-toggle="modal">login</a>',
          })
         // document.querySelector('#loginto').style.display = 'block';
        }
      },
      setAuthId(){
        this.$store.state.authId = this.userid;
      }

   }
}
</script>
