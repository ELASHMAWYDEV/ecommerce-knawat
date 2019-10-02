<template>
    <input class="form-control mr-sm-2 nav-item top-search-input" 
     type="search" placeholder="Search products" aria-label="Search"
     v-model="searchproducts">
</template>
<script>
export default {
    data(){
        return {
            searchproducts : ''
        }
    },
    watch:{
     searchproducts:function(query){
         console.log(query)
     }
    }
}
</script>