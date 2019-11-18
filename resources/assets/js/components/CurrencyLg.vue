<template>
           <li class="navbar-nav nav-item dropdown ml-auto d-none d-sm-block">
             
              <a class="nav-link " href="#" id="currency-d" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                {{currentCurrency}}
              </a>
              <div class="dropdown-menu" aria-labelledby="currency-d" style="right: 0;    left: auto;    max-width: 7rem;" :style="this.lang  ? 'min-width: 6rem;' : ''">
                <a class="dropdown-item" @click="changeCurrency('USD')">USD</a>
                <a class="dropdown-item" @click="changeCurrency('TRY')">TRY</a>
                <a class="dropdown-item" @click="changeCurrency('EUR')">EUR</a>
                <a class="dropdown-item" @click="changeCurrency('GBP')">GBP</a>
              </div>
            </li>
</template>
<script>

export default{
  
    computed:{
        currentCurrency(){
          return this.$store.state.currentCurrency;
          console.log("curcurcur"+this.$store.state.currentCurrency)
        },
        curencies(){
          return this.$store.state.currencies
        },
        getCurrency(){
          let currencies = sessionStorage.getItem('currencies');
        if(currencies !=null){
           this.$store.state.currencies = JSON.parse(currencies);
           return true;
        }
        fetch('https://api.exchangeratesapi.io/latest?base=USD')
        .then(res =>res.json())
        .then(res =>{
          //console.log(res.rates)
          this.$store.state.currencies = res.rates;
          sessionStorage.setItem('currencies',JSON.stringify(res.rates));
        })
        .catch(err=>console.log('error in loading currencies'))
       }
        
    },
    methods:{
        changeCurrency(currency){
            
            this.$store.state.currentCurrency = currency;
            this.$store.state.currencyRate = this.$store.state.currencies[''+currency+''];
            this.$store.state.currencySign = this.$store.state.currenciesSigns[''+currency+'']
        }
       
    },
    props:['lang'],
    mounted(){
       
        this.getCurrency
    }
    
}
</script>