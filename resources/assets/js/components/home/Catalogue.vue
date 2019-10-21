<template>
<li class="nav-item dropdown text-light d-none d-lg-inline-block open">
               <a href="#" id="allcategory" role="button" data-toggle="dropdown" aria-haspopup="true" 
               aria-expanded="false" class="nav-link main-r-bg " @mouseenter.once="setCategories()">
                 All Categories   
               </a> 
               <ul class="dropdown-menu w-100">
                <li class="dropdown-item"  
                    v-for="c in categories"
                    :key="c.id"
                    @mouseenter="setCurrentCategory(c.name.en)"
                    >
                    <a tabindex="-1" href="/products" target="_blink"  @mouseenter="hiderestc()" >
                        {{c.name.en}}
                    </a>
                </li>
                <li v-if="restOfCategories.length > 0" class="dropdown-submenu">
                        <a tabindex="-1" class="test dropdown-item" @mouseenter="showrestc()">
                           More   <i class="fa fa-caret-right float-right"></i>
                        </a> 
                        <ul id="showrc" class="dropdown-menu" style="margin-left: 100%;margin-top: -116%;z-index: 9999;position: absolute;    left: 0;top: 7rem;">
                            <li  
                                v-for="rc in restOfCategories"
                                :key="rc.id" 
                                 class="dropdown-item" 
                                 @mouseenter="setCurrentCategory(rc.name.en)">
                             <a class="" href="/products" target="_blink" >
                               {{rc.name.en}}
                             </a>
                            </li>
                        </ul>
                </li>
               </ul>
</li>
    
</template>
<script>
  import categoryMixins from '../../mixins/categoryMixins';
export default {
    data(){
       return {
          categories :[], 
         restOfCategories :[] ,
         
       }
    },
    mixins:[categoryMixins],
    methods:{
     
    },
    computed:{
        
    }
}
</script>