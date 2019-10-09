<style scoped>

.checkout-btn{background:#7AA93C}
.cart-product .media{border:1px solid #dee2e6!important}
.cart-product img{height: 75px;
    width: 65px;}
.product-title{
            font-size: 1.2rem;
    font-weight: 500;
    text-transform: capitalize;
    }
.delete-p-btn{
      font-size: 1.5rem;
    font-weight: bold;
    opacity: 0.6;
    cursor: pointer; 
  margin-right: 0.8rem;
    margin-top: 0.6rem;
}
.cart-total-info{
    background: #FAFAFA;
    padding: 1rem;
    text-align: center;
}
@media(max-width:400px){
    .product-title{    font-size: 1rem;}
}
@media(max-width:576px){
    .row .cart-product{   padding: 0 !important;}
}
</style>
<template>
    <div class="container p-4 bg-white mt-3 mb-3 border">
    
        <div v-if="this.loading" class="columns-container p-3 bg-white" style="box-shadow: 0px 0px 8px 0 #c1b3b3;">
             <img src="/img/loadingP.gif" alt="loading" style="margin: auto;display:list-item">
        </div>
        <div class="row p-2 border">
            <div class="col-sm-9 cart-product">
                <div class="media  w-100">
                <img class="mr-3" src="/img/2.jpg" alt="Generic placeholder image">
                <div class="media-body pt-2">
                    <a href="" class="product-title">title of product</a>
                    <p class="text-muted"></p>
                    <h6 class="font-weight-normal" style="font-size: 1.4rem;">
                        Price : <span class="font-weight-bold"><sup>$</sup>12</span>
                    </h6>
                    
                   
                </div>
                  <a class="delete-p-btn">X</a>
                </div>
            </div>
            <div class="col-sm-3 border cart-total-info mt-2 mt-sm-0">
               <h5 class="mb-3 font-weight-normal">Your Cart Total</h5>
               <h3>USD <sup>$</sup>12</h3>
               <button type="button" class="btn checkout-btn text-white">Secure Checkout</button>
            </div>
        </div>
</div>
</template>
<script>
export default {
    data(){
        return {
            products:[],
            loading:false
        }
    },
    created(){
       /*  this.loading = true;
        setTimeout(() => {
          this.setFavoritedProducts();   
        }, 2000); */
       
    },
    computed:{
      
        /* favoritedProducts(){
            return this.$store.state.favoritedProducts;
        } */
    },
    methods:{
                 /*
                let requests =  [];
                this.favoritedProducts.forEach((product)=>{
                console.log('i enter')
                requests.push(axios.get('/getProductBySku/'+product));
                });
                //send multiple requests
                axios.all(requests).then(axios.spread((...responses) => {
                
                  responses.forEach(res => {
                      console.log(res.data)
                      this.products.push(res.data.product);
                  });
                  setTimeout(() => {
                      
                  }, 2000);
                  this.loading = false
                })).catch(errors => {
                // react on errors.
                   swal.fire('there is error in fetching products')
                    setTimeout(() => {
                      
                  }, 2000);
                   
                })
            
         
          },
          removeFavorite($sku){
            Swal.fire({
            text: 'Are you sure to remove this product from favorites?',
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#E64545',
            confirmButtonText: 'Yes !'
            }).then((result) => {
                
            if (result.value) {
                axios.get('/user/favorites/'+$sku+'/delete')
                .then(res => {
                   this.products = this.products.filter(item => item.sku != $sku)
                   this.$store.state.favoritedProducts = this.favoritedProducts.filter(item => item != $sku)
                   Swal.fire({
                     title:'Deleted!',
                     text:res.data.msg,
                     type:'success'
                   }) 
                })
                
            }
          })
          } */
    }
}
</script>