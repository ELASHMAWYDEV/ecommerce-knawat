<template>
    <input class="form-control mr-sm-2 nav-item top-search-input" 
     type="search" :placeholder="this.lang == null ? 'Search products' : 'بحث عن منتج'" aria-label="Search"
     v-model="searchproducts">
</template>
<script>
export default {
    data(){
        return {
            searchproducts : ''
        }
    },
    created(){
       this.$store.state.authId = this.userid;
    },
    props :['userid','lang'],
    watch:{
     searchproducts:function(query){
         console.log(query)
         if(query.length > 2){
    
                let fil = this.allproducts
                    .filter(product =>{
                         return (product.name.en).includes(query) || (product.name.ar).includes(query)
                    })
                this.$store.state.currentProducts = fil;
            

         }
     }
    },
     computed:{
         allproducts(){
             return this.$store.state.products;
         },
        
     }
}
</script>