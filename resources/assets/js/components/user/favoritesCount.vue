<template>
 <i class="fa fa-heart fa-lg main-b-color ">
    <i class="badge-info main-r-bg rounded-badge" style="font-size: 15px;position: relative;top: -10px;">{{favoritesCount}}</i>
 </i> 

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