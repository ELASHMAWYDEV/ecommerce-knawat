<style scoped>

.checkout-btn{background:#7AA93C;    min-width: 9rem;}
.cart-product .media{border:1px solid #dee2e6!important}
.cart-product img{height: 75px;
    width: 65px;}
.product-title{
            font-size: 1.2rem;
    font-weight: 500;
    text-transform: capitalize;
    }
.delete-p-btn{
      font-size: 1.5rem;
    font-weight: bold;
    opacity: 0.6;
    cursor: pointer; 
  margin-right: 0.8rem;
    margin-top: 0.6rem;
}
.cart-total-info{
    background: #FAFAFA;max-height: 11rem;

    padding: 1rem;
    text-align: center;
}
@media(max-width:400px){
    .product-title{    font-size: 1rem;}
}
@media(max-width:576px){
    .row .cart-product{   padding: 0 !important;}
}
/***** */
.cart-section tbody tr td .mobile-cart-content, .wishlist-section tbody tr td .mobile-cart-content {
    display: none;
    -webkit-box-pack: center;
    -ms-flex-pack: center;
    justify-content: center;
    margin-top: 10px;
}
.cart-section tbody tr td .mobile-cart-content .col-xs-3, .wishlist-section tbody tr td .mobile-cart-content .col-xs-3 {
    -ms-flex-item-align: center;
    align-self: center;
    margin-left: 10px;
    margin-right: 10px;
}
.cart-section tbody tr td .mobile-cart-content .qty-box, .wishlist-section tbody tr td .mobile-cart-content .qty-box {
    border-radius: 5px;
}
.cart-section .cart-table thead th, .wishlist-section .cart-table thead th {
    border-bottom-width: 1px;
    font-weight: 900;
    color: #222222;
    text-transform: uppercase;
    font-size: 14px;
    border-top: 0;
    text-align: center;
    padding: 0 0.75rem 0.75rem 0.75rem;
}
.cart-section tbody tr td, .wishlist-section tbody tr td {
    color: #777777;
    text-align: center;
}
.cart-section tbody tr td .mobile-cart-content .qty-box .input-group .form-control, .wishlist-section tbody tr td .mobile-cart-content .qty-box .input-group .form-control {
    width: 48px;
    padding: 6px;
}
.cart-section tbody tr td .mobile-cart-content h2, .wishlist-section tbody tr td .mobile-cart-content h2 {
    font-size: 20px;
}
@media (max-width: 767px){
.cart-section tbody tr td .mobile-cart-content {
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
}
.cart-section tbody tr td:nth-last-child(-n+4) {
    display: none;
}
.cart-section .cart-table thead th:nth-last-child(-n+4) {
    display: none;
}
}
.td-color{    color: #31363a !important;}
tbody tr td:not(:first-of-type){    padding-top: 1.9rem;}
.delete-cart-item{    font-size: 19px;
    text-decoration: none;}
.qty-box-lg{
        width: 72px;margin: -7px auto;    margin: -5px auto;
    }
</style>
<template>
    <div class="container p-4 bg-white mt-3 mb-3 border">
       <!-- notice to the selected quantity whene adding to cart -->
        <div class="row alert bg-info text-white ">
            {{!lang ? 'The values of quantity is the values choosen' : 'قيم الكمية هي التي تم تحديدها' }} <span style="text-decoration: underline;margin-left:5px" :style="lang ? 'margin-right:5px;margin:left:0;' : ''"> {{!lang ? 'whene adding to cart' : ' عند إضافتها للسلة'}}</span>
             
        </div>
      
        <div class="row p-2 border">
            <div v-if="this.loading" class="col-sm-9 cart-product columns-container p-3 bg-white" style="box-shadow: 0px 0px 8px 0 #c1b3b3;">
             <img src="/img/loadingP.gif" alt="loading" style="margin: auto;display:list-item">
            </div>
            <div v-else class="col-sm-9 cart-product cart-section">
                <!-- <div class="media  w-100 p-1" v-for="(p,key) in products" :key="key">
                <img class="mr-3" :src="p.images[0]" alt="Generic placeholder image">
                <div class="media-body pt-2">
                    <a :href="'/products/'+p.sku" class="product-title">{{p.name.en}}</a>
                    <p class="text-muted"></p>
                    <h6 class="font-weight-normal" style="font-size: 1.4rem;">
                        Price : <span class="font-weight-bold"><sup>{{currencySign}}</sup>{{ (currencyRate * (p.variations[0].sale_price)).toFixed(2)}}</span>
                    </h6>
                    
                   
                </div>
                  <a class="delete-p-btn">X</a>
                </div> -->
                <table class="table cart-table table-responsive-xs striped-table">
                    <thead>
                    <tr class="table-head">
                        <th scope="col">{{!lang ? 'image' : 'الصورة'}} </th>
                        <th scope="col">{{!lang ? 'product name' : 'اسم المنتج'}} </th>
                        <th scope="col">{{!lang ? 'price' : 'السعر'}} </th>
                        <th scope="col">{{!lang ? 'quantity' : 'الكمية'}} </th>
                        <th scope="col">{{!lang ? 'action' : 'العملية'}} </th>
                        <th scope="col">{{!lang ? 'adjustment' : 'التوظيب'}} </th>
                        <th scope="col">{{!lang ? 'shipping' : 'الشحن'}} </th>
                        <th scope="col">{{!lang ? 'total' : 'المجموع'}} </th>
                        
                    </tr>
                    </thead>
                    <tbody v-for="(p,key) in products" :key="key">
                        <tr>
                            <td>
                                <a href="#"><img :src="p.images[0]" alt="product image"></a>
                            </td>
                            <td><a :href="'/products/'+p.sku" target="_blink">{{!lang ? p.name.en : p.name.ar}}</a>
                                <div class="mobile-cart-content row">
                                    <div class="col-xs-3">
                                        <div class="qty-box">
                                            <div class="input-group">
                                                <input type="number"  name="quantity" class="form-control input-number" 
                                                :max="getMaxQuantity(p)" min="0"
                                                :value="getCommandedQuantity(p.sku)"
                                                @change="getItemTotal(p,$event)">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xs-3">
                                        <h5 class="td-color singleitemtotal">
                                             {{currencySign}}{{ (((currencyRate * (p.variations[0].sale_price.toFixed(2))).toFixed(2)) * getCommandedQuantity(p.sku)).toFixed(2)  }}
                                        </h5></div>
                                    <div class="col-xs-3">
                                        <h5 class="td-color"><a href="#" @click="removecartItem(p.sku)" class="icon delete-cart-item">X</a></h5></div>
                                </div>
                            </td>
                            <td>
                                <h5 class="td-color">{{currencySign}}{{ (currencyRate * (p.variations[0].sale_price.toFixed(2))).toFixed(2)}}</h5></td>
                            <td>
                                <div class="qty-box qty-box-lg" >
                                    <div class="input-group" :id="'lg-quantity'+key">
                                        <input type="number"  name="quantity"
                                         class="form-control lg-quantity"
                                         :max="getMaxQuantity(p)" min="0"
                                         :value="getCommandedQuantity(p.sku)"
                                         @change="getItemTotal(p,$event)">
                                    </div>
                                </div>
                            </td>
                            <td><a @click="removecartItem(p.sku)" href="#" class="icon delte-cart-item">X</a></td>
                            <td>
                               {{adjustment_price_status ? '2$' : '0$'}}
                            </td>
                            <td class="shipping_price">
                               ---
                            </td>
                            
                            <td>
                                <h5 class="td-color singleitemtotal " :datasku="'t-'+p.sku">
                                    ---
                                <!--  {{currencySign}}{{ (((currencyRate * (p.variations[0].sale_price)).toFixed(2)) * getCommandedQuantity(p.sku)).toFixed(2) }} -->
                                </h5>
                            </td>
                        </tr>
                    </tbody>
                    
                </table>
            </div>
            <div class="col-sm-3 border cart-total-info mt-2 mt-sm-0" >
               <h5 class="mb-3 font-weight-normal">{{!lang ? 'Your Cart Total' : 'المبلغ الكلي' }}</h5>
               <h3>USD <sup>$</sup> {{totaltopay}}</h3>
               <button type="button" class="btn checkout-btn text-white"
               @click="checkout()"
               >{{!lang ? "Secure Checkout" : "دفع آمن" }}</button>
            </div>
        </div>
        <div id="paypal-button"></div>
    </div>
</template>
<script>
import headerMixins from '../../mixins/headerMixins.js'
import currencyMixins from '../../mixins/currencyMixins.js'
export default {
    data(){
        return {
            products:[],
            loading:false,
            totaltopay:0,
            realItemsToal:[],
            user:null,
            firstname:'',
            lastname:'',
            address:'',
            email : '',
            phone:'',
             /// the adjustment price status
             adjustment_price_status:false,
            ///// the billing informations ------
            address_line1:'',
            address_line2:'',
            city:'',country:'',state:'',company:'',postcode:'',
            shippingFees : null,
            countrycode:'',
            loaded_sku:[], //after loading from url we save sku
            calculated_loaded_sku:[] //after calculating total price of each sku
        
        }
    },
    mixins:[headerMixins,currencyMixins],
    watch: {
        cartItems: function () {
            this.setcartItems();
        },
        adjustment_price_status :function(){
            this.checkadjustmentstatus();
        },

    },
    created(){
        this.loading = true;
        this.checkadjustmentstatus();
        setTimeout(() => {
          this.setcartItems();   
        }, 3000);
        //this.paypalInit();
    },
    mounted(){
       this.setuser();
       this.setBillingInfo();
    },
    computed:{
      
        cartItems(){
            return this.$store.state.cartItems;
        },  checkallbilinginfo(){
              return (this.address_line1.length > 0) && (this.city.length > 0)
               && (this.country.length > 0) && (this.state.length > 0)
          },
        
    
    },
    methods:{
          checkadjustmentstatus(){
              axios.get('checkAdjustmentPriceStatus')
              .then(res => {
                  //console.log(res.data)
                  if(res.data.adjustment_price == 1){
                     this.adjustment_price_status = true 
                  }
                   

              })
          },
          getCurrentShipping(country){
            
           axios.get('currentShippingCompany/'+country)
              .then(res => {
                  let shipp =  res.data;
                  this.shippingFees = shipp;
                  document.querySelectorAll('.shipping_price').forEach(ele =>{
                      //console.log('price',this.shippingFees.price)
                      ele.textContent = this.shippingFees.price + '$';
                  })
                  //calculate total after getting the shipping price
                  this.realItemsToal.forEach((item,i) => {
                     item.total =parseFloat(item.total)  + parseFloat(this.shippingFees.price);
                     document.querySelectorAll(".singleitemtotal[datasku = 't-"+item.sku+"']").forEach(i =>{
                         i.textContent =  item.total + this.currencySign;
                     })
                   })
                   
                    
                  this.setTotalToPay();
                  
              })
          },
          setcartItems(){
                    
                    let url = '/getProductBySku/';
                    let promisedItems = [];

                    this.$store.state.cartItems.forEach(product => {
                        promisedItems.push(axios.get(url + product.sku))
                    });

                     Promise.all(promisedItems)
                     .then(res => {
                         
                        //console.log(res)
                        res.forEach(p =>{
                            //console.log(this.loaded_sku)
                            if(!(this.loaded_sku.includes(p.data.product.sku))){
                                this.products.push(p.data.product);
                                this.loaded_sku.push(p.data.product.sku);
                            }
                        })
                        this.initItemsTotal();
                     })
                    
                    
                    let requests =  [];
                    /* this.$store.state.cartItems.forEach((product)=>{
                       
                      requests.push(axios.get('/getProductBySku/'+product.sku));
                    });
                    
                    //send multiple requests
                    axios.all(requests).then(axios.spread((...responses) => {
                    
                    responses.forEach(res => {
                        //console.log(res.data)
                        this.products.push(res.data.product);
                    });

                  
                    this.loading = false
                    //calculate the initil commanded price when adding item to cart
                    this.initItemsTotal();
                    // get the current shipping company price
                    this.getCurrentShipping();
                    })).catch(errors => {
                    // react on errors.
                       console.log(errors)
                    
                    }) */
            
         
          },
          removecartItem($sku){
            Swal.fire({
            text: !this.lang ? 'Are you sure to remove this product from cart?':
                   'هل أنت متأكد من حدف المنتج من السلة',
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#E64545',
            confirmButtonText: !lang ? 'Yes !' :'نعم'
            }).then((result) => {
                
            if (result.value) {
                axios.get('/user/carItems/'+$sku+'/delete')
                .then(res => {
                   this.products = this.products.filter(item => item.sku != $sku)
                   this.$store.state.cartItems = this.cartItems.filter(item => item != $sku)
                   Swal.fire({
                     title:!lang ? 'Deleted!' : 'تم الحدف',
                     text:res.data.msg,
                     type:'success'
                   }) 
                })
                
            }
          })
          },
          //get a product quantity
          getMaxQuantity(product){
           let sum = 0;
           product.variations.forEach( variation =>{
               //we test if a quantity is > 0 so the size is available for this variation
               sum+= variation.quantity;
           })
           return sum;
          
          }, 
          getCommandedQuantity(sku){
              return this.cartItems.filter(item => item.sku == sku)[0].quantity
          },
          getItemTotal(p,event){
            
            let price = (this.currencyRate * (p.variations[0].sale_price.toFixed(2))).toFixed(2);
            let demandedQte = event.target.value;
            let adjustment_price = this.adjustment_price_status ? 2 : 0;
            console.log(this.adjustment_price_status)
            //change the commanded quantity in cartitem
            this.cartItems.filter(item => item.sku == p.sku)[0].quantity = demandedQte;

            let total = ((price * demandedQte) + adjustment_price + 
            this.shippingFees.price).toFixed(2);
           
            document.querySelectorAll(".singleitemtotal[datasku = 't-"+p.sku+"']").forEach(i=>{
                i.textContent = this.currencySign+""+total;
            })
            //here we set the real item total in real items total array
            let prod = this.realItemsToal.filter(item => item.sku == p.sku)[0];
          
            prod.total = total;
            
            //reset the total price to pay
            this.setTotalToPay();
            
          },
          //calculate the initil commanded price when adding item to cart
          initItemsTotal(){
              this.loading = false
              let itemtotal = 0;
              let adjustment_price = this.adjustment_price_status ? 2 : 0;
              this.products.forEach(p =>{
                  console.log(p)
                 if(!this.calculated_loaded_sku.includes(p.sku)){
                    this.calculated_loaded_sku.push(p.sku);
                    itemtotal = (((this.currencyRate * (p.variations[0].sale_price.toFixed(2))).toFixed(2)) * 
                    this.getCommandedQuantity(p.sku)  + adjustment_price  ).toFixed(2) ;
                    console.log('realitem',itemtotal )
                    this.realItemsToal.push({
                        sku:p.sku,
                        total:itemtotal, 
                    })
                 }
              })
              //set the total price to pay 
              this.setTotalToPay();
          },
          setTotalToPay(){
              this.totaltopay = this.realItemsToal
              .map(item => item.total)
              .reduce((sum,curr) => +sum + +curr ,0).toFixed(2);
          },
          paypalInit(){
              

          },
          setuser(){
           var user = null;
           axios.get('/userinfo')
           .then(res =>{
               
               user = res.data;
               this.firstname = user.firstname;
               this.lastname = user.lastname;
               this.phone = user.phone;
               this.address = user.address;
               this.country = user.country;
               this.email = user.email;
              
               //call the current shipping method to get the price of shippment
               setTimeout(() => {
               console.log('usercountry',this.country)
                  //get the current shipping price to the user country
                  this.getCurrentShipping(this.country);  
                  //then get the country code by name 
                  this.countryNameToCode();  
               }, 9000);
               
           })
           
          },
          setBillingInfo(){
                let userbillinginfo = null;
                axios.get('/userBillinginfo')
                .then(res =>{
                    
                    userbillinginfo = res.data;
                    
                    this.address_line1 = userbillinginfo.address_line1;
                    this.address_line2 = userbillinginfo.address_line2;
                    this.city = userbillinginfo.city;
                    this.country = userbillinginfo.country;
                    this.state = userbillinginfo.state;
                    this.company = userbillinginfo.company;
                    this.postcode = userbillinginfo.postcode;
                })
          },
          countryNameToCode(){
            
            fetch(`https://restcountries.eu/rest/v2/name/${this.country}`)
            .then(function(res){
                return res.json();
            })
            .then((data) => {
                
                //console.log('country code ',data[0].alpha2Code);
                this.countrycode = data[0].alpha2Code;
            })
     
          },
          checkout(){

              
                   if(this.checkallbilinginfo){
                      this.realItemsToal.forEach((p,i) =>{
                          console.log(i)
                          console.log(Object.assign(p,{quanity:this.cartItems(i)}))
                      })
                      var order = {
                            "status": "processing",
                           "items": [
                            {
                                "quantity": 1,
                                "sku": "BI11103820"
                            }
                            ],
                            //"items":this.realItemsToal,
                            "shipping": {
                            "first_name": this.firstname,
                            "last_name": this.lastname,
                            "address_1": this.address_line1,
                            "address_2": this.address_line2.length > 0 ? this.address_line2 : this.state,
                            "city": this.city,
                            "state": this.state,
                            "postcode": this.postcode,
                            "country": this.countrycode,
                            "email": this.email,
                            "phone": this.phone
                            },
                            "notes": "My Orders"
                        }
                      
                      //confirm the payment operation
                      const swalWithBootstrapButtons = Swal.mixin({
                        customClass: {
                            confirmButton: 'btn btn-success',
                            cancelButton: 'btn btn-danger'
                        },
                        buttonsStyling: false
                        })

                        swalWithBootstrapButtons.fire({
                        title: !this.lang ? 'The total price to pay is :' : 'المبلغ الكلي للدفع :',
                        text: this.totaltopay,
                        icon: 'info',
                        showCancelButton: true,
                        confirmButtonText: !this.lang ? 'Yes, Continue' : 'متابعة',
                        cancelButtonText: !this.lang ? 'No, cancel!' : 'إلغاء',
                        reverseButtons: true
                        }).then((result) => {
                        if (result.value) {
                            swalWithBootstrapButtons.fire(
                            !this.lang ? 'completed' : 'تم الالغاء',
                            !this.lang ? 'thanks for your payment' : 'شكرا لك سيتم معالجة طلبك',
                            'success'
                            )
                                   /*  axios.post('/process_payment',order)
                                    .then(res =>{
                                        console.log(res)
                                        if(res.data.code == '422' || res.data.code == '500'){
                                        let returnederror = "";
                                            res.data.data.forEach(item =>{
                                                returnederror = returnederror+' ' + item.message;
                                        } )
                                        !this.lang ?
                                                Swal.fire({
                                                    title:res.data.type,
                                                    type:'error',
                                                    html:`<h6 style="color:red" >${returnederror}</h6>`
                                                
                                                }) 
                                            :
                                            Swal.fire({
                                                    title:'خطأ',
                                                    type:'خطأ',
                                                    html:`<h6 style="color:red" >${returnederror}</h6>`
                                            })
                                        }else{
                                            let result = res.data;
                                            Swal.fire({
                                                    title:res.data.type,
                                                    type:res.data.status,
                                                    html:`<h6 >${returnedmessage}</h6>`
                                                
                                                })  
                                        }
                                    }) */
                        } else if (
                            /* Read more about handling dismissals below */
                            result.dismiss === Swal.DismissReason.cancel
                        ) {
                            swalWithBootstrapButtons.fire(
                            !this.lang ? 'Cancelled' : 'تم الالغاء',
                            !this.lang ? 'you can request any time you want' : 'بامكانك الكلب في اي وقت',
                            'error'
                            )
                        }
                        })
                    
                      axios.post('/cancel_order',{
                          "id":"SO-06328"
                      })
                      .then(res =>{
                          console.log(res.data)
                      })

                      /*  Swal.fire({
                        title:'confirmed',
                        text:'yes',
                        type:'success'
                    })  */
                   }else{
                    !this.lang ?
                        Swal.fire({
                            title:'info',
                            type:'info',
                            html: 'please complete the billing information to continue <br>\
                            <a href="/settings"  >continue</a>'
                        }) 
                    :
                      Swal.fire({
                        title:'نتبيه',
                        type:'info',
                        html: 'يرجى إكمال بيانات الدفع للقيام بهاته العملية <br>\
                            <a href="/settings"  >مواصلة</a>'
                    }) 
                   }
                
          },
    }
}
/* Vue.loadScript('https://www.paypalobjects.com/api/checkout.js').then(()=>{
    
       paypal.Button.render({
    env: 'sandbox', // Or 'production'
    // Set up the payment:
    // 1. Add a payment callback
    payment: function(data, actions) {
      // 2. Make a request to your server
      return actions.request.post('/api/create-payment/')
        .then(function(res) {
          // 3. Return res.id from the response
          console.log(res)
          return res.id;
        });
    },
    // Execute the payment:
    // 1. Add an onAuthorize callback
    onAuthorize: function(data, actions) {
      // 2. Make a request to your server
      return actions.request.post('/api/execute-payment/', {
        paymentID: data.paymentID,
        payerID:   data.payerID
      })
        .then(function(res) {
          // 3. Show the buyer a confirmation message.
        });
    }
  }, '#paypal-button');
}) */

</script>