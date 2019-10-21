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
                    <!--if its the home page then the link will be with href -->
                    <a v-if="isHome" tabindex="-1" @mouseenter="setCurrentCategory(c.name.en)" href="/products" target="_blink">
                    {{c.name.en}}</a>
                    <a v-else tabindex="-1" @mouseenter="hiderestc()" >
                    {{c.name.en}}</a>
                </li>
                <li v-if="restOfCategories.length > 0" class="dropdown-submenu">
                    <a class="test dropdown-item"  @mouseenter="showrestc()" tabindex="-1" >
                        More <i class="fa fa-caret-right float-right"></i>
                    </a>
                    <ul class="dropdown-menu" id="showrc" style="left: 103%; margin-top: -139%;">
                    <li class="dropdown-item" 
                     v-for="rc in restOfCategories"
                     :key="rc.id" 
                     
                     @click="filterproducts(rc.name.en)"
                     >
                       <a v-if="isHome" class="" href="/products" @mouseenter="setCurrentCategory(rc.name.en)" target="_blink"> 
                           {{rc.name.en}}
                       </a>
                       <a v-else class="" >
                           {{rc.name.en}}
                       </a>
                    </li>
                   
                    </ul>
                </li>
             </ul>
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
         loading:false,
         isHome:true,
       }
       
   },
   mixins:[mixins,categoryMixins],
   created(){
       if(window.location.pathname =='/products'){
         this.isHome = false;
       }
    
   },
   methods:{

      
     
     
   }
   ,
    computed:{
     
      
    }
}
/*/ toggle to the rest of categories button */
$(document).ready(function(){
  $('.dropdown-submenu a.test').on("click", function(e){
   
    $(this).siblings('ul').addClass('show');
   
  });
   
});


</script>
