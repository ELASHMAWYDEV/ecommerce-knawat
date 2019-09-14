<template>
             <ul class="dropdown-menu">
                <li class="dropdown-item" 
                    v-for="c in categories"
                    :key="c.id"
                    @click="filterproducts(c.name.en)">
                    <a tabindex="-1">{{c.name.en}}</a>
                </li>
                <li class="dropdown-submenu">
                    <a class="test dropdown-item" tabindex="-1" >
                        More <i class="fa fa-caret-right float-right"></i>
                    </a>
                    <ul class="dropdown-menu" style="left: 103%; margin-top: -139%;">
                    <li class="dropdown-item" 
                     v-for="rc in restOfCategories"
                     :key="rc.id" 
                     @click="filterproducts(rc.name.en)">
                       <a class="" >
                           {{rc.name.en}}
                       </a>
                    </li>
                   
                    </ul>
                </li>
             </ul>
</template>
<script>
export default {
   data(){
       return {
         categories :[], 
         restOfCategories :[] 
       }
       
   },
   created(){
       let categories =sessionStorage.getItem('categories');
     if(categories != null){
       //console.log("not null")
       this.categories = JSON.parse(categories).splice(1,10);
       this.restOfCategories = JSON.parse(categories).splice(10);
     }else{
          this.fetchCategories();
     }
   },
   methods:{
    fetchCategories(){
        axios.get('/getCategories')
        .then(res => {
            sessionStorage.setItem('categories',JSON.stringify(res.data))
            this.categories =res.data.splice(1,10);
            this.restOfCategories = res.data.splice(10)
            
        })
    },
    filterproducts(type){

       let products = this.$store.state.products;
      
       let fil = products
        .filter((element) => 
            element.categories.some((c) => c.name.en == type))
        .map(element => {
            return Object.assign({}, element, {categories : element.categories.filter(subElement => subElement.name.en == type)});

        }); 
        this.$store.state.currentProducts = fil;
        console.log("prod",fil);



       //console.log(type)
       /*let fil = products.filter(function(product){
           let l = product.categories.length ;
           product.categories.includes(type);*/
           //console.log("1st length"+l)
          /* product.categories =  product.categories.filter(c =>{
            console.log(c.name.en.trim() == type)
            return  c.name.en.trim() == type.trim()
         }) */
         //console.log("2nd length"+product.categories.length)
         //return product;
         // return product.categories.length == l;
           // product.categories[0]
          // return product
       //});
       
            
    }
   }
   ,
    computed:{
      allproducts(){
        return this.$store.state.products;
      },
      currentProducts :{
          get(){
              return this.$store.state.currentProducts;
          },
          set(value){
              this.$store.state.currentProducts = value;
          }
      }
      
    }
}

$(document).ready(function(){
  $('.dropdown-submenu a.test').on("click", function(e){
    $(this).next('ul').toggle();
    e.stopPropagation();
    e.preventDefault();
  });
});
</script>
