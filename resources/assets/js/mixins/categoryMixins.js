export default {


    methods:{
     setCategories(){
        this.loading = true;
     let categories =sessionStorage.getItem('categories');
     if(categories != null && categories != "undifined"){
        
       console.log("there is categories")
       this.categories = JSON.parse(categories).splice(1,10);
       this.restOfCategories = JSON.parse(categories).splice(10);
    
     }else{
              
             
             this.categories = this.allcategories.splice(1,10);
             this.restOfCategories = this.allcategories.splice(10);
            
     }
      this.loading = false;
     },
     //show rest categories menu 
      showrestc(){
       document.querySelector('#showrc').classList.add('show')
     },
      hiderestc(){
       document.querySelector('#showrc').classList.remove('show')
     },
     setCurrentCategory(categoryName){
        localStorage.setItem('activeCategory',categoryName);
    }
    },
    computed:{
         /*get all categories in store */
      allcategories(){
        return this.$store.state.categories;
      },
      /* get all products in the store */
      allproducts(){
        return this.$store.state.products;
      },
      /* the current products shown in the page */
      currentProducts :{
          get(){
              return this.$store.state.currentProducts;
          },
          set(value){
              this.$store.state.currentProducts = value;
          }
      },
      
    }
}