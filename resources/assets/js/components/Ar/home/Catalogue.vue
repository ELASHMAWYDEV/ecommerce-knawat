<template>
<li class="nav-item dropdown text-light d-none d-lg-inline-block open">
               <a href="#" id="allcategory" 
                class="nav-link main-r-bg " @mouseenter.once="setCategories()">
                 جميع التصنيفات  
               </a> 
               <ul class="dropdown-menu w-100">
                <li class="dropdown-item"  
                    v-for="c in categories"
                    :key="c.id"
                    @mouseenter="setCurrentCategory(c.name.en)"
                    >
                    <a tabindex="-1" href="/products" target="_blink"  @mouseenter="hiderestc()" >
                        {{c.name.ar ? c.name.ar : c.name.en}}
                    </a>
                </li>
                <li v-if="restOfCategories.length > 0" class="dropdown-submenu">
                        <a tabindex="-1" class="test dropdown-item" @mouseenter="showrestc()">
                           المزيد   <i class="fa fa-caret-left float-right"></i>
                        </a> 
                        <ul id="showrc" class="dropdown-menu" style="margin-right: 100%;
                        margin-top: -116%;
                        z-index: 9999;position: absolute;right: 0px;top: 7rem;left: auto;">
                            <li  
                                v-for="rc in restOfCategories"
                                :key="rc.id" 
                                 class="dropdown-item" 
                                 @mouseenter="setCurrentCategory(rc.name.en)">
                             <a class="" href="/products" target="_blink" >
                               {{rc.name.ar ? rc.name.ar : rc.name.en}}
                             </a>
                            </li>
                        </ul>
                </li>
               </ul>
</li>
    
</template>
<script>
  import categoryMixins from '../../../mixins/categoryMixins';
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