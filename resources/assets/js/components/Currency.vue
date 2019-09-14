<template>
            <li class="navbar-nav nav-item dropdown  d-sm-none ">
              <a class="nav-link " href="#" id="currency-xs" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                {{this.currentCurrency}}
              </a>
              <div class="dropdown-menu" aria-labelledby="currency-xs" style="right: 0;    left: auto; max-width: 7rem;">
                <a class="dropdown-item" @click="changeCurrency('EUR')">EUR</a>
                <a class="dropdown-item" @click="changeCurrency('GBP')">GBP</a>
              </div>
            </li>
</template>
<script>

export default{
    data(){
        return{
            currentCurrency:'USD'
           
        }
    },
    computed:{
       getCurrency(){
        /* fetch('https://api.exchangeratesapi.io/latest?base=USD')
        .then(res =>res.json())
        .then(res =>{
         // console.log(res.rates)
        })
        .catch(err=>alert('error in loading currencies')) */
      },
      changeCurrency(currency){
          this.currentCurrency = currency;

      }
    },
    mounted(){
        this.getCurrency
    }
    
}
</script>