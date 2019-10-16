export default {
   
    methods: {
      /// add to favorite fonctionality
       addPToFavorite(sku,event){
          if(this.authId.length > 0){
          event.target.parentNode.classList.add('favorited')
          axios.post('/user/favorites/add',{user_id:this.authId,sku:sku})
          .then(res => {
            //console.log(res)
          
            Swal.fire({
              type: 'success',
              html: res.data.data,
            })
            if(res.data.data !== "the product already favorited"){
              this.$store.state.favoritedProducts.push(sku) ;
            }
            
          })
          }else{
            Swal.fire({
              type: 'error',
              html: 'please login to add to your favorites <br>\
              <a href="" data-target="#login-modal" data-toggle="modal">login</a>',
            })
          // document.querySelector('#loginto').style.display = 'block';
          }
       },
       //set the color of button to favorited items 
       checkFavoritedProducts(){
        document.querySelectorAll('.wishlist').forEach(item =>{
          if(this.favoritedProducts.indexOf(item.getAttribute("datasku")) > -1 ){
            item.classList.add('favorited');
          }
        })
       },
       //add item to cart both in products page and in details page 
       addToCart(product,event){
         if(this.authId.length > 0){
           let  maxQTE =0;
           product.variations.forEach( variation =>{
              maxQTE+= variation.quantity;
           })
           if(maxQTE == 0){
             Swal.fire({
               type:'warning',
               title: 'Sorry the product is not available now !',
             })
             return false;
           }
           
           Swal.fire({
               title: 'please select a quantity',
               html:'<h6>max quantity :'+maxQTE+'</h6>',
               input: 'number',
               inputAttributes: {
               min: 1,
               max: maxQTE,
               step: 1
               },
               showCancelButton: true,
               confirmButtonText: 'Submit',
               showLoaderOnConfirm: true,
               preConfirm: (quantity) => {
                   
               },
               allowOutsideClick: () => !Swal.isLoading()
           }).then((quantity) => {
                 if(quantity.value){
                 axios.post('/user/carItems/add',{
                     user_id : this.authId,sku:product.sku,quantity:quantity.value
                 })
                 .then(res => {
                     event.target.innerHTML='\
                     added to cart \
                     <i class="fa fa-check text-light ml-2" style="position:relative;top:2px"></i>';
                     if(res.data.type == "success"){
                       this.$store.state.cartItems.push(product.sku)
                     }
                     Swal.fire({
                            title: res.data.msg,
                            type: res.data.type,
                     })
                 })
                 .catch(err =>{alert(err)})
                 }
         })
         }else{
         Swal.fire({
           type: 'error',
           html: 'please login to add to your favorites <br>\
            <a href="" data-target="#login-modal" data-toggle="modal">login</a>',
         })
        // document.querySelector('#loginto').style.display = 'block';
       }
       },
       //check if an item is in cart or not 
       //the item is an object {sku,quantity}
       checkItemIsInCart(sku){
         return this.cartItems.filter(item => item.sku== sku).length ==1;
       }
       
       
      },
      computed:{
         cartItems(){
           return this.$store.state.cartItems;
         }
      }
  };