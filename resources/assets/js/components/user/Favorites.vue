<style scoped>
.action-btn{
        min-width: 72px;
    font-size: 0.8rem;
    margin-top: 3px;
}
.table{    min-width: 530px;}
</style>
<template>
    <div class="container pt-4 pb-4 wishlist">
    
        <div v-if="this.loading" class="columns-container p-3 bg-white" style="box-shadow: 0px 0px 8px 0 #c1b3b3;">
             <img src="/img/loadingP.gif" alt="loading" style="margin: auto;display:list-item">
        </div>
        <!-- page wapper-->
        <div v-else class="columns-container p-3 bg-white table-responsive" style="box-shadow: 0px 0px 8px 0 #c1b3b3;">
             
                <table  class="table table-striped ">
                        <thead>
                          <tr>
                            <th scope="col">Image</th>
                            <th scope="col">Product</th>
                            <th scope="col" >Stock status</th>
                            <th scope="col">Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr v-for="(product,key) in products" :key="key">
                            <th scope="row">
                                <img :src="product.images[0]" style="height: 60px;width:60px" alt="">
                            </th>
                            <td>
                                <h6><a :href="'/products/'+product.sku" target="_blink" >{{product.name.en}}</a></h6>
                                <div class="p-rate mt-1">
                                        <i class="fa fa-star main-b-color"></i>
                                        <i class="fa fa-star main-b-color"></i>
                                        <i class="fa fa-star-o main-b-color"></i>
                                        <i class="fa fa-star-o main-b-color"></i>
                                        <i class="fa fa-star-o main-b-color"></i>
                                </div>
                            </td>
                            <td><span class="btn p-1 font-weight-bolder " >{{product.variations[0].quantity}}</span></td>
                            <td>
                                <button type="button" class="action-btn main-b-bg  text-white btn p-1 btn" :disabled="true">Add to cart</button>
                                <button type="button" class="action-btn main-r-bg  text-white btn p-1" @click="removeFavorite(product.sku)">Remove</button>
                            </td>
                          </tr>
                      
                        </tbody>
                </table>
        </div>
            <!-- ./page wapper-->
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
        this.loading = true;
        setTimeout(() => {
          this.setFavoritedProducts();   
        }, 2000);
       
    },
    computed:{
      
        favoritedProducts(){
            return this.$store.state.favoritedProducts;
        }
    },
    methods:{
          setFavoritedProducts(){
           /* //deleted because we cant work without connection
           let  products = sessionStorage.getItem('products');
            if(products != null){
                let allproducts = JSON.parse(products);
                
                this.products = allproducts.filter(item => 
                     ((this.favoritedProducts.indexOf(item.sku)) > -1));
                 this.loading = false
                
            }else{ */
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
          },
          addCartItem(sku){
              Swal.fire({
            text: 'please choose the quantity',
            type: 'info',
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
          }
    }
}
</script>