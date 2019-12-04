<template>
 <form action="" method="post" novalidate id="contactform">
                    <div v-if="this.messagesent" class="alert alert-success">
                      {{this.msgContent}}
                    </div>
                    <div class="row form-group">
                       <label class="col-sm-3 pt-2">{{!lang ? 'Your Name :' : 'الإسم :'}} </label>
                       <input type="text" v-model="name" name="name" class="form-control col-sm-8" >
                        
                    </div>
                    <div class="row" v-show="name.length < 4 && name.length > 0">
                        <div class="col-sm-3"></div>
                        <div   class="text-danger font-weight-bold  mb-2 col-sm-8 text-left pl-0" style="margin-top:-6px">
                            {{!lang ? 'Your name is too short ...' : 'طول الاسم قصير جدا'}}
                        </div>
                    </div>
                    <div class="row form-group">
                        <label class="col-sm-3 pt-2">{{!lang ? 'Email :' : 'البريد الالكتروني :'}} </label>
                        <input type="email" v-model="email" name="email" class="form-control col-sm-8"  >
                    </div>
                    <div class="row form-group">
                        <label class="col-sm-3 pt-2">{{!lang ? 'Subject :' : 'الموضوع'}}</label>
                        <input type="text" v-model="subject" name="subject" class="form-control col-sm-8" >
                    </div>
                    <div class="row" v-show="subject.length < 8 && subject.length > 0">
                        <div class="col-sm-3"></div>
                        <div   class="text-danger font-weight-bold  mb-2 col-sm-8 text-left pl-0" style="margin-top:-6px">
                               {{!lang ? 'The subject length is too short ... ' : ' طول الموضوع قصير جدا '}}
                        </div>
                    </div>
                    <div class="row form-group">
                        <label class="col-sm-3 pt-2">{{!lang ? 'Message :' : 'الرسالة' }}</label>
                        <textarea v-model="message" maxlength="300" class="form-control col-sm-8" name="message" id="" cols="30" rows="10">
                            
                        </textarea>
                    </div>
                    <div class="row" v-show="message.length < 20 && message.length > 0" >
                        <div class="col-sm-3"></div>
                        <div   class="text-danger font-weight-bold  mb-2 col-sm-8 text-left pl-0" style="margin-top:-6px">
                               {{!lang ? 'The  message length is too short ...' : 'الرسالة قصيرة جدا ...' }} 
                        </div>
                    </div>
                    <div class="row form-group">
                        <label class="col-sm-3 pt-2"></label>
                        <input type="submit" :value="!lang ? 'Send' : 'إرسال'" 
                        class="form-control btn btn-primary col-sm-8"
                        :disabled="!isValid"
                        @click.prevent="validateForm()"
                        >
                    </div>
                    
</form>
</template>
<script>
export default {
    data(){
        return{
            name:'',
            email:'',
            subject:'',
            message:'',
            messagesent : false,
            msgContent :''

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
            axios.post('/contact_us',{name:this.name,email:this.email,
            subject : this.subject,message:this.message,lang:this.lang })
            .then(res =>{
                this.messagesent = true;
                this.msgContent = res.data.success;
                $('#contactform').reset();
            })
        }
    },
    computed:{
        isValid(){
           return this.isEmailValide() && (this.name.length >= 3 ) &&
            (this.subject.length >= 8) && (this.message.length >= 20) 
        },
        lang(){
            return this.$store.state.lang;
        }
       
    }
}
</script>