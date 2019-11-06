<template>
    <div class="p-2">
    <div class="row">
          <div class="col-md-3 ">
                    
            <div class="media favorited-stat">
                <i class="fa fa-cubes  fa-2x ml-4" aria-hidden="true"></i>
                <div class="media-body">
                  <h3 class="mt-0 ml-2" v-if="pfloading" id="pr-fav"><div class="loader"></div>
                  </h3>
                  <h3 v-else class="mt-0 ml-2" id="pr-fav">
                      {{favoritesCount}}
                  </h3>
                  <p class="font-size-1">products favorited</p>
                </div>
                
            </div>
            
          </div>
          <div class="col-md-3 ">
                    
            <div class="media product-stat">
                <i class="fa fa-cubes  fa-2x ml-4" aria-hidden="true"></i>
                <div class="media-body">
                  <h3 v-if="prloading" class="mt-0 ml-2" id="pr-cart">
                      <div  class="loader"></div>
                  </h3>
                  <h3 v-else class="mt-0 ml-2" id="pr-cart">
                      {{CartItemsCount}}
                  </h3>
                  <p class="font-size-1">products in cart</p>
                </div>
                
            </div>
            
          </div>
          <div class="col-md-3 ">
            
            <div class="media message-stat">
                <i class="fa fa-envelope fa-2x ml-4"></i>
                <div class="media-body">
                  <h3 class="mt-0 ml-2">5</h3>
                  <p> message </p>
                </div>
                
            </div>
            
          </div>
    </div>
    <div class="latest-messages mt-3 p-3" v-if="latestreplies != null && latestreplies.length > 0">
        
            <div class="row bootstrap snippets">
                    <div class="col-md-offset-2 col-sm-12">
                        <div class="comment-wrapper">
                            <div class="panel panel-info">
                                
                                <div class="panel-body">
                                    
                                    <ul class="media-list">
                                        <h5>latest tickets replies</h5>
                                        <li class="media border" v-for="(r,k) in latestreplies" :key="k">
                                            <a href="#" class="pull-left">
                                                <img v-if="(!r.from_admin) &&  userImg.length > 0" :src="'/profile_img/'+userImg" alt="user_img" class="img-circle">
                                                <img v-else src="/profile_img/admin.png" alt="admin icon" class="img-circle">
                                            </a>
                                            <div class="media-body">
                                                <span class="text-muted pull-right">
                                                    <small class="text-muted font-weight-bold" >{{getFullDate(r.created_at)}}</small>
                                                </span>
                                                <strong v-if="(!r.from_admin)" class="text-success">@you</strong>
                                                <strong v-else class="text-success">@support</strong>
                                                <p>
                                                    {{r.content}} <a :href="'/tickets/'+r.ticket_id">Consult </a>.
                                                </p>
                                            </div>
                                        </li>
                                       
                                    </ul>
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
        return {
            prloading : true,
            pfloading :true,
            latestreplies:null,
            userImg : ''
        }
    },
    mounted(){
        this.setLatestReplies();
        setTimeout(function(){
            this.prloading = false;
            this.pfloading = false;
        }.bind(this),5000);
        
    },
    computed:{
       CartItemsCount(){
           return this.$store.state.cartItems.length;
       },
       favoritesCount(){
           return this.$store.state.favoritedProducts.length;
       },
    },
    methods:{
        setLatestReplies(){
          axios.get('/userLatestReplies')
          .then(res => {
              this.latestreplies = res.data.replies;
              this.userImg = res.data.img
          })
        },
        getFullDate(date){
        let formated = new Date(date);
        return formated.getDate()+'-'+formated.getMonth()+'-'+formated.getFullYear();
      }
    }
}
</script>