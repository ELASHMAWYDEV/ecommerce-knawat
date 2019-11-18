<template>
    

</template>
<script>
export default {
    props:['lang'],
    created(){
        this.$store.state.lang = this.lang
    }
}
</script>