
        <!-- ./page wapper-->
<template>
    <div class="modal fade" id="register-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
          <div class="modal-content">
          <div class="modal-header p-2 pl-5">
              <h5 class="modal-title" id="exampleModalLabel">تسجيل</h5>
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
                           <div class="alert alert-success">تم بنجاح , لقد أرسلنا لك رسالة التفعيل الى ايميلك قم بتفقد البريد الوارد</div>
                           <a  href="/verifyEmailpage" class="btn btn-primary m-auto">التحقق من الايمايل</a>
                        </div>
                        <div v-else class=" border w-100 p-3" style="box-shadow: rgb(193, 179, 179) 0px 0px 8px 0px;">
                            <div class="box-authentication">
                                <h5>انشاء حساب</h5>

                                <form class="form-horizontal" method="POST" 
                                id="regform" novalidate>
                                      
                
                                        <div class="form-group">
                                            <label for="firstname" class="  control-label" >الاسم الاول</label>
                
                                            <div class=""> 
                                                <input id="firstname" type="text" class="form-control w-100" name="firstname" v-model="firstname" autofocus >
                                            </div>
                                            <div v-show="firstname.length < 3 && firstname.length > 0" class="text-danger font-weight-bold mt-1">
                                                  الاسم الاول قصير جدا ...
                                            </div>
                                        </div>
                                        <div class="form-group">
                                                <label for="lastname" class=" control-label">الاسم العائلي</label>
                    
                                                <div class=""> 
                                                    <input id="lastname" type="text" class="form-control w-100" name="lastname" v-model="lastname"  > 
                                                </div>
                                                <div v-show="lastname.length < 3 && lastname.length > 0" class="text-danger font-weight-bold mt-1">
                                                     الاسم العائلي قصير جدا ...
                                                 </div>
                                        </div>
                                        <div class="form-group">
                                                <label for="address" class=" control-label">العنوان</label>
                    
                                                <div class=""> 
                                                    <input id="address" type="text" class="form-control w-100" name="address" v-model="address" >
                                                </div>
                                                 <div v-show="address.length < 3 && address.length > 0" class="text-danger font-weight-bold mt-1">
                                                   العنوان قصير جدا ...
                                                 </div>
                                        </div>
                                        <div class="form-group">
                                                <label for="phone" class=" control-label">رقم الهاتف</label>
                    
                                                <div class=""> 
                                                    <input id="phone" type="number" class="form-control w-100" name="phone" v-model="phone" >
                                                </div>
                                                <div v-show="phone.length < 9 && phone.length > 0" class="text-danger font-weight-bold mt-1">
                                                   رقم الهاتف قصير ...
                                                </div>
                                                <div v-show="phone.length > 13" class="text-danger font-weight-bold mt-1">
                                                  رقم الهاتف طويل ...
                                                </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="email" class=" control-label">البريد الإلكتروني</label>
                
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
                                            <div v-show="password.length < 6 && password.length > 0" class="text-danger font-weight-bold mt-1">
                                                    كلمة السر يجب أن تكون أكبر من 5 أحرف
                                            </div>
                                        </div>
                
                                        <div class="form-group">
                                            <label for="password-confirm" class=" control-label ">تأكيد كلمة السر</label>
                
                                            <div class="">
                                                <input id="password-confirm" type="password" class="form-control w-100" name="password_confirmation" v-model="passwordconfirm">
                                            </div>
                                            <div v-if="password.length > 5 && passwordconfirm.length> 5 && passwordconfirm != password" class="text-danger font-weight-bold mt-1">
                                                   تأكيد كلمة السر غير متطابقة ...
                                            </div>
                                            <div v-if="passwordError.length > 0" class="text-danger font-weight-bold mt-1">
                                                {{emailError}}  
                                            </div>
                                        </div>
                
                                        <div class="form-group">
                                            <div class=" col-md-offset-4">
                                                <button type="submit" class="btn main-b-bg text-light"
                                                 :disabled="!isVadlidLoginForm" @click.prevent="validateForm()">
                                                    تسجيل
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
            return (this.phone.length < 14) && (this.phone.length >= 9);
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
                    this.errors.push('خطأ داخلي قم بعمل تحديث للصفحة ثم أعد المحاولة')
                }
            })
        }
    
    }
}
</script>