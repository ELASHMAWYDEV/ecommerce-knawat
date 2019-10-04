<template>
            <li class="nav-item dropdown text-light d-none d-lg-inline-block">
              <a class="nav-link main-r-bg " href="#" id="allcategory" role="button" data-toggle="dropdown" 
              aria-haspopup="true" aria-expanded="false" @mouseenter.once="setCategories()">
                All Categories   
              </a>
             <ul class="dropdown-menu" v-if="this.loading">
                   <img  src="/img/loadingP.gif" alt="loading" style="margin: auto;display:list-item">
             </ul>
             <ul class="dropdown-menu"  v-else >
                <li class="dropdown-item"  
                    v-for="c in categories"
                    :key="c.id"
                    @click="filterproducts(c.name.en)" >
                    <a tabindex="-1" @mouseenter="hiderestc()">{{c.name.en}}</a>
                </li>
                <li v-if="restOfCategories.length > 0" class="dropdown-submenu">
                    <a class="test dropdown-item"  @mouseenter="showrestc()" tabindex="-1" >
                        More <i class="fa fa-caret-right float-right"></i>
                    </a>
                    <ul class="dropdown-menu" id="showrc" style="left: 103%; margin-top: -139%;">
                    <li class="dropdown-item" 
                     v-for="rc in restOfCategories"
                     :key="rc.id" 
                     @click="filterproducts(rc.name.en)">
                       <a class="" >
                           {{rc.name.en}}
                       </a>
                    </li>
                   
                    </ul>
                </li>
             </ul>
            </li>
             
</template>
<script>
export default {
   data(){
       return {
         categories :[], 
         restOfCategories :[] ,
         loading:false
       }
       
   },
   created(){
    
    
   },
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
        this.hiderestc();
    },
      setCategories(){
        this.loading = true;
     let categories =sessionStorage.getItem('categories');
     if(categories != null){
        
       console.log("there is categories")
       this.categories = JSON.parse(categories).splice(1,10);
       this.restOfCategories = JSON.parse(categories).splice(10);
    
     }else{
     
             
             this.categories = this.allcategories.splice(1,10);
             this.restOfCategories = this.allcategories.splice(10);
            
           
         
          
     }
      this.loading = false;
     },
     //show rest categories menu 
      showrestc(){
       document.querySelector('#showrc').classList.add('show')
     },
      hiderestc(){
       document.querySelector('#showrc').classList.remove('show')
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
/*/ toggle to the rest of categories button */
$(document).ready(function(){
  $('.dropdown-submenu a.test').on("click", function(e){
   
    console.log('yeyyy')
    $(this).siblings('ul').addClass('show');
   
  });
   
});


</script>
