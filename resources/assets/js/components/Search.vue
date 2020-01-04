<style scoped>
.searchrslt{
    position: relative;
    height: 0;
    z-index: 99;
    width: 98%;
    margin-top: 2px;
}
.searchrslt img {width:50px;height:50px;margin-right:4px}
.searchrslt a {text-decoration: none;    color: #0d2034;}
</style>
<template>
    <div>
    <input class="form-control mr-sm-2 nav-item top-search-input" 
     type="search" :placeholder="this.lang == null ? 'Search products' : 'بحث عن منتج'" aria-label="Search"
     v-model="searchproducts">
     <ul class="list-group searchrslt" v-show="this.searchproducts.length > 0">
        <li class="list-group-item" v-show="this.entireResult.length == 0">{{!lang ? 'Sorry , we can\'t find any profuct' : 'للأسف لم يتم العثور على أي منتج'}}</li>
        <li class="list-group-item"  v-for="(p,k) in this.entireResult.slice(0,5)" :key="k">
            <a :href="'/products/'+p.sku">
            <img :src="p.images[0]" alt="image result" >
            {{!lang ? p.name.en : p.name.ar}}    
            </a>
        </li>
        <li class="list-group-item" v-show="this.entireResult.length > 5"><a style="    color: #f2c21a;" href="#" @click="showAllresults()">{{!lang ? 'View All Results' : 'رؤية كل النتائج'}} ({{this.entireResult.length}}) </a></li>
     </ul>
     </div>
</template>
<script>
export default {
    data(){
        return {
            searchproducts : '',
            entireResult:[],
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
                         return (product.name.en.toString().toLowerCase()).includes(query) || (product.name.ar.toString().toLowerCase()).includes(query)
                    })
                //this.$store.state.currentProducts = fil;
                console.log(fil)
                this.entireResult = fil;
            

         }
     }
    },
     computed:{
         allproducts(){
             return this.$store.state.products;
         },
         lang(){
             return this.$store.state.lang;
         },
         currentProducts(){
             return this.$store.state.currentProducts;
         }
        
     },
     methods:{
         showAllResults(){
             this.$store.state.currentProducts = this.entireResult;
             window.location.href = "/products";
         }
     }
}
</script>