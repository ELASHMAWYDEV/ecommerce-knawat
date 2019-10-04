<template>
            <div class="product-show pt-1">
                <label for="SortBy" >Sort by</label>
                <select name="SortBy" v-model="SortProperty"  id="SortBy" style="padding: 2px;">
                    <option value="title-ascending">Alphabetically, A-Z</option>
                    <option value="title-descending">Alphabetically, Z-A</option>
                    <option value="price-ascending">Price, low to high</option>
                    <option value="price-descending">Price, high to low</option>

                </select>
            </div>
</template>
<script>
export default {
    data(){
        return {
            SortProperty :'------'
        }
    },
    watch:{
       SortProperty(query){
              let sortedProducts = [];
              switch(query){

              case 'title-ascending':
                sortedProducts = this.allproducts.sort(function(a, b) {
                   
                     if((a.name.en).substring(0,1) > (b.name.en).substring(0,1))
                    {
                        return 1;
                    }else{
                        return -1;
                    }
                    return 0;
                });
                  break;
              case 'title-descending':
                   sortedProducts = this.allproducts.sort(function(a, b) {
                   
                     if((a.name.en).substring(0,1) > (b.name.en).substring(0,1))
                    {
                        return -1;
                    }else{
                        return 1;
                    }
                    return 0;
                    });
                      break;
              case 'price-ascending':
                   sortedProducts = this.allproducts.sort(function(a, b) {
                   
                     if((a.variations[0].sale_price) > (b.variations[0].sale_price))
                    {
                        return -1;
                    }else{
                        return 1;
                    }
                    return 0;
                    });
                      break;
              case 'price-descending':
                   sortedProducts = this.allproducts.sort(function(a, b) {
                   
                     if((a.variations[0].sale_price) < (b.variations[0].sale_price))
                    {
                        return -1;
                    }else{
                        return 1;
                    }
                    return 0;
                    });
                     break;
               
                   default:
                       sortedProducts =  this.allproducts;
                       break;
                }
               
          
          let tran =  sortedProducts;
            this.$store.state.currentProducts = tran.splice(1,10)
           this.$store.state.products = [...this.currentProducts,...sortedProducts];
          
       }
    },
    computed:{
        allproducts(){
            return this.$store.state.products
        },
        currentProducts(){
            return this.$store.state.currentProducts;
        }

    }
}
</script>