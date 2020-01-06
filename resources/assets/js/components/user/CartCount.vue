<template>
 <i class="fa fa-shopping-cart fa-lg main-b-color ">
    <i class="badge-info main-r-bg rounded-badge" style="font-size: 15px;position: relative;top: -10px;">{{CartItemsCount}}</i>
 </i> 
</template>
<script>
import headerMixins from '../../mixins/headerMixins.js'

export default {
   data(){
       return {
          
       }
   },
   mixins:[headerMixins],
   computed:{
       CartItemsCount(){
           return this.$store.state.cartItems.length;
       },
   },
   mounted(){
       this.getcartItems();
   },
   methods:{
       getcartItems(){
 
        axios.get('/users/'+this.authId+'/cartItems')
        .then(res => {
    
          this.$store.state.cartItems = res.data;
        
        })
        .catch(err => console.log(err))
      },
   }
}

</script>