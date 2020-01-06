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
.carousel.slide{height: 60px;
    /* height: 30rem;border: 2px solid rgba(25, 24, 24, 0.23); */
}
.full-img img{height:26rem}
.car-ind{ 
  height: 50px;
    width: 50px;
    border-radius: 50%;
    border: 1px solid #879096;
    background-color: #d7e5ef;
}
.car-ind img{height:100%;width:100%}
.car-ind-ol{   margin: 0}
.car-ind.active{background-color:#0879c9}
.quantity-badge{    padding: 5px 5px;
    border-radius: 50%;
    margin-right: 5px;margin-left: 5px;}
.favorited {
    background: #0879c9;
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
                <div style="border: 2px solid #d4d4d8;">
                  <div class="full-img">
                      <img class="d-block w-100 p-im" :src="this.product.images[0]" 
                                         alt="product image" style=" padding: 0.5rem;"
                                        :data-zoom-image="this.product.images[0]" id="img_1">
                  </div>
                   <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                                  <ol class="carousel-indicators car-ind-ol">
                                       <li v-for="(image,key) in this.product.images" :key="key"
                                        data-target="#carouselExampleIndicators" data-slide-to="key"
                                         class="car-ind" :class="key == 0 ? 'active' : ''" @click="changeImg($event)">
                                          <img class="d-block  p-im" :src="image" alt="product image" >
                                       </li>             
                                  </ol>
                                  <div class="carousel-inner">
                                                                                         
                                      <div v-for="(image,key) in this.product.images" :key="key" class="carousel-item  " :class="key ==1 ? 'active' : ''" >
                                         <img class="d-block w-100 p-im" :src="image" 
                                         alt="product image" style=" padding: 0.5rem;cursor: zoom-in;"
                                        :data-zoom-image="image" :id="'img_'+key">
                                      </div>
                                  </div>
                                 <!--  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Previous</span>
                                  </a>
                                  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Next</span>
                                  </a> -->
                </div>

                </div>
                <div class="sale-title label-product">{{!lang ? 'Sale' : 'بيع'}}</div>
                <div class="percent-count label-product bg-danger ">-15%</div>
        </div>
     
        <div class="media-body col-md-7 mt-3">
            <h5 class="mt-0">{{!lang ? this.product.name.en : this.product.name.ar}}</h5>
            <div class="p-rate mt-1">
                <i class="fa fa-star-o oldmain-b-color"></i>
                <i class="fa fa-star-o oldmain-b-color"></i>
                <i class="fa fa-star-o oldmain-b-color"></i>
                <i class="fa fa-star-o oldmain-b-color"></i>
                <i class="fa fa-star-o oldmain-b-color"></i>
            </div>
            <h3 class="p-price mt-2">
                <span class="main-r-color">{{currencySign}}{{ (currencyRate * (product.variations[0].sale_price)).toFixed(2)}}</span> 
                <!-- <span class="ml-2" style="text-decoration:line-through;color: #9da9b3!important;">125$</span> -->
            </h3>
            <p class="p-description" >
               {{lang ? 'هدا جزء من خصائص هدا المنتج أكثر تفاصيل في الخصائص بالاسفل' 
               : 'This is a part of details of this product ,more detils in attribute part.'}}
            </p>
            <div class="weight-a" v-if="product.variations[0].weight">
                <label for=""><strong class="mb-2" >{{!lang  ? 'Weight' : 'الوزن :'}} <br></strong></label>  
                {{product.variations[0].weight}}
            </div>
            <div v-for="(attr,i) in this.product.attributes" :key="i">
             <div class="p-size mt-3" v-if="attr.name.en == 'Size'" >
                     <label for=""><strong class="mb-2"  >{{!lang ? 'sizes :' :'الحجم :'}} <br></strong></label>
                     
                     <span  v-for="(opt,i) in attr.options" :key="i"   class="border p-2 ml-2"
                     >
                       <!-- tr value is always available so its good to work on it -->
                       {{opt.tr}}
                     </span>   
                   
             </div>   
            </div>
            
            <div class="quantity-a mt-4">
                <label for=""><strong class="mb-2" >{{!lang ? 'Quantity :' : 'الكمية'}} <br></strong> </label>
                <span class="badge-info quantity-badge">{{getQuantity()}}</span>{{!lang ? 'products for' : 'منتج من'}} <span class="badge-info quantity-badge">{{product.variations.length}}</span> {{!lang ? 'variations' : 'أنواع'}}
            </div>
            <!--
            <div class="p-color mt-3">
                color : 
                <span colorname="" class="active" style="background:red"></span>
                <span colorname="" style="background: blue"></span>
            </div>
            -->
            <!-- <div class="quantity mt-3">
                Quantity : <input type="number" id="quantity" style="width: 60px;">
            </div> -->
            <br>
            <a v-if="this.incart"  class="btn incartbtn add-to-cart-single a1 mt-3">{{!lang ? 'Already in cart' : 'في السلة'}}
                <i class="fa fa-check text-light" style="position:relative;top:2px"></i>
            </a>
            <a v-else class="btn oldmain-b-bg add-to-cart-single a1 mt-3" id="add-to-cart" @click="addCartItem()">{{!lang ? 'Add to cart' :'إضافة للسلة'}}</a>
            <a  class="btn main-r-bg add-to-cart-single mt-3" id="add-to-cart-single" @click="addToFavorite(product.sku,$event)">{{!lang ? 'Add to favorite ' :'إضافة للمفضلة'}}
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
                <a v-if="product.description" class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">{{!lang ? 'Description' : 'الوصف'}}</a>
                <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">{{!lang ? 'Attributs' : 'الخصائص' }}</a>
                <!-- <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false">{{!lang ? 'Comments' : 'التعليقات' }}</a> -->
            </div>
            </nav>
            <div class="tab-content p-3" id="nav-tabContent " style="    border: 1px solid #dee2e6;border-top: 0;">
            <div v-if="product.description" class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab" v-html="product.description.tr"></div>
            <div class="tab-pane fade table-responsive" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
               
                <table class="table table-bordered">
                <thead>
                    <tr>
                    <th scope="col">{{!lang ? 'Names' : 'الاسم'}} </th>
                    <th scope="col">{{!lang ? 'option'  :'الخاصية'}}</th>
                    </tr>
                </thead>
                <tbody>
                    
                    <tr v-for="(attrs,key) in product.attributes" :key="key">
                    <th scope="row">
                        <span class="mr-2"  >{{(attrs.name.en) ? (attrs.name.en) : ''}},</span>
                    </th>
                    <td>
                     <span class="mr-2" v-for="(v,key2) in Object.values(attrs.options)" :key="key2">{{v.en ? v.en : transColorturky(v.tr)}},</span> 
                    </td>
                 
                    </tr>
                    
                </tbody>
                </table>
            </div>
            <!-- <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
                <div class="row bootstrap snippets">
                    <div class="col-md-9 col-md-offset-2 col-sm-12">
                        <div class="comment-wrapper">
                            <div class="panel panel-info">
                                
                                <div class="panel-body">
                                    <textarea class="form-control" :placeholder="!lang ? 'write a comment...' : 'إضافة تعليق'" rows="3"></textarea>
                                    <br>
                                    <button type="button" class="btn btn-info pull-right">{{!lang ? 'Post' : 'نشر'}}</button>
                                    <div class="clearfix"></div>
                                    <hr>
                                    <ul class="media-list">
                                        <li class="media">
                                            <a href="#" class="pull-left">
                                                <img src="/img/avatar2.png" alt="" class="img-circle">
                                            </a>
                                            <div class="media-body">
                                                <span class="text-muted pull-right">
                                                    <small class="text-muted">25-05-2019</small>
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
                                                    <small class="text-muted">25-05-2019</small>
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
            </div> -->
            </div>

       </div>
   </div>
   <!--/details-->
</div>
<!--related products details -->
<h6 class="mt-3 "><span class="slide-choosen-categories oldmain-b-color d-inline-block">{{!lang ? 'Related Products' : 'منتجات مشابهة '}} <hr class="hr-choosen-c"></span> <hr class="hr-full-slide-section"></h6>
<div class="related-products mt-4 bg-white p-2 p-des" style="box-shadow: 0px 0px 8px 0 #c1b3b3;">
        <div v-if="this.rloading" class="media single-product-item row m-0">
         <img src="/img/loadingP.gif" alt="loading" style="margin: auto;display:list-item">
        </div>
        <div class="row">
                <div class="col-lg-3 col-md-4 col-sm-6 mb-3" v-for="(p,index) in this.relatedProducts" v-bind:key="index" >
                  <div class=" single-product-item" >
                  <img class="card-img-top" 
                     onerror="this.onerror=null; this.src='/img/notfound.png'" 
                     :src="p.images[0]" alt="product image">
                     <!--the add to cart btn -->
                       <a v-if="checkItemIsInCart(p.sku)"  class="btn incartbtn add-to-cart-btn" >{{!lang ? 'In cart' :'في للسلة'}} 
                           <i class="fa fa-check text-light" style="position:relative;top:2px"></i>
                       </a>
                      <a v-else  class="btn btn-primary add-to-cart-btn" @click="addToCart(p,$event)">{{!lang ? 'Add to cart' :'إضافة للسلة'}}</a>
                 
                  <div class="sale-title label-product">Sale</div>
                  <div class="percent-count label-product bg-danger ">-15%</div>
                  <div class="action-links">
                        <a class="wishlist action-btn btn-wishlist"
                         :class="(favoritedProducts.indexOf(p.sku) >-1) ? 'favorited' : ''"
                        :datasku="p.sku" @click.stop="addPToFavorite(p.sku,$event)"
                         title="Wishlist">
                            <i class="fa fa-heart-o fa-lg text-white text-white"></i>
                        </a>
                        <a class="action-btn btn-quickview" data-toggle="modal" data-target="#view-product" >
                            <i class="fa fa-eye fa-lg text-white text-white"></i>
                        </a>
                         
                   </div>
                 </div> 
                 <div class="product-info">
                      
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
import mixins from '../mixins/mixins.js';
export default {
    data(){
        return {
           product:null,
           loading:true,
           relatedProducts :[],
           rloading:true,
           availableVariationsSize:[]
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
    props : ['vid','incart'],
    mixins:[mixins],
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
        /// add this product to favorites
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
                <i class="fa fa-heart text-light" style="position:relative;top:2px"></i>';
         
        })
        }else{
          Swal.fire({
            type: 'error',
            html: 'please login to add to your favorites <br>\
             <a href="" data-target="#login-modal" data-toggle="modal">login</a>',
          })
        }
       },
        //check if the product  favorited  
       checkIfProductFavorited(){

            if(this.favoritedProducts.indexOf(this.vid) > -1){
                document.querySelector('#add-to-cart-single').innerHTML='Already favorited \
                  <i class="fa fa-heart text-light" style="position:relative;top:2px"></i>';
            }  
       },   
       //translate colors from turkey to english
       transColorturky(color){
           
        let colors = [{'White':'Beyaz',},{'Grey':'Gri'},,{"Turquoise"	:"Türküaz"},{"Blue":	"Mavi"},{"Navy"	: "Lacivert"},
        {"Green":	"Yeşil"},{"Yellow":	"Sarı"},{"Orange"	:"Turuncu"},{"Red" :	"Kırmızı"},{"Pink":	"Pembe"},
        {"Purple"	:"Mor"},{"Brown"	:"Kahverengi"},{"Black":	"Siyah"}
        ];
        let filc =  colors.filter(c => Object.values(c).toString().toLowerCase() == color.toString().toLowerCase());
        if(filc.length == 0){
            return color;
        }
        return Object.keys(filc[0])[0];
       },
       //get the product quantity   by calculating sum of variations quantity
       getQuantity(){
           let sum = 0;
           let availables = [];
           //get all index of the size attribute in list of attributes
           let ind=0;
           this.product.variations[0].attributes.forEach((attr,index) =>{
               if(attr.name.en == "Size"){ind = index};   
           })
           this.product.variations.forEach( variation =>{
               //we test if a quantity is > 0 so the size is available for this variation
               if(variation.quantity > 0){
                  availables.push(variation.attributes[ind].option.tr);
               }
               sum+= variation.quantity;
           })
           this.availableVariationsSize = availables;
           // active the availabe sizes 
           this.testAvailableSizes();
           return sum;
          
       },
       //test if a size is available from sizes of product
       testAvailableSizes(){
         
           document.querySelectorAll('.p-size span').forEach(size =>{
      
               if(this.availableVariationsSize.indexOf(size.textContent.trim()) > -1){
                   size.classList.add('active')
               }
           })
          /*  if(this.availableVariationsSize.indexOf(opt) > -1){
               return true;
           }
           return false; */
       },
       //the main add to cart fonctionality
       addCartItem(){
           if(this.authId.length > 0){
            let  maxQTE =0;
            this.product.variations.forEach( variation =>{
               maxQTE+= variation.quantity;
            })
            if(maxQTE == 0){
              Swal.fire({
                type:'warning',
                title: 'Sorry the product is not available now !',
              })
              return false;
            }
            
            Swal.fire({
                title: 'please select a quantity',
                html:'<h6>max quantity :'+maxQTE+'</h6>',
                input: 'number',
                inputAttributes: {
                min: 1,
                max: maxQTE,
                step: 1
                },
                showCancelButton: true,
                confirmButtonText: 'Submit',
                showLoaderOnConfirm: true,
                preConfirm: (quantity) => {
                    
                },
                allowOutsideClick: () => !Swal.isLoading()
            }).then((quantity) => {
            
             axios.post('/user/carItems/add',{
                      user_id : this.authId,sku:this.vid,quantity:quantity.value
                  })
                  .then(res => {
                      if(res.data.type == "success"){
                          this.$store.state.cartItems.push(this.vid);
                      }
                      document.querySelector('#add-to-cart').innerHTML='\
                      added in cart \
                      <i class="fa fa-check text-light ml-2" style="position:relative;top:2px"></i>';
                      Swal.fire({
                             title: res.data.msg,
                             type: res.data.type,
                      })
                  })
                  .catch(err =>{alert(err)})
          })
          }else{
          Swal.fire({
            type: 'error',
            html: 'please login to add to your favorites <br>\
             <a href="" data-target="#login-modal" data-toggle="modal">login</a>',
          })
         // document.querySelector('#loginto').style.display = 'block';
        }
       }
        ,
        changeImg(event){
             let src= document.querySelectorAll('.carousel-item.active img')[0].getAttribute('src');
             console.log('amine src'+src) 
             document.querySelector('#img_1').setAttribute('src',src)
             document.querySelector('#img_1').setAttribute('data-zoom-image',src)
             $("#img_1").data('zoom-image', src).ezPlus({
                responsive: true,
                zoomType: "inner", 
                cursor: 'crosshair'
                }); 
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
$(document).ready(function(){

      setTimeout(() => {
          let imagetotal= document.querySelectorAll(".carousel-item img").length
      for(let i=0;i<imagetotal;i++){
          
          $('#img_'+i).ezPlus({
              responsive: true,
                zoomType: 'inner',    cursor: 'crosshair'
          });
      }
      }, 8000);

    
})
</script>