<style scoped>
.sizefilter a {
  cursor: pointer;
}
</style>
<template>
           <div class="sidebar-categores-inner">
                    <div class="filter-group sizefilter">
                 
                       <a @click="filterProducts('all',$event)" class="active"><i @click="filterProducts('all',$event)" class="fa fa-check oldmain-b-color "></i> all</a>                      
                       <a v-for="size in sizelist" v-bind:key="size" class=""
                       @click="filterProducts(size,$event)"
                       ><i @click="filterProducts(size,$event)" class="fa fa-check oldmain-b-color "></i> <span class="ml-1">{{size}}</span> </a>
                                               
                      
                    </div>
           </div>
</template>

<script>
export default {
     data(){
        return {
            ageProperty :'',
            sizelist : ["Age 5-6","Age 7-8","Age 9-11","12-14 Years","14- 15 Years"]
        }
    },
    computed:{
         allproducts(){
             return this.$store.state.products;
         },
         currentProducts(){
             return this.$store.state.currentProducts
         }
      
        },
    methods:{
        filterProducts(size,event){
            let fil = [];
            document.querySelectorAll('.sizefilter a').forEach(item=>{
                item.classList.remove('active');
            })
            event.target.classList.add('active')
            event.target.parentNode.classList.add('active')
            let all=this.allproducts;

            switch (size) {
                case 'all': fil=JSON.parse(sessionStorage.getItem('products')); break;
                case "Age 9-11":
                   fil = this.allproducts
                    .filter((element) => {
                     if(element.attributes[1] != undefined){
                       return  element.attributes[1].options.some((opt) => ( opt.en =='Age 9-10' ) || (opt.en == 'Age 10-11'))
                      }
                       })
                  
                    break;
                default:
                   fil = this.allproducts
                    .filter((element) => {
                     if(element.attributes[1] != undefined){ 
                       return element.attributes[1].options.some((opt) => ( opt.en ==size ))
                       }
                       })

                    
                    break;
            }
            if(fil.length >20){
               this.$store.state.currentProducts = fil.splice(1,15);
               
            }else{
              this.$store.state.currentProducts = fil;  
            }
            this.$store.state.products = JSON.parse(sessionStorage.getItem('products'))
            
        }
    }
   
}
</script>