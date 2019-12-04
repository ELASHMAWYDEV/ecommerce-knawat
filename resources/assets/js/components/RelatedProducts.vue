<template>
    <div class="related-products mt-4 bg-white p-2 p-des" style="box-shadow: 0px 0px 8px 0 #c1b3b3;">
        <div v-if="loading" class="media single-product-item row m-0">
           <img src="/img/loadingP.gif" alt="loading" style="margin: auto;display:list-item">
        </div>
        <div class="row">
                <div class="col-lg-3 col-md-6 col-12" v-for="(product,key) in relatedProducts" :key="key" >
                  <div class=" single-product-item" >
                  <img class="card-img-top" 
                     onerror="this.onerror=null; this.src='/img/1.jpg'" 
                     :src="this.product.images[0]" alt="product image">
                  
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
                            <i class="fa fa-star-o oldoldmain-b-color"></i>
                            <i class="fa fa-star-o oldoldmain-b-color"></i>
                            <i class="fa fa-star-o oldoldmain-b-color"></i>
                            <i class="fa fa-star-o oldoldmain-b-color"></i>
                            <i class="fa fa-star-o oldoldmain-b-color"></i>
                      </div>
                      <h4 class="product-name text-center">
                          <a :href="'/products/'+product.sku" target="_blink">{{key}}. {{product.name.en}}</a>
                      </h4>
                      <div class="price-box text-center">
                        <span class="new-price">
                            <span class="money" data-currency-usd="$110.00">{{currencySign}}{{ (currencyRate * (product.product.variations[0].sale_price)).toFixed(2)}}</span>
                        </span>
                        
                        <!-- <span class="old-price">
                            <span class="money" data-currency-usd="$130.00">$130.00</span>
                        </span> -->
                        
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
            loading:false,
            relatedProducts :[],
            product:null
        }
    },
    
    created(){
      
      this.getProducts();
    },
    mounted(){
   //  this.getProduct();
    },
    props:['vid'],
    methods:{
         getProducts(){
             this.loading = true
          let prods =sessionStorage.getItem('products');
          if(!prods){
          axios.get('/getProducts')
          .then(res => {
          
             this.$store.state.products = res.data.products
             sessionStorage.setItem('products',JSON.stringify(res.data.products))
             
           
          })
          .catch(error => {
                  alert("error")
                })
          }else{
              
              let products =JSON.parse(prods);
              this.$store.state.products =products;
            
          }
          this.getProduct()
          
        },
        getProduct(){
            
            axios.get('/getProductBySku/'+this.vid)
            .then(res => {
                 if(res.data != null){
                    this.product = res.data.product;
                    this.$store.state.productDetails = res.data.product;
                   
                 }
                 else{
                     let products = sessionStorage.getItem('products');
                     if(products !=null){
                      let product = JSON.parse(products)
                                   .map(item => {return item.sku == this.vid});
                       
                      this.product = product[0];
                      this.$store.state.productDetails = product[0];
                     }else{alert('error')}
                  }
                 //this.loading = false

                })
            .catch(
                err => {
                    
                      let products = sessionStorage.getItem('products');
                     if(products !=null){
                      let product = JSON.parse(products)
                                   .map(item => {return item.sku == this.vid});
                     console.log("lll",product)
                      this.product = product[0];
                      this.$store.state.productDetails = product[0];
                      //this.loading = false
                     }else
                     {alert('error in fetching product')}
                  
                })
             this.getRelatedProducts();
        },
        getRelatedProducts(){
            
             
             let categories =this.products.categories
             .map(item => item.name.en);
            let fil = this.allproducts
                .filter((element) => 
                    element.categories.some((c) =>{return categories.indexOf(c.name.en) > -1}))
                /* .map(element => {
                    return Object.assign({}, element, {categories : element.categories.filter(subElement => subElement.name.en == type)});

                });  */
                console.log('c',categories)
                //console.log('fil',fil)
                //this.relatedProducts = fil;
                this.loading = false;
        }
    },
    computed:{
      
      allproducts(){
          return this.$store.state.products;
      }

      
    }
}
</script>