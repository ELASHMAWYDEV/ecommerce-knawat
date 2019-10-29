<template>
        <div class="card  mt-5">
            <div class="card-header p-2">
              <ul class="nav nav-pills p-0">
                <li class="nav-item"><a class="nav-link active" href="#allproducts" @click="getAll()" data-toggle="tab">جميع المنتجات</a></li>
                <li class="nav-item"><a class="nav-link" href="#favorites" @click="getFavorited()" data-toggle="tab">في المفضلة</a></li>
                <li class="nav-item"><a class="nav-link" href="#saled" @click="getSaled()" data-toggle="tab">تم بيعها</a></li>
              </ul>
            </div><!-- /.card-header -->
            <div class="card-body">
                <div class="tab-content">
                    <!-- all products -->
                    <div class="active tab-pane" id="allproducts">
                        
                        <div class="card-body">
                            <div v-if="this.loading" class="cart-product columns-container p-3 bg-white" style="box-shadow: 0px 0px 8px 0 #c1b3b3;height:6rem">
                                <div class="loader m-auto" style="    width: 55px;height: 55px"></div>
                            </div>
                            <table v-else id="example1" class="table table-condensed">
                              <thead>
                                  <tr>
                                      
                                    <th>الصورة</th>
                                    <th>الرقم الخاص</th>
                                    <th>الاسم</th>
                                    <th>الفئة</th>
                                    <th>عدد القطع</th>
                                    <th>حدف</th>
                                    
                                  </tr>
                              </thead>
                              <tbody>
                                <tr v-for="(p,k) in products" :key="k">
                                        
                                        <td>
                                            <img :src="p.images[0]" style="height:50px ;width:50px"
                                                data-toggle="modal"  data-target="#viewImage" 
                                                :data-img="p.images[0]" 
                                                class="view-img">
                                        </td>
                                        <td>{{p.sku}}</td>
                                        <td><a :href="'/products/'+p.sku" > {{p.name.ar}}</a></td>
                                        <td>{{p.categories[0].name.ar ? p.categories[0].name.ar : p.categories[0].name.en}}</td>
                                        <td>{{getQuantity(p)}}</td>
                                        <td>
                                            <button @click="deleteProduct(p)" class="btn btn-danger">حدف</button>
                                        </td>
                                        
                                </tr>
                              </tbody>
                              <tfoot>
                              </tfoot>
                            </table>
                        </div>  
                    
                    </div>
                    <!-- the favorited products  -->
                    <div class="tab-pane" id="favorites">
                        <div class="card-body">
                            <div v-if="this.favoritesLoading" class="cart-product columns-container p-3 bg-white" style="box-shadow: 0px 0px 8px 0 #c1b3b3;height:6rem">
                                <div class="loader m-auto" style="    width: 55px;height: 55px"></div>
                            </div>
                            
                            <table v-else id="example2" class="table table-condensed">
                              <thead>
                                  <tr>
                                      
                                    <th>الصورة</th>
                                    <th>الرقم الخاص</th>
                                    <th>الاسم</th>
                                    <th>الفئة</th>
                                    <th>عدد القطع</th>
                                    <th>عدد المرات</th>
                                    
                                  </tr>
                              </thead>
                              <tbody>
                                <tr v-for="(p,k) in favoritedProducts" :key="k">
                                        
                                        <td>
                                            <img :src="p.images[0]" style="height:50px ;width:50px"
                                                data-toggle="modal"  data-target="#viewImage" 
                                                :data-img="p.images[0]" 
                                                class="view-img">
                                        </td>
                                        <td>{{p.sku}}</td>
                                        <td><a :href="'/products/'+p.sku" > {{p.name.ar}}</a></td>
                                        <td>{{p.categories[0].name.ar ? p.categories[0].name.ar : p.categories[0].name.en}}</td>
                                        <td>{{getQuantity(p)}}</td>
                                        <td>{{getFavNumber(p.sku)}}</td>
                                        
                                </tr>
                              </tbody>
                              <tfoot>
                              </tfoot>
                            </table>
                        </div> 
                    </div>
                    <!-- /.tab-pane -->
    
                    <div class="tab-pane" id="saled">
                      set
                    </div>
                    <!-- /.tab-pane -->
                </div>
              <!-- /.tab-content -->
            </div><!-- /.card-body -->
        </div>
        
       
</template>
<script>
import  axios from "axios";
export default {
    data(){
        return {
            products:[],
            favoritedProducts:[],
            loading :true,
            favoritesLoading:true,
            salesLoading:true,
            //this property is the result of fav grouped by sku 
            groupedFavorites:[],
        }
    },
    mounted(){
        var pros =  sessionStorage.getItem('products');
        if(pros !=null && pros !="undefined"){
          this.products =  JSON.parse(pros);
          this.loading = false;
        }
       
    },
    methods:{
        getAll(){
            if(this.products.length == 0){
            axios.get('/getProducts')
            .then(res  => {
                this.products = res.data.products;
                this.loading = false;
                sessionStorage.setItem('products',JSON.stringify(res.data.products));
            })
            }
            
           
        },
        getFavorited(){
           
           //test if there is products
           if(this.products.length == 0){
              this.getAll();
           }else{
              
            axios.get('getFavoritedproducts')
            .then(res  => {
               
                this.groupedFavorites = res.data;
                //map just the sku
                let skus = this.groupedFavorites.map(item => Object.keys(item))
               
                this.favoritedProducts = this.products.filter(p =>{
                    return  skus[0].indexOf(p.sku) > -1;
                } ) 
               // this.favoritedProducts = res.data;
               this.favoritesLoading = false;
            })
            
           }
         
            $("#example2").DataTable({
                "language": {
                    "paginate": {
                        "next": "التالي",
                        "previous" : "السابق"
                    }
                },
                "info" : false,
            });  
   
        },
        getSaled(){
           console.log("saled")
        },
        getFavNumber(sku){
           return this.groupedFavorites[0][sku].length;
        },
        getQuantity(p){
            let sum = 0;
           p.variations.forEach( variation =>{
               //we test if a quantity is > 0 so the size is available for this variation
               sum+= variation.quantity;
           })
           return sum;
        },
        deleteProduct(p){
             Swal.fire({
               title: 'Do you want to remove this product',
               type : "warning",
               showCancelButton: true,
               confirmButtonText: 'Submit',
           }).then((res) => {
                //this.products = this.products.filter(pr => pr.sku != p.sku);
                if(res.value){
                  axios.get('/deleteProductBySku/'+p.sku)
                    .then(res  => {
                     console.log(res)
                })   
                }
           })
            
        }
    }
    
}

</script>