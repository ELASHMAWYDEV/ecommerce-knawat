<template>
                         <nav aria-label="Page navigation example" id="product-pagination">
                               <ul class="pagination p-0 mt-2">
                                   <li class="page-item" v-if="this.currentPage > 1"  @click="paginate('preview')">
                                   <a class="page-link" href="#" aria-label="Previous">
                                       <span aria-hidden="true">&laquo;</span>
                                       <span class="sr-only">Previous</span>
                                   </a>
                                   </li>
                                   <li class="page-item" v-else >
                                   <a class="page-link" href="#" aria-label="Previous" style="    cursor: not-allowed;">
                                       <span aria-hidden="true">&laquo;</span>
                                       <span class="sr-only">Previous</span>
                                   </a>
                                   </li>
                                   <!--
                                   <li class="page-item"><a class="page-link" href="#">1</a></li>
                                   <li class="page-item active"><a class="page-link" href="#">2</a></li>
                                   <li class="page-item"><a class="page-link" href="#">3</a></li>
                                   -->
                                   <li  class="page-item active " v-if="numberOfPaginationLinks > this.currentPage" @click="paginate('next')">
                                   <a class="page-link"  aria-label="Next">
                                       <span aria-hidden="true">&raquo;</span>
                                       <span class="sr-only">Next</span>
                                   </a>
                                   </li>
                                   <li  class="page-item  " v-else>
                                   <a class="page-link"  aria-label="Next" style="    cursor: not-allowed;">
                                       <span aria-hidden="true">&raquo;</span>
                                       <span class="sr-only">Next</span>
                                   </a>
                                   </li>
                               </ul>
                         </nav>
</template>
<script>
 export default{
   data(){
       return {
           currentPage : 1,
           productPerPage :10
       }
   },
   created(){
      this.setPaginationLinks();
   },
   methods:{

       paginate(type){
           if(type == "next" && Math.ceil((this.$store.state.products.length / this.productPerPage) > this.currentPage)){
               let index = this.currentPage++;
        
               
               let products = this.$store.state.products;
               
               this.$store.state.currentProducts = products.slice((index * 10) - this.productPerPage ,(index * 10))

           }else{
               let index = this.currentPage--;
               let products = this.$store.state.products;
               
               this.$store.state.currentProducts = products.slice((index * 10) - this.productPerPage ,(index * 10))

           }
           /*
           const indexOfLastProduct  = this.currentPage * productPerPage;
           const indexOfFirstProduct = indexOfLastProduct - productPerPage; 
           const currentProducts = this.$store.state.slice(indexOfFirstProduct,indexOfLastProduct)
           */
       },
       setPaginationLinks(){
           let nb = Math.ceil(this.$store.state.products / this.productPerPage );
           console.log(nb)
       }
       
       
   },
     computed:{
      allproducts(){
        return this.$store.state.products;
      },
      numberOfPaginationLinks(){
          return Math.ceil((this.$store.state.products.length / this.productPerPage))
      },
      ploading(){
          return this.$store.state.ploading
      } 
    }
}

</script>