<style scoped>
.card-header>.card-tools {
    left: auto;
    right: 1rem;
    position: absolute;
    right: 1rem;
    top: .5rem;
}
.input-group {
    position: relative;
    display: flex;
    flex-wrap: wrap;
    align-items: stretch;
    width: 100%;
}.input-group-append, .input-group-prepend {
    display: flex;
}.input-group-append {
    margin-right: 0;
    margin-left: -1px;
}.input-group-append button{background: #e2e2e2;
    border: 1px solid #ced4da;}
.card-header {
    padding: .75rem 1.25rem;
    margin-bottom: 0;
}.card-title {
    font-size: 1.25rem;
    font-weight: 400;
    margin: 0;
}
@media(max-width: 420px){
  .card-header .card-tools{
       display: none
  }
}

</style>
<template>
    <div class="card">
                            <div class="card-header">
                              <h3 class="card-title">{{!lang ? 'My Orders' :'طلباتي' }}</h3>
                              <div class="card-tools float-right">
                                    <div class="input-group input-group-sm" style="width: 150px;">
                                      <input type="text" name="table_search"  v-model="searchOrders"
                                       class="form-control float-right" :placeholder="!lang ? 'search by number or title' : 'البحث برقم الطلب أو رقم المنتج'"
                                       :title="!lang ? 'search by Sku or order' : 'البحث برقم الطلب أو رقم المنتج'">
                  
                                      <div class="input-group-append">
                                        <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                                      </div>
                                    </div>
                              </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body " style="overflow: scroll;">
                              <table class="table table-bordered">
                                <tbody><tr>
                                  <th style="width: 10px">{{!lang ? 'Order number' : 'رقم الطلب'}}</th>
                                  <th>{{!lang ? 'Sku' : 'رقم المنتج'}}</th>
                                  <th>{{!lang ? 'Quantity' : 'الكمية'}}</th>
                                  <th >{{!lang ? 'Total': 'المجموع'}}</th>
                                  <th >{{!lang ? 'State' : 'الحالة'}}</th>
                                  <th >{{!lang ? 'rating' : 'التقييم'}}</th>
                                  <th >{{!lang ? 'options' : 'خيارات'}}</th>
                                </tr>
                                <tr  v-for="(o,key) in orders.data" :key="key">
                                  <td>{{o.id}}</td>
                                  <td><a class="text-decoration-none font-weight-bold" :href="'/products/'+o.sku" target="_blink">{{o.sku}}</a> </td>
                                  <td>{{ o.quantity }}</td>
                                  
                                  <td>{{o.total_price}}</td>
                                  <td>
                                      <span  class="badge bg-danger p-2 text-white" style="    width: 53px;">{{!lang ? 'Closed' : 'معلق'}}</span>
                                      <span class="badge bg-success p-2 text-white mt-1" style="    width: 53px;">{{!lang ? 'Open' : 'تم'}}</span>
                                  </td>
                                  <td>
                                    {{o.rating}} / 5
                                  </td>
                                  <td>
                                      <a :href="'#'"><i class="fa fa-eye ml-2 "></i></a>
                                      <a href="#"><i class="fa fa-trash ml-2 "></i></a>
                                  </td>
                                </tr>
                                </tbody>
                              </table>
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer clearfix">
                              
                              <VuePagination  :pagination="orders"
                              @paginate="getOrders()"
                              :offset="4">
                              </VuePagination>
                            </div>
    </div>
</template>
<script>
import VuePagination from '../../admin/Pagination.vue';
export default {
    data(){
        return {
            
            searchOrders : '',
            orders: {
            total: 0,
            per_page: 2,
            from: 1,
            to: 0,
            current_page: 1
            },
            offset: 4,
        }
    },
    mounted(){
        this.getOrders();
    },
    components:{
      VuePagination
    },
    watch:{
        searchOrders(query){
         if(query.toString().length == 0){
           this.orders.current_page = 1;
           this.getOrders();
           return false;
         }
         console.log(typeof(Number.parseInt(query)))
         if(!isNaN(Number.parseInt(query))){
                axios.get(`getmyordersbyid/${Number.parseInt(query)}`)
                .then((response) => {
                  console.log(response.data)
                    this.orders = response.data;
                })
                .catch(() => {
                    console.log('handle server error from here');
                });
                
         }else{
            axios.get(`getmyordersbysku/${query}`)
                .then((response) => {
                    this.orders = response.data;
                })
                .catch(() => {
                    console.log('handle server error from here');
                });
         }
       }
    },
    methods:{
        paginateTickets($type){

        },
        getFullDate(date){
        let formated = new Date(date);
        return formated.getDate()+'-'+formated.getMonth()+'-'+formated.getFullYear();
      },
       getOrders() {
            axios.get(`getmyorders?page=${this.orders.current_page}`)
                .then((response) => {
                    this.orders = response.data;
                })
                .catch(() => {
                    console.log('handle server error from here');
                });
        }
      
    },
    computed:{
      lang(){
          return this.$store.state.lang;
      }
    }
  


}
</script>