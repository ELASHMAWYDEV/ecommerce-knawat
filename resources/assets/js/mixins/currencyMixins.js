export default {
    methods: {
       
      
    },
    computed:{
        authId(){
            return this.$store.state.authId;
        },
       currencyRate(){
            return this.$store.state.currencyRate;
        },
        currentCurrency(){
            return this.$store.state.currentCurrency;
            console.log("curcurcur"+this.$store.state.currentCurrency)
          },
          curencies(){
            return this.$store.state.currencies
          },
          currencySign(){
        
            return this.$store.state.currencySign
          },
    },
    }