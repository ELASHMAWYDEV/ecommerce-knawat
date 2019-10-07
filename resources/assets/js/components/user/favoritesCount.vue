<template>
<i class="badge-info rounded-badge main-b-bg">{{favoritesCount}}</i>
</template>
<script>
export default {
   
   computed:{
       favoritesCount(){
           return this.$store.state.favoritesCount;
       }
   }
}

</script>