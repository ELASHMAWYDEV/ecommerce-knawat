<style scoped>
.dropdown-menu{
      position: inherit;
    background: #464f58;
}
.dropdown-menu a{    color:#d4cccc !important;font-size:0.9rem}
.catimg{  width: 24px;
    height: 24px;
    margin-right: 3px;
    margin-top: -6px;}
    .caticon{color: #d4cccc;
    }
</style>
<template>
<li class="nav-item d-sm-none">
 <nav class="navbar p-0">
    <li class="nav-item dropdown d-lg-none  open w-100">
        <a class="nav-link " href="#" role="button" data-toggle="dropdown" 
        aria-haspopup="true" aria-expanded="false"  @mouseenter.once="setCategories()"
        style="    padding: 0.2rem 0;">
           <i class="fa fa-link mr-1 caticon" 
           :style="!lang ? ' margin-left: -18px;' : ' margin-right: -18px;'" aria-hidden="true"></i>
           {{(lang != null) ? 'الأصناف 1' :'Categories 1' }}  
        </a>
        <div class="dropdown-menu w-100" v-if="this.loading">
            <img  src="/img/loadingP.gif" alt="loading" style="margin: auto;display:list-item">
        </div>
        <div class="dropdown-menu w-100" aria-labelledby="allcategory">
          <a
                v-for="c in categories"
                :key="c.id"
                @click="filterproducts(c.name.en)"
                href="javascript:void()"
           class="dropdown-item p-0" >
           <img :src="getcatsrc(c.name.en)" class="catimg" alt="category image">
           {{lang ? c.name.ar : c.name.en}}

          </a>
          <!-- <a class="test dropdown-item" tabindex="-1" @click="showRestCategories()">
                       {{lang ? 'المزيد' : 'More'}} <i class="fa fa-caret-right float-right"></i>
          </a> -->
         
          
        </div>
    </li>
    <li v-if="restOfCategories.length > 0" class="nav-item dropdown d-lg-none  open w-100">
        <a class="nav-link " href="#" role="button" data-toggle="dropdown" 
        aria-haspopup="true" aria-expanded="false"  @mouseenter.once="setCategories()"
        style="    padding: 0.2rem 0;">
        <i class="fa fa-link mr-1 caticon" 
        :style="!lang ? ' margin-left: -18px;' : ' margin-right: -18px;'" aria-hidden="true"></i>
           {{(lang != null) ? 'الأصناف 2' :' Categories 2' }}  
        </a>
        <div class="dropdown-menu w-100" v-if="this.loading">
            <img  src="/img/loadingP.gif" alt="loading" style="margin: auto;display:list-item">
        </div>
        <div class="dropdown-menu w-100" aria-labelledby="allcategory">
          <a
                v-for="c in restOfCategories"
                :key="c.id"
                @click="filterproducts(c.name.en)"
                href="javascript:void()"
           class="dropdown-item p-0" >
           <img :src="getcatsrc(c.name.en)" class="catimg" alt="category image">
           {{lang ? c.name.ar : c.name.en}}

          </a>
          <!-- <a class="test dropdown-item" tabindex="-1" @click="showRestCategories()">
                       {{lang ? 'المزيد' : 'More'}} <i class="fa fa-caret-right float-right"></i>
          </a> -->
         
          
        </div>
    </li>
    <li v-if="restOfCategories1.length > 0" class="nav-item dropdown d-lg-none  open w-100">
        <a class="nav-link " href="#" role="button" data-toggle="dropdown" 
        aria-haspopup="true" aria-expanded="false"  @mouseenter.once="setCategories()"
        style="    padding: 0.2rem 0;">
          <i class="fa fa-link mr-1 caticon" 
          :style="!lang ? ' margin-left: -18px;' : ' margin-right: -18px;'" aria-hidden="true"></i>
           {{(lang != null) ? 'الأصناف 3' :' Categories 3' }}  
        </a>
        <div class="dropdown-menu w-100" v-if="this.loading">
            <img  src="/img/loadingP.gif" alt="loading" style="margin: auto;display:list-item">
        </div>
        <div class="dropdown-menu w-100" aria-labelledby="allcategory">
          <a
                v-for="c in restOfCategories1"
                :key="c.id"
                @click="filterproducts(c.name.en)"
                href="javascript:void()"
           class="dropdown-item p-0" >
           <img :src="getcatsrc(c.name.en)" class="catimg" alt="category image">
           {{lang ? c.name.ar : c.name.en}}

          </a>
          <!-- <a class="test dropdown-item" tabindex="-1" @click="showRestCategories()">
                       {{lang ? 'المزيد' : 'More'}} <i class="fa fa-caret-right float-right"></i>
          </a> -->
         
          
        </div>
    </li>
   <!--  <div v-if="restOfCategories.length > 0" class="dropdown-submenu container w-100">
                   
                    <ul  class="border w-100" id="categorysm" >
                    <li class="dropdown-item"
                     v-for="rc in restOfCategories"
                     :key="rc.id" 
                     @click="filterproducts(rc.name.en)">
                       <a class="" >
                          {{(lang != null) ? rc.name.ar : rc.name.en}}
                       </a>
                    </li>
                   
                    </ul>
    </div> -->
 </nav>
 </li>
</template>
<script>
import mixins from '../mixins/mixins';
import categoryMixins from '../mixins/categoryMixins';
export default {
    data(){
       return {
         categories :[], 
         restOfCategories :[] ,
         restOfCategories1 :[] ,
         loading:false
       }
       
   },
   mixins:[mixins,categoryMixins],
   methods:{


    /* filte products by categorie */
    filterproducts(type){

       let products = this.$store.state.products;
      
       let fil = products
        .filter((element) => 
            element.categories.some((c) => c.name.en == type))
        .map(element => {
            return Object.assign({}, element, {categories : element.categories.filter(subElement => subElement.name.en == type)});

        }); 
        this.$store.state.currentProducts = fil;
        this.hideRestCategories();
    },
      setCategories(){
        this.loading = true;
     let categories =sessionStorage.getItem('categories');
     if(categories != null){
        
       console.log("there is categories")
       this.categories = JSON.parse(categories).splice(1,8);
       this.restOfCategories = JSON.parse(categories).splice(8,14);
       this.restOfCategories1 = JSON.parse(categories).splice(14);
    
     }else{
     
             
             this.categories = this.allcategories.splice(1,8);
              this.restOfCategories =  this.allcategories.splice(8,14);
              this.restOfCategories1 =  this.allcategories.splice(14);
            
           
         
          
     }
      this.loading = false;
     }
     ,
     showRestCategories(){
          document.querySelector('#categorysm').classList.add('shown');
     }
     ,
     hideRestCategories(){
          document.querySelector('#categorysm').classList.remove('shown');
     },
     getcatsrc(catname){
        let products = this.$store.state.products;
        
          let fil = products
          .filter((element) => 
              element.categories.some((c) => c.name.en == catname))
          .map(element => {
              return Object.assign({}, element, {categories : element.categories.filter(subElement => subElement.name.en == catname)});

          }); 
          //get the image of first product
          let firstp = fil[Math.floor(Math.random() * (fil.length - 1))];
          return firstp.images[0];
     }
   }
   ,
    computed:{
      /*get all categories in store */
      allcategories(){
        return this.$store.state.categories;
      },
      /* get all products in the store */
      allproducts(){
        return this.$store.state.products;
      },
      /* the current products shown in the page */
      currentProducts :{
          get(){
              return this.$store.state.currentProducts;
          },
          set(value){
              this.$store.state.currentProducts = value;
          }
      }
      
    }
}

     
 

</script>