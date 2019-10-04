<template>
<div>
<div class="p-3 bg-white" style="box-shadow: 0px 0px 8px 0 #c1b3b3;"  >
    <div v-if="loading" class="media single-product-item row m-0">
         <img src="/img/loadingP.gif" alt="loading" style="margin: auto;display:list-item">
    </div>
    <div v-else class="media single-product-item row m-0">
        <div class="col-md-5">
                <div>
                    <img class="mr-3 h-100 w-100" id="img_01" :data-zoom-image="this.product.product.images[0]"
                    onerror="this.onerror=null; this.src='/img/1.jpg'" 
                     :src="this.product.product.images[0]" alt="single product image">

                </div>
                <div class="sale-title label-product">Sale</div>
                <div class="percent-count label-product bg-danger ">-15%</div>
        </div>
     
        <div class="media-body col-md-7 mt-3">
            <h5 class="mt-0">{{this.product.product.name.en}}</h5>
            <div class="p-rate mt-1">
                <i class="fa fa-star-o main-b-color"></i>
                <i class="fa fa-star-o main-b-color"></i>
                <i class="fa fa-star-o main-b-color"></i>
                <i class="fa fa-star-o main-b-color"></i>
                <i class="fa fa-star-o main-b-color"></i>
            </div>
            <h3 class="p-price mt-2">
                <span class="main-r-color">{{currencySign}}{{ (currencyRate * (product.product.variations[0].sale_price)).toFixed(2)}}</span> 
                <span class="ml-2" style="text-decoration:line-through;color: #9da9b3!important;">125$</span>
            </h3>
            <p class="p-description" >
               This is the default variation of this product the others are in the description
            </p>
            <div class="p-size mt-3">
                 <strong class="mb-2">available sizes : <br></strong> 
                     <br>
                    <span v-for="(size,index) in this.product.product.attributes[1].options" :key="index" class="border p-2 ml-2">
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
            <a  class="btn main-r-bg add-to-cart-single mt-3">Add to favorite <i class="fa fa-heart-o fa-lg text-light"></i></a>

        </div>
       </div>
</div>
<!-- /single product-->
   <!-- details-->
   <div class="mt-4 bg-white p-2 p-des" style="box-shadow: 0px 0px 8px 0 #c1b3b3;">
       <div class="">
            <div class="">
                <div class="" id="list-tab" role="tablist">
                <a class="list-group-item-action active" id="list-home-list" data-toggle="list" href="#list-home" role="tab" aria-controls="Description">Description</a>
                <a class="list-group-item-action" id="list-Reviews" data-toggle="list" href="#Reviews" role="tab" aria-controls="profile">Reviews</a>
                <a class="list-group-item-action" id="list-messages-list" data-toggle="list" href="#Comments" role="tab" aria-controls="messages">Comments</a>
                </div>
            </div>
            <div class="">
                <div class="tab-content p-2" id="nav-tabContent">
                <div class="tab-pane fade show active" id="Description" role="tabpanel" aria-labelledby="list-home-list" v-html="this.product.product.description.tr"></div>
                <div class="tab-pane fade" id="Reviews" role="tabpanel" aria-labelledby="list-Reviews">review</div>
                <div class="tab-pane fade" id="Comments" role="tabpanel" aria-labelledby="list-Comments">comment</div>
                </div>
            </div>
       </div>
   </div>
   <!--/details-->
</div>
</template>
<script>
export default {
    data(){
        return {
           product:{},
           loading:false
        }
    },
    created(){
       this.loading = true
       setTimeout(() => {
         this.getProduct();  
       }, 2000);
       
    },
    props : ['vid'],
    methods:{
        getProduct(){
            axios.get('/getProductBySku/'+this.vid)
            .then(res => {
                 if(res.data != null){
                 this.product = res.data
                 }
                 else{
                     let products = sessionStorage.getItem('products');
                     if(products !=null){
                      let product = JSON.parse(products)
                                   .map(item => {return item.sku == this.vid});
                     
                      this.product = product[0];
                     }else{alert('error')}
                  }
                 this.loading = false

                })
            .catch(
                err => {
                      let products = sessionStorage.getItem('products');
                     if(products !=null){
                      let product = JSON.parse(products)
                                   .map(item => {return item.sku == this.vid});
                     console.log("lll",product)
                      this.product = product[0];
                      this.loading = false
                     }else
                     {alert('error in fetching product')}
                  
                })
             
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
        }
    }
    
}

</script>