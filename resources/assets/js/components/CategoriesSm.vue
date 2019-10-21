<template>
 <nav class="navbar allcat-xs">
    <li class="nav-item dropdown text-light  d-lg-none  container">
        <a class="nav-link main-r-bg" href="#" id="allcategory" role="button" data-toggle="dropdown" 
        aria-haspopup="true" aria-expanded="false"  @mouseenter.once="setCategories()">
          <i class="fa fa-bars"></i> All Categories 
        </a>
        <div class="dropdown-menu" v-if="this.loading">
            <img  src="/img/loadingP.gif" alt="loading" style="margin: auto;display:list-item">
        </div>
        <div class="dropdown-menu" aria-labelledby="allcategory">
          <a
                v-for="c in categories"
                :key="c.id"
                @click="filterproducts(c.name.en)"
           class="dropdown-item" >{{c.name.en}}

          </a>
          <a class="test dropdown-item" tabindex="-1" @click="showRestCategories()">
                        More <i class="fa fa-caret-right float-right"></i>
          </a>
         
          
        </div>
    </li>
    <div v-if="restOfCategories.length > 0" class="dropdown-submenu container w-100">
                   
                    <ul  class="border w-100" id="categorysm" >
                    <li class="dropdown-item"
                     v-for="rc in restOfCategories"
                     :key="rc.id" 
                     @click="filterproducts(rc.name.en)">
                       <a class="" >
                           {{rc.name.en}}
                       </a>
                    </li>
                   
                    </ul>
    </div>
 </nav>
</template>
<script>
import mixins from '../mixins/mixins';
import categoryMixins from '../mixins/categoryMixins';
export default {
    data(){
       return {
         categories :[], 
         restOfCategories :[] ,
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
       this.categories = JSON.parse(categories).splice(1,9);
       this.restOfCategories = JSON.parse(categories).splice(9);
    
     }else{
     
             
             this.categories = this.allcategories.splice(1,9);
             this.restOfCategories = this.allcategories.splice(9);
            
           
         
          
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