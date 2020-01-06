<template>
            <li class="navbar-nav nav-item dropdown  d-sm-none ">
              <a class="nav-link " style="color:rgb(13, 32, 52);cursor:pointer;
                font-weight: bolder !important;font-size: 1.4rem;margin-top: -5px;" href="#" id="currency-xs" role="button" >
                {{currencySign}}
              </a>
              <div class="currency-dropdownmenu" :style="!lang ? 'left:-51px' : 'right:-51px'" >
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
          //console.log("curcurcur"+this.$store.state.currentCurrency)
        },
        curencies(){
          return this.$store.state.currencies
        },
        currencySign(){
          return this.$store.state.currencySign
        },
        lang(){
          return this.$store.state.lang
        }
    },
     methods:{
        changeCurrency(currency){
            
            this.$store.state.currentCurrency = currency;
            this.$store.state.currencyRate = this.$store.state.currencies[''+currency+''];
            this.$store.state.currencySign = this.$store.state.currenciesSigns[''+currency+'']
        }
       
    },

    
}
$(document).ready(function(){
  $('#currency-xs').on('click',function(){
    $('.currency-dropdownmenu').toggleClass('show');
    if($('.currency-dropdownmenu').hasClass('show'))
     setTimeout(() => {
    $('.currency-dropdownmenu').removeClass('show');
    }, 5000);
  })
  
})

</script>