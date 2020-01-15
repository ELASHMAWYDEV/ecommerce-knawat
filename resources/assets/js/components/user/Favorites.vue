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
                            <th scope="col">{{!lang ? 'Image' : 'الصورة'}}</th>
                            <th scope="col">{{!lang ? 'Product' : 'المنتج'}}</th>
                            <th scope="col" >{{!lang ? 'Stock status' : 'حالة التخزين'}}</th>
                            <th scope="col">{{!lang ? 'Action' : 'العملية'}}</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr v-for="(product,key) in products" :key="key">
                            <th scope="row">
                                <img :src="product.images[0]" style="height: 60px;width:60px" alt="">
                            </th>
                            <td>
                                <h6><a :href="'/products/'+product.sku" target="_blink" >{{!lang ? product.name.en : product.name.ar}}</a></h6>
                                <div class="p-rate mt-1">
                                        <i class="fa fa-star oldmain-b-color"></i>
                                        <i class="fa fa-star oldmain-b-color"></i>
                                        <i class="fa fa-star-o oldmain-b-color"></i>
                                        <i class="fa fa-star-o oldmain-b-color"></i>
                                        <i class="fa fa-star-o oldmain-b-color"></i>
                                </div>
                            </td>
                            <td><span class="btn p-1 font-weight-bolder " >{{getQuantity(product)}}</span></td>
                            <td>
                                <button v-if="checkItemIsInCart(product.sku)" type="button" class="action-btn incartbtn text-white btn p-1 btn" >{{!lang ? 'In cart' : 'في السلة' }}</button>
                                <button v-else type="button" class="action-btn oldmain-b-bg  text-white btn p-1 btn" @click="addToCart(product,$event)" >{{!lang ? 'Add to cart' : 'إضافة للسلة'}}</button>
                                <button type="button" class="action-btn oldmain-r-bg  text-white btn p-1" @click="removeFavorite(product.sku)">{{!lang ? 'Remove' : 'إزالة'}}</button>
                            </td>
                          </tr>
                      
                        </tbody>
                </table>
        </div>
            <!-- ./page wapper-->
</div>
</template>
<script>
import mixins from '../../mixins/mixins.js'
export default {
    data(){
        return {
            products:[],
            loading:false,
            loaded_sku:[]
        }
    },
    mixins:[mixins],
    created(){
        this.loading = true;
        setTimeout(() => {
          this.setFavoritedProducts();   
        }, 2000);
       
    },
    watch: {
        favoritedProducts: function () {
            this.setFavoritedProducts();
        },
    },
    computed:{
      
        favoritedProducts(){
            return this.$store.state.favoritedProducts;
        }, authId(){
          return this.$store.state.authId;
        }
    },
    methods:{
          setFavoritedProducts(){
         
                    let url = '/getProductBySku/';
                    let promisedItems = [];

                    this.favoritedProducts.forEach(product => {
                        promisedItems.push(axios.get(url + product))
                    });

                     Promise.all(promisedItems)
                     .then(res => {
                         
                        //console.log(res)
                        res.forEach(p =>{
                            //console.log(this.loaded_sku)
                            if(!(this.loaded_sku.includes(p.data.product.sku))){
                                this.products.push(p.data.product);
                                this.loaded_sku.push(p.data.product.sku);
                            }
                        })
                        this.loading = false
                     })
                    
                    
               /*  let requests =  [];
                this.favoritedProducts.forEach((product)=>{
                console.log('i enter')
                requests.push(axios.get('/getProductBySku/'+product));
                }); */
                //send multiple requests
                /* axios.all(requests).then(axios.spread((...responses) => {
                
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
                   
                }) */
            
         
          },
          removeFavorite($sku){
            Swal.fire({
            text: !this.lang ? 'Are you sure to remove this product from favorites?' :
            'هل أنت متأكد من حدف المنتج من المفضلة',
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
                     title:!lang ? 'Removed!' : 'تم الحدف',
                     text:res.data.msg,
                     type:'success'
                   }) 
                })
                
            }
          })
          },
          //get the product quantity   by calculating sum of variations quantity
          getQuantity(product){
           let sum = 0;
           product.variations.forEach( variation =>{
               //we test if a quantity is > 0 so the size is available for this variation
               sum+= variation.quantity;
           })
         
           return sum;
          
          },
    }
}
</script>