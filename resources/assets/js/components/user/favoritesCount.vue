<template>
<i class="badge-info rounded-badge main-r-bg">{{favoritesCount}}</i>
</template>
<script>
export default {
   data(){
       return {
          
       }
   },
   computed:{
       favoritesCount(){
           return this.$store.state.favoritedProducts.length;
       },
       authId(){
           return this.$store.state.authId;
       }
   },
   mounted(){
       this.getFavoritedProducts();
   },
   methods:{
        //get favorited items 
      getFavoritedProducts(){
        
        
        axios.get('/users/'+this.authId+'/favorites')
        .then(res => {
    
          this.$store.state.favoritedProducts = res.data;
        
        })
        .catch(err => console.log(err))
      },
   }
}

</script>