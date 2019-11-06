<style scoped>
.picture-label{    border: 2px solid rgba(216, 216, 216, 0.99);
    padding: 0.2rem 1rem;
    background: #f9f9f9;}
 .picture-i{height: 50px;width: 50px}
 .picture-icon{    position: relative;
    bottom: -1rem;
    right: -0.5rem;}
</style>
<template>
    <div class="page-content">
                        <ul class="list-group " v-if="this.errors.length > 0">
                        <li class="list-group-item  text-danger" v-for="error in errors"
                        :key="error.indexOf(error)">
                        {{error}}    
                        </li>  
                        </ul>
                        <div class="row m-0">
                          <div class="col-sm-6  p-2">
                            <div v-if="infoupdated" class="border w-100 p-3 text-center" style="box-shadow: rgb(193, 179, 179) 0px 0px 8px 0px;">
                            <div class="alert alert-success">success,The informations updated successfuly</div>
                            
                            </div>
                            <div v-else class=" border w-100 p-3" style="box-shadow: rgb(193, 179, 179) 0px 0px 8px 0px;">
                                <div class="box-authentication">
                                    <h6 class="alert text-white bg-success text-center">Update account informations</h6>

                                    <form class="form-horizontal" method="POST" 
                                    id="regform" novalidate>
                                        
                    
                                            <div class="form-group">
                                                <label for="firstname" class="  control-label" >firstname</label>
                    
                                                <div class=""> 
                                                    <input id="firstname" type="text" class="form-control w-100" name="firstname" v-model="firstname" autofocus >
                                                </div>
                                                <div v-show="firstname.length < 3 && firstname.length > 0" class="text-danger font-weight-bold mt-1">
                                                    The firstname is too short ... 
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                    <label for="lastname" class=" control-label">lastname</label>
                        
                                                    <div class=""> 
                                                        <input id="lastname" type="text" class="form-control w-100" name="lastname" v-model="lastname"  > 
                                                    </div>
                                                    <div v-show="lastname.length < 3 && lastname.length > 0" class="text-danger font-weight-bold mt-1">
                                                    The lastname is too short ... 
                                                    </div>
                                            </div>
                                            <div class="form-group">
                                                    <label for="address" class=" control-label">address</label>
                        
                                                    <div class=""> 
                                                        <input id="address" type="text" class="form-control w-100" name="address" v-model="address" >
                                                    </div>
                                                    <div v-show="address.length < 3 && address.length > 0" class="text-danger font-weight-bold mt-1">
                                                    The address is too short ... 
                                                    </div>
                                            </div>
                                            <div class="form-group">
                                                    <label for="phone" class=" control-label">phone</label>
                        
                                                    <div class=""> 
                                                        <input id="phone" type="number" class="form-control w-100" name="phone" v-model="phone" >
                                                    </div>
                                                    <div v-show="phone.length < 9 && phone.length > 0" class="text-danger font-weight-bold mt-1">
                                                    The phone is too short ... 
                                                    </div>
                                                    <div v-show="phone.length > 13" class="text-danger font-weight-bold mt-1">
                                                    The phone is too long ... 
                                                    </div>
                                            </div>
                    
                                            <div class="form-group">
                                                <label for="password" class=" control-label">password</label>
                    
                                                <div class="">
                                                    <input id="password" type="password" class="form-control w-100" name="password" v-model="password" >
                                                </div>
                                                <div v-show="password.length < 6 && password.length > 0" class="text-danger font-weight-bold mt-1">
                                                    The pssword length must be more than 6... 
                                                </div>
                                            </div>
                    
                                            <div class="form-group">
                                                <label for="password-confirm" class=" control-label ">Confirm Password</label>
                    
                                                <div class="">
                                                    <input id="password-confirm" type="password" class="form-control w-100" name="password_confirmation" v-model="passwordconfirm">
                                                </div>
                                                <div v-if="password.length > 5 && passwordconfirm.length> 5 && passwordconfirm != password" class="text-danger font-weight-bold mt-1">
                                                    The password confirm doesn't match ...
                                                </div>
                                                <div v-if="passwordError.length > 0" class="text-danger font-weight-bold mt-1">
                                                    {{emailError}}  
                                                </div>
                                            </div>
                    
                                            <div class="form-group">
                                                <div class=" col-md-offset-4">
                                                    <button type="submit" class="btn main-b-bg text-light"
                                                    :disabled="!isVadlidLoginForm" @click.prevent="validateForm()">
                                                        Update
                                                    </button>
                                                </div>
                                            </div>
                                        </form>
                                </div>
                            </div>
                            
                          </div>
                          <div class="col-sm-6  p-2">
                            <div v-if="billinginfoupdated" class="border w-100 p-3 text-center" style="box-shadow: rgb(193, 179, 179) 0px 0px 8px 0px;">
                            <div class="alert alert-success">success,The informations updated successfuly</div>
                            
                            </div>
                            <div v-else class=" border w-100 p-3" style="box-shadow: rgb(193, 179, 179) 0px 0px 8px 0px;">
                                <div class="box-authentication">
                                    <h6 class="alert text-white bg-success text-center">Update Billing informations</h6>

                                    <form class="form-horizontal" method="POST" 
                                    id="billingform" novalidate enctype="multipart/form-data">
                                        
                    
                                            <div class="form-group">
                                                <label for="addressline1" class="  control-label" >Avatar</label>
                    
                                                <div class=""> 
                                                    <label v-if="picture.length > 0" for="picture" class="picture-label"> 
                                                        <img  :src="'/profile_img/'+picture" class="picture-i" alt="">
                                                        <i class="fa fa-camera ml-2 picture-icon"></i>
                                                    </label>
                                                    <label v-else for="picture" class="picture-label">
                                                         <img  src="/profile_img/avatar.png" class="picture-i" alt="">
                                                         <i class="fa fa-camera ml-2 picture-icon"></i>
                                                    </label>
                                                    <input id="picture" v-on:change="onImageChange" type="file" class="d-none form-control w-100" name="picture"   >
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="addressline1" class="  control-label" >Address Line 1</label>
                    
                                                <div class=""> 
                                                    <input id="addressline1" type="text" class="form-control w-100" name="addressline1" v-model="address_line1" autofocus >
                                                </div>
                                                <div v-show="address_line1.length < 3 && address_line1.length > 0" class="text-danger font-weight-bold mt-1">
                                                    The address line 1 is too short ... 
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="addressline2" class="  control-label" >Address Line 2</label>
                    
                                                <div class=""> 
                                                    <input id="addressline2" type="text" class="form-control w-100" name="addressline2" v-model="address_line2"  >
                                                </div>
                                                <div v-show="address_line2.length < 3 && address_line2.length > 0" class="text-danger font-weight-bold mt-1">
                                                    The address line 2 is too short ... 
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="city" class="  control-label" >City</label>
                    
                                                <div class=""> 
                                                    <input id="city" type="text" class="form-control w-100" name="city" v-model="city"  >
                                                </div>
                                                <div v-show="address_line2.length < 3 && address_line2.length > 0" class="text-danger font-weight-bold mt-1">
                                                    The city  2 is too short ... 
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                    <label for="country" class=" control-label">Country</label>
                        
                                                    <div class=""> 
                                                        <select name="country" id="country" v-model="country" class="form-control">
                                                            <option v-for="(opt,key) in countries" :key="key" :value="opt.name"
                                                            :selected="countries.indexOf(this.country) > -1"
                                                            >{{opt.name}}</option>
                                                        </select>
                                                    </div>
                                            </div>
                    
                    
                                            <div class="form-group">
                                                <div class=" col-md-offset-4">
                                                    <button type="submit" class="btn main-b-bg text-light"
                                                    :disabled="!isVadlidBillingForm" @click.prevent="validateBillingForm()">
                                                        Update
                                                    </button>
                                                </div>
                                            </div>
                                        </form>
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
            user:null,
            firstname:'',
            lastname:'',
            address:'',
            phone:'',
            password :'',
            passwordconfirm:'',
            errors : [],
            infoupdated:false,
            //password and email errors
            passwordError:'',

            ///// the billing informations ------
            picture:'',
            address_line1:'',
            address_line2:'',
            city:'',country:'',
            billinginfoupdated:false,
            countries:[],
            //image to upload
            image:''
        }
    },
    computed:{
       isVadlidLoginForm(){
         return (this.firstname.length > 2) && (this.firstname.length > 2) &&
                (this.address.length > 2) && (this.isPhoneValide()) && this.isPasswordValide()
       },
       authId(){
           return this.$store.state.authId;
       },
      isVadlidBillingForm(){
          return (this.address_line1.length > 2 && this.address_line2.length > 2 
          && this.city.length > 2 )
      },
       
    },
    mounted(){
      this.setuser();
      this.setBillingInfo();
    },
    methods:{
        isPhoneValide(){
            return (this.phone.length < 14) && (this.phone.length >= 9);
        },
        isPasswordValide(){
            return (this.password.length > 5) && (this.passwordconfirm == this.password)
        },
        validateForm(){
            this.errors = [];this.passwordError='';
            axios.post('/user/update',{userid:this.authId,
                firstname:this.firstname,lastname:this.lastname,address:this.address,phone:this.phone,
                 password : this.password,password_confirmation : this.passwordconfirm
            })
            .then(res =>{
                //console.log(res.data.errors)
                if(res.data.errors){
                    //this.errors = res.data.errors;
                    res.data.errors.forEach(error =>{
                        
                            if(error.includes('password'))
                            { this.passwordError = error}
                            else
                            {this.errors.push(error) }
                        
                        
                    })
                }else{
                  
                  this.infoupdated = true;  
                  setTimeout(function(){
                      this.infoupdated = false;
                  }.bind(this), 6000);
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
        },
       setuser(){
           let user = null;
           axios.get('/userinfo')
           .then(res =>{
               
              user = res.data;
               this.firstname = user.firstname;
               this.lastname = user.lastname;
               this.phone = user.phone;
               this.address = user.address;
               //this.password = user.password;
               this.passwordconfirm = user.password;
           })
          
       },
       setBillingInfo(){
          let userbillinginfo = null;
           axios.get('/userBillinginfo')
           .then(res =>{
               
               userbillinginfo = res.data;
              
               this.picture = userbillinginfo.img;
               this.address_line1 = userbillinginfo.address_line1;
               this.address_line2 = userbillinginfo.address_line2;
               this.city = userbillinginfo.city;
               this.country = userbillinginfo.country;
               this.getCountries();
           })
       },
       getCountries(){
           fetch('https://restcountries.eu/rest/v2/all')
            .then(function(res){
                return res.json();
            })
            .then((data) => {
                
                this.countries  = data;
            })
      },
      onImageChange(e){
                //console.log(e.target.files[0]);
                this.image = e.target.files[0];
      },
      validateBillingForm(){
            const config = {
                    headers: { 'content-type': 'multipart/form-data' }
                }
 
            let formData = new FormData();
            formData.append('image', this.image);
            formData.append('address_line1', this.address_line1);
            formData.append('address_line2', this.address_line2);
            formData.append('city', this.city);
            formData.append('country', this.country);

            axios.post('/billinginfo/update',formData, config)
            .then(res =>{
                if(res.data.errors){
                    //this.errors = res.data.errors;
                    res.data.errors.forEach(error =>{
                        
                            {this.errors.push(error) }
                    })
                }else{
                  
                  this.billinginfoupdated = true;  
                  this.setBillingInfo();
                  setTimeout(function(){
                      this.billinginfoupdated = false;
                      
                  }.bind(this), 6000);
                  
                }
            })
      }

    
    }
}
</script>