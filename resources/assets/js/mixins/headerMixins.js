export default {
    methods: {
       
      
    },
    computed:{
        authId(){
            return this.$store.state.authId;
        },
        lang(){
            return this.$store.state.lang;
          }
    },
    }