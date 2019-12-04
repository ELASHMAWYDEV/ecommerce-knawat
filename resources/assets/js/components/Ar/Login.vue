<template>
    <div class="modal fade" id="login-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
          <div class="modal-content">
          <div class="modal-header ">
              <h5 class="modal-title" id="exampleModalLabel">تسجيل الدخول</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
              </button>
          </div>
          <div class="modal-body">
            <div class="border p-3">
                <ul class="list-group " v-if="this.errors.length > 0">
                    <li class="list-group-item  text-danger" v-for="error in errors"
                    :key="error.indexOf(error)"
                    >
                     {{error}}    
                    </li>  
                     <a  v-show="!this.emailverified" href="/verifyEmailpage" class="btn btn-primary  btn-sm ml-auto  mr-auto mt-2">التحقق من البريد</a>
                </ul>
                <div class="box-authentication">
                    <form class="form-horizontal" method="POST" >
                        

                        <div class="form-group">
                            <label for="email" class=" control-label">البريد الالكتروني</label>

                            <input id="email" type="email" v-model="email" class="form-control" name="email" autofocus>
                        </div>

                        <div class="form-group">
                            <label for="password" class=" control-label">كلمة السر</label>

                            <input id="password" type="password" v-model="password" class="form-control" name="password" >
                        </div>

                        <div class="form-group">
                                <div class="checkbox">
                                    <label class="d-inline-flex" style="width:155px">
                                        <input type="checkbox" v-model="remember" name="remember" style="    width: 21px; margin-top: 4px;"> تذكرني 
                                    </label>
                                </div>
                        </div>

                        <div class="form-group">
                            
                                <button class="btn main-b-bg text-light" :disabled="!isVadlidLoginForm"
                                @click.prevent="validateForm()"
                                ><i class="fa fa-lock"></i> تسجيل الدخول</button>
                            
                        </div>
                    </form>
                    
                </div>
            </div>
          </div>
          </div>
      </div>
    </div>
</template>
<script>
export default{
    data(){
        return{
            email:'',
            password :'',
            remember:true,emailverified:true,
            errors : []
        }
        
    },
    computed : {
       isVadlidLoginForm(){
         return this.isEmailValide() && this.isPasswordValide
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
        isPasswordValide(){
            return this.password.length > 5
        },
        validateForm(){

            this.errors = [];

            axios.get('/checkIfUserBlocked/'+this.email)
            .then(res =>{
                if(res.data.type == '0'){
                    this.errors.push(res.data.msg);
                    this.emailverified = false;
                }else{
                if(res.data.type == '3'){
                    this.errors.push('لم يتم العثور على مستخدم بهدا البريد');
                }else{
                 if(res.data.type == '1'){
                    this.errors.push(res.data.msg);
                 }else{
                    axios.post('/login',{
                        email : this.email, password : this.password,remember : this.remember
                    })
                    .then(res =>{
                        if((window.location.pathname == "/verifyEmailpage") || (window.location.pathname == "/verifyEmail")){
                        window.location.href = "/home";  
                        }else{
                            window.location.reload();
                        }
                        
                    })
                    .catch(errors => {
                        //console.log(errors)
                        if(errors.response.status ==  '422'){
                        
                        this.errors.push('البريد الالكتروني أو كلمة السر خاطئة')
                        }else{
                            this.errors.push('هناك خطأ داخلي أعد تحميل الصفحة  وحاول مجددا ')
                        }
                    }) 
                 }
                }
                }
            })
            
        }
    }
}
</script>
