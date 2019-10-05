
        <!-- ./page wapper-->
        <template>
    <div class="modal fade" id="register-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
          <div class="modal-content">
          <div class="modal-header p-2 pl-5">
              <h5 class="modal-title" id="exampleModalLabel">Register</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
              </button>
          </div>
          <div class="modal-body p-3">
            
                
                   <!-- page wapper-->
    <div class="columns-container p-3 bg-white">
            <div class="container" id="columns">
               
                <div class="page-content">
                    <ul class="list-group " v-if="this.errors.length > 0">
                    <li class="list-group-item  text-danger" v-for="error in errors"
                    :key="error.indexOf(error)"
                    >
                     {{error}}    
                    </li>  
                    </ul>
                    <div class="row m-0">
                        
                        <div v-if="registred" class="border w-100 p-3 text-center" style="box-shadow: rgb(193, 179, 179) 0px 0px 8px 0px;">
                           <div class="alert alert-success">success,we sent you a verification code, please check your email</div>
                           <a  href="/verifyEmailpage" class="btn btn-primary m-auto">verify my email</a>
                        </div>
                        <div v-else class=" border w-100 p-3" style="box-shadow: rgb(193, 179, 179) 0px 0px 8px 0px;">
                            <div class="box-authentication">
                                <h5>Create an account</h5>

                                <form class="form-horizontal" method="POST" 
                                id="regform" novalidate>
                                      
                
                                        <div class="form-group">
                                            <label for="firstname" class="  control-label" >firstname</label>
                
                                            <div class=""> 
                                                <input id="firstname" type="text" class="form-control w-100" name="firstname" v-model="firstname" autofocus >
                                            </div>
                                        </div>
                                        <div class="form-group">
                                                <label for="lastname" class=" control-label">lastname</label>
                    
                                                <div class=""> 
                                                    <input id="lastname" type="text" class="form-control w-100" name="lastname" v-model="lastname"  > 
                                                </div>
                                        </div>
                                        <div class="form-group">
                                                <label for="address" class=" control-label">address</label>
                    
                                                <div class=""> 
                                                    <input id="address" type="text" class="form-control w-100" name="address" v-model="address" >
                                                </div>
                                        </div>
                                        <div class="form-group">
                                                <label for="phone" class=" control-label" minlength="10" maxlength="13" v-model="phone">phone</label>
                    
                                                <div class=""> 
                                                    <input id="phone" type="number" class="form-control w-100" name="phone" v-model="phone" >
                                                </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="email" class=" control-label">E-Mail Address</label>
                
                                            <div class="">
                                                <input id="email" type="email" class="form-control w-100" name="email" v-model="email"  >
                                            </div>
                                            <div v-if="emailError.length > 0" class="text-danger font-weight-bold mt-1">
                                                {{emailError}}  
                                            </div>
                                        </div>
                
                                        <div class="form-group">
                                            <label for="password" class=" control-label">password</label>
                
                                            <div class="">
                                                <input id="password" type="password" class="form-control w-100" name="password" v-model="password" >
                                            </div>
                                        </div>
                
                                        <div class="form-group">
                                            <label for="password-confirm" class=" control-label ">Confirm Password</label>
                
                                            <div class="">
                                                <input id="password-confirm" type="password" class="form-control w-100" name="password_confirmation" v-model="passwordconfirm">
                                            </div>
                                            <div v-if="passwordError.length > 0" class="text-danger font-weight-bold mt-1">
                                                {{emailError}}  
                                            </div>
                                        </div>
                
                                        <div class="form-group">
                                            <div class=" col-md-offset-4">
                                                <button type="submit" class="btn main-b-bg text-light"
                                                 :disabled="!isVadlidLoginForm" @click.prevent="validateForm()">
                                                    Register
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
    </div>
            
          </div>
          </div>
      </div>
    </div>
</template>
<script>
export default {
    data(){
        return{
            firstname:'',
            lastname:'',
            address:'',
            phone:'',
            email:'',
            password :'',
            passwordconfirm:'',
            errors : [],
            registred:false,
            //password and email errors
            emailError:'',
            passwordError:'',
        }
    },
    computed:{
       isVadlidLoginForm(){
         return (this.firstname.length > 2) && (this.firstname.length > 2) &&
                (this.address.length > 2) && (this.isPhoneValide()) &&
                this.isEmailValide() && this.isPasswordValide()
       }
    },
    methods:{
        isPhoneValide(){
            return (this.phone.length < 14) && (this.phone.length >= 10);
        },
        isEmailValide() 
        {
            if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(this.email))
            {
                return (true)
            }
                return (false)
        },
        isPasswordValide(){
            return (this.password.length > 5) && (this.passwordconfirm == this.password)
        },
         validateForm(){
            this.errors = [];this.emailError='';this.passwordError='';
            axios.post('/users/store',{
                firstname:this.firstname,lastname:this.lastname,address:this.address,phone:this.phone,
                 email : this.email, password : this.password,password_confirmation : this.passwordconfirm
            })
            .then(res =>{
                //console.log(res.data.errors)
                if(res.data.errors){
                    //this.errors = res.data.errors;
                    res.data.errors.forEach(error =>{
                        if(error.includes('email')){ this.emailError = error}
                        else{
                            if(error.includes('password'))
                            { this.passwordError = error}
                            else
                            {this.errors.push(error) }
                        }
                        
                    })
                }else{
                  
                  this.registred = true;  
                }
               
                //window.location.reload();
            })
            .catch(errors => {
                console.log(errors)
                if(errors.response.status ==  '422'){
                  console.log('err',errors)
                }else{
                    this.errors.push('Something went wrong please refresh \
                    the page and try again')
                }
            })
        }
    
    }
}
</script>