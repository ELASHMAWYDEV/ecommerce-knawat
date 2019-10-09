<style scoped>

.comment-wrapper .panel-body {
    max-height:650px;
    overflow:auto;
}

.comment-wrapper .media-list .media img {
    width:64px;
    height:64px;
       border: 1px solid #e5e7e8;
    border-radius: 50%;
    margin-right: 6px;
}

.comment-wrapper .media-list .media {
    border-bottom:1px dashed #efefef;
    margin-bottom:25px;
}
</style>
<template>
<div>
<div>
    
<div class="p-3 bg-white" style="box-shadow: 0px 0px 8px 0 #c1b3b3;"  >
    <div v-if="this.loading" class="media single-product-item row m-0">
         <img src="/img/loadingP.gif" alt="loading" style="margin: auto;display:list-item">
    </div>
    <div class="media single-product-item row m-0">
        <div class="col-md-5">
                <div>
                    <img class="mr-3 h-100 w-100" id="img_01" :data-zoom-image="this.product.images[0]"
                     onerror="this.onerror=null; this.src='/img/1.jpg'" 
                     :src="this.product.images[0]" alt="single product image">

                </div>
                <div class="sale-title label-product">Sale</div>
                <div class="percent-count label-product bg-danger ">-15%</div>
        </div>
     
        <div class="media-body col-md-7 mt-3">
            <h5 class="mt-0">{{this.product.name.en}}</h5>
            <div class="p-rate mt-1">
                <i class="fa fa-star-o main-b-color"></i>
                <i class="fa fa-star-o main-b-color"></i>
                <i class="fa fa-star-o main-b-color"></i>
                <i class="fa fa-star-o main-b-color"></i>
                <i class="fa fa-star-o main-b-color"></i>
            </div>
            <h3 class="p-price mt-2">
                <span class="main-r-color">{{currencySign}}{{ (currencyRate * (product.variations[0].sale_price)).toFixed(2)}}</span> 
                <!-- <span class="ml-2" style="text-decoration:line-through;color: #9da9b3!important;">125$</span> -->
            </h3>
            <p class="p-description" >
               This is the default variation of this product the others are in the description
            </p>
            <div class="p-size mt-3">
                 <strong class="mb-2">available sizes : <br></strong> 
                     <br>
                    <span v-for="(size,index) in this.product.attributes[1].options" :key="index" class="border p-2 ml-2">
                        {{size.en}}
                    </span>
               
                
                
            </div>
            <!--
            <div class="p-color mt-3">
                color : 
                <span colorname="" class="active" style="background:red"></span>
                <span colorname="" style="background: blue"></span>
            </div>
            -->
            <div class="quantity mt-3">
                Quantity : <input type="number" id="quantity" style="width: 60px;">
            </div>
            <a  class="btn main-b-bg add-to-cart-single mt-3">Add to cart</a>
            <a  class="btn main-r-bg add-to-cart-single mt-3" id="add-to-cart-single" @click="addToFavorite(product.sku,$event)">Add to favorite 
                <i class="fa fa-heart-o text-light" style="position:relative;top:2px"></i>
            </a>

        </div>
       </div>
</div>
<!-- /single product-->
   <!-- details-->
   <div class="mt-4 bg-white p-2 p-des" style="box-shadow: 0px 0px 8px 0 #c1b3b3;">
       <div class="">
            <nav>
            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                <a v-if="product.description" class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Description</a>
                <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Attributs</a>
                <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false">Comments</a>
            </div>
            </nav>
            <div class="tab-content p-3" id="nav-tabContent " style="    border: 1px solid #dee2e6;border-top: 0;">
            <div v-if="product.description" class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab" v-html="product.description.tr"></div>
            <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
               
                <table class="table table-bordered">
                <thead>
                    <tr>
                    <th scope="col">Names</th>
                    <th scope="col">option</th>
                    </tr>
                </thead>
                <tbody>
                    
                    <tr v-for="(attrs,key) in product.attributes" :key="key">
                    <th scope="row">
                        <span class="mr-2" v-for="(v,key2) in Object.values(attrs.name)" :key="key2">{{v}},</span>
                    </th>
                    <td>
                     <span class="mr-2" v-for="(v,key2) in Object.values(attrs.options[0])" :key="key2">{{v}},</span> 
                    </td>
                 
                    </tr>
                    
                </tbody>
                </table>
            </div>
            <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
                <div class="row bootstrap snippets">
                    <div class="col-md-9 col-md-offset-2 col-sm-12">
                        <div class="comment-wrapper">
                            <div class="panel panel-info">
                                
                                <div class="panel-body">
                                    <textarea class="form-control" placeholder="write a comment..." rows="3"></textarea>
                                    <br>
                                    <button type="button" class="btn btn-info pull-right">Post</button>
                                    <div class="clearfix"></div>
                                    <hr>
                                    <ul class="media-list">
                                        <li class="media">
                                            <a href="#" class="pull-left">
                                                <img src="/img/avatar2.png" alt="" class="img-circle">
                                            </a>
                                            <div class="media-body">
                                                <span class="text-muted pull-right">
                                                    <small class="text-muted">30 min ago</small>
                                                </span>
                                                <strong class="text-success">@MartinoMont</strong>
                                                <p>
                                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                                    Lorem ipsum dolor sit amet, <a href="#">#consecteturadipiscing </a>.
                                                </p>
                                            </div>
                                        </li>
                                        <li class="media">
                                            <a href="#" class="pull-left">
                                                <img src="/img/avatar2.png" alt="" class="img-circle">
                                            </a>
                                            <div class="media-body">
                                                <span class="text-muted pull-right">
                                                    <small class="text-muted">30 min ago</small>
                                                </span>
                                                <strong class="text-success">@LaurenceCorreil</strong>
                                                <p>
                                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                                    Lorem ipsum dolor <a href="#">#ipsumdolor </a>adipiscing elit.
                                                </p>
                                            </div>
                                        </li>
                                       
                                    </ul>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            </div>

       </div>
   </div>
   <!--/details-->
</div>
<!--related products details -->
<h6 class="mt-3 "><span class="slide-choosen-categories main-b-color d-inline-block">Related Products <hr class="hr-choosen-c"></span> <hr class="hr-full-slide-section"></h6>
<div class="related-products mt-4 bg-white p-2 p-des" style="box-shadow: 0px 0px 8px 0 #c1b3b3;">
        <div v-if="this.rloading" class="media single-product-item row m-0">
         <img src="/img/loadingP.gif" alt="loading" style="margin: auto;display:list-item">
        </div>
        <div class="row">
                <div class="col-lg-3 col-md-6 col-12" v-for="(p,index) in this.relatedProducts" v-bind:key="index" >
                  <div class=" single-product-item" >
                  <img class="card-img-top" 
                     onerror="this.onerror=null; this.src='/img/1.jpg'" 
                     :src="p.images[0]" alt="product image">
                  
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
                          <a :href="'/products/'+p.sku" target="_blink">{{index}}. {{p.name.en}}</a>
                      </h4>
                      <div class="price-box text-center">
                        <span class="new-price">
                            <span class="money" data-currency-usd="$110.00">{{currencySign}}{{ (currencyRate * (p.variations[0].sale_price)).toFixed(2)}}</span>
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
</template>
<script>
export default {
    data(){
        return {
           product:null,
           loading:true,
           relatedProducts :[],
           rloading:true,
        }
    },
    created(){
       
       setTimeout(() => {
         this.getProduct();  
       }, 1000);
       this.rloading = true;
       
    },
    mounted(){
      setTimeout(() => {
          this.checkIfProductFavorited();
      }, 7000);
    },
    props : ['vid'],
    methods:{
        getProduct(){
             this.loading = true
             let products = sessionStorage.getItem('products');
            if(products !=null){
                      let product = JSON.parse(products)
                                   .filter(item => item.sku == this.vid);
                      
                      this.product = product[0];
                      this.$store.state.productDetails = product[0];
                       this.loading = false;
                       //get all product to filter them by related category
                       this.getProducts();
            }else{
            axios.get('/getProductBySku/'+this.vid)
            .then(res => {
                 if(res.data != null){
                    this.product = res.data.product;
                    this.$store.state.productDetails = res.data.product;
                   
                 }
                 this.loading = false
                 this.getProducts();
                  
                })
            .catch(
                err => {
                    
                     {alert('error in fetching product')}

                     //this.getProducts();
                  
                })
            }
               
                   
                    
              
        },
        getRelatedProducts(){
            console.log(this.product)
             if(this.product == null){setTimeout(function(){},5000)}
               
             let categories =this.product.categories
             .map(item => item.name.en);
             console.log('c',categories)
            let fil = this.allproducts
                .filter((element) => 
                    element.categories.some((c) =>{return categories.indexOf(c.name.en) > -1}))
                .filter((item)=> item.sku != this.product.sku)
              
                console.log('fil',fil)
                this.relatedProducts = fil;
                this.rloading = false;
        },
        //get all product function to add it to store
        getProducts(){
          let prods =sessionStorage.getItem('products');
          if(!prods){
          axios.get('/getProducts')
          .then(res => {
          
             this.$store.state.products = res.data.products
             sessionStorage.setItem('products',JSON.stringify(res.data.products))
             setTimeout(() => {
                        this.getRelatedProducts() ; 
                   }, 5000);
           
          })
          .catch(error => {
                  alert("error")
                })
          }else{
              
              let products =JSON.parse(prods);
              this.$store.state.products =products;
              setTimeout(() => {
                        this.getRelatedProducts() ; 
                   }, 5000);
          }
        },
        /// add to favorite fonctionality
      addToFavorite(sku,event){
        if(this.authId.length > 0){
       
        axios.post('/user/favorites/add',{user_id:this.authId,sku:sku})
        .then(res => {
          //console.log(res)
         
          Swal.fire({
            type: 'success',
            html: res.data.data,
          })
         if(res.data.data !== "the product already favorited"){
            this.$store.state.favoritedProducts.push(this.vid);
         }
           event.target.innerHTML = 'Already favorited \
                <i class="fa fa-heart-o text-light" style="position:relative;top:2px"></i>';
         
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
      //check if the product  favorited  
      checkIfProductFavorited(){

          if(this.favoritedProducts.indexOf(this.vid) > -1){
              document.querySelectorAll('#add-to-cart-single').innerHTML='Already favorited \
                <i class="fa fa-heart-o text-light" style="position:relative;top:2px"></i>';
          }  
    }
    },
    computed:{
        allproducts(){
            return this.$store.state.products;
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
        }
    }
    
}

</script>