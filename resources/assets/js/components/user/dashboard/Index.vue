<template>
    <div class="p-2">
    <div class="row">
          <div class="col-md-3 pb-2">
                    
            <div class="media favorited-stat">
                <i class="fa fa-cubes  fa-2x ml-4" aria-hidden="true"></i>
                <div class="media-body">
                  <h3 class="mt-0 ml-2" v-if="pfloading" id="pr-fav"><div class="loader"></div>
                  </h3>
                  <h3 v-else class="mt-0 ml-2" id="pr-fav">
                      {{favoritesCount}}
                  </h3>
                  <p class="font-size-1">{{!lang ? 'products favorited' : 'منتج في المفضلة' }}</p>
                </div>
                
            </div>
            
          </div>
          <div class="col-md-3 pb-2">
                    
            <div class="media product-stat">
                <i class="fa fa-cubes  fa-2x ml-4" aria-hidden="true"></i>
                <div class="media-body">
                  <h3 v-if="prloading" class="mt-0 ml-2" id="pr-cart">
                      <div  class="loader"></div>
                  </h3>
                  <h3 v-else class="mt-0 ml-2" id="pr-cart">
                      {{CartItemsCount}}
                  </h3>
                  <p class="font-size-1">{{!lang ? 'products in cart' : 'منتج في السلة'}}</p>
                </div>
                
            </div>
            
          </div>
          <div class="col-md-3 pb-2">
            
            <div class="media message-stat">
                <i class="fa fa-envelope fa-2x ml-4"></i>
                <div class="media-body">
                  <h3 class="mt-0 ml-2">0</h3>
                  <p> {{!lang ? 'message' : 'رسالة'}} </p>
                </div>
                
            </div>
            
          </div>
    </div>
    <div class="latest-messages mt-3 p-3" v-if="this.latestreplies != null && this.latestreplies.length > 0">
        
            <div class="row bootstrap snippets">
                    <div class="col-md-offset-2 col-sm-12">
                        <div class="comment-wrapper">
                            <div class="panel panel-info">
                                
                                <div class="panel-body">
                                    
                                    <ul class="media-list pl-0">
                                        <h5>{{!lang ? 'latest tickets replies' : 'اخر الردود'}}</h5>
                                        <li class="media border" v-for="(r,k) in latestreplies" :key="k">
                                            <a href="#" class="pull-left">
                                                <img  src="/profile_img/admin.png" alt="admin icon" class="img-circle">
                                            </a>
                                            <div class="media-body">
                                                <span class="text-muted pull-right">
                                                    <small class="text-muted font-weight-bold" >{{getFullDate(r.created_at)}}</small>
                                                </span>
                                                <strong  class="text-success">{{!lang ? '@support' : 'الدعم'}}</strong>
                                                <p>
                                                    {{r.content}} <a :href="'/tickets/'+r.ticket_id">{{!lang ? 'Consult' : 'مشاهدة'}} </a>.
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
      lang(){
          return this.$store.state.lang;
      }
    },
    methods:{
        setLatestReplies(){
          axios.get('/userLatestReplies')
          .then(res => {
              this.latestreplies = res.data.replies;
          })
        },
        getFullDate(date){
        let formated = new Date(date);
        return formated.getDate()+'-'+formated.getMonth()+'-'+formated.getFullYear();
      }
      
    }
}
</script>