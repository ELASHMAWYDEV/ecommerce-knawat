<template>
    <div class="col-xs-12 col-sm-6 col-md-3">
                    <h5>{{!lang ? 'Newsletter' : 'النشرة البريدية'}}</h5>
                    <ul class="list-unstyled quick-links mailing-list">
                        <li style="    margin-top: 1rem;"><a href="javascript:void()">{{!lang ? 'Subscribe to our Newsletter' : 'اشترك في اخر الأخبار'}}</a></li>
                        <form action="" method="post" >
                            <input type="email" v-model="email" class="form-control" :placeholder="!lang ? 'Email' : 'البريد الإلكتروني'">
                            <button type="submit" 
                            :disabled="!isVadlidForm" @click.prevent="validateForm()"
                            class="btn btn-block  main-b-bg" >{{!lang ? 'Subscribe' : 'اشتراك'}}</button>
                        </form>
                    </ul>
    </div>
</template>
<script>
export default {
    data(){
        return {
            email : ''
        }
    },
    computed:{
        lang(){
            return this.$store.state.lang;
        },
         isVadlidForm(){
         return  this.isEmailValide() ;
       }
    },
    methods:{
        isEmailValide() 
        {
            if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(this.email))
            {
                return (true)
            }
                return (false)
        },
        validateForm(){
        axios.post('/mailingList',{email:this.email})
        .then(res => {
            Swal.fire({
              type: res.data.type,
              html: res.data.data,
            }) 
        })
        }
    }

}
</script>