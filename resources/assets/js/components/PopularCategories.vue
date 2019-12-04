<template>
<div>
    <h6 class="mt-2 ">
      <span class="slide-choosen-categories oldmain-b-color d-inline-block">{{lang ? 'تصنيفات مميزة' : 'Popular Categories'}} <hr class="hr-choosen-c"></span>
      <hr class="hr-full-slide-section">
    </h6>
    <div class="most-cat-sellers shop-product-wrap  mt-3" >
                         <div class="row">
                                
                             <div  class="col-md-4 " v-for="(c,k) in popularcategories" :key="k">
                                 <div class="media  p-2 bg-white" style="box-shadow: 0px 0px 4px 0 #b8adad;min-height: 166px;">
                                   <img  @mouseenter="setCurrentCategory(c.name.en)" :src="'https://app.knawat.com/images/categories/empty.svg'"
                                    class="img-responsive " :class="lang ? 'mr-2' : ''" alt="category image" >
                                   <div class="media-body" style="font-size: 14px">
                                           <a @mouseenter="setCurrentCategory(c.name.en)" href="" class="mt-0  cat-name">{{lang ? c.name.ar : c.name.en}}</a>
                                           <p class="text-muted">{{lang ? 'أشهر الأصناف بناءا على عدد الزيارات وعمليات الشراء' : 'A popular category based on visitors count and rates'}}</p>
                                           <a @mouseenter="setCurrentCategory(c.name.en)" href="/products" target="_blink">{{!lang ? 'See All' : 'رؤية الكل' }}</a>
                                   </div>
                                   
                                 </div>
                                  
                             </div>
                              
                             
                         </div>
    </div>
</div>
</template>
<script>
import currencyMixins from '../mixins/currencyMixins';
import mixins from '../mixins/mixins';
import categoryMixins from '../mixins/categoryMixins';

export default {
    data(){
        return {
            popularcategories:[],
            categories :[],
            restOfCategories:[]
        }
    },
    created(){
        this.setCategories();
    },
    mounted(){
        
        this.setPopularCategories();
        
    },
    mixins:[mixins, currencyMixins,categoryMixins],
    methods:{
        setPopularCategories(){
             let c = [];
            if(this.allcategories.length > 0){ c = this.allcategories;}else{c = this.categories}
            this.popularcategories = c.slice(0,3);
        }
    },
    computed:{
       allproducts(){
            return this.$store.state.products;
        },
    }
}
</script>