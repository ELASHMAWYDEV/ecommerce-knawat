export default {
   
    methods: {
        fetchallProducts(){
          
            axios.get('/getProducts')
            .then(res => {
              console.log("all",res)
             // this.products = res.data.products;
              //sessionStorage.setItem('products',JSON.stringify(this.products))
              this.$store.state.products = res.data.products
               sessionStorage.setItem('products',JSON.stringify(res.data.products))
               this.setShirtsProducts();
               this.setPhoneProducts(); 
               /* set alll the categories */
               setTimeout(this.setCategories(),2000)
             
            })
            .catch(error => {
                    alert("error")
                  })
          },
    },
    computed:{

    }
}