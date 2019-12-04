<template>
    <div class="card">
                            <div class="card-header">
                              <h3 class="card-title">قائمة الطلبات</h3>
                              <div class="card-tools">
                                    <div class="input-group input-group-sm" style="width: 150px;">
                                      <input type="text" name="table_search"  v-model="searchOrders"
                                       class="form-control float-right" placeholder="بحث باسم العميل أورقم الطلب">
                  
                                      <div class="input-group-append">
                                        <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                                      </div>
                                    </div>
                              </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                              <table class="table table-bordered">
                                <tbody><tr>
                                  <th style="width: 10px">#</th>
                                  <th>رقم الطلب</th>
                                  <th>العميل</th>
                                  <th>المنتج</th>
                                  <th>الكمية</th>
                                  <th >المجموع</th>
                                  <th >الحالة</th>
                                  <th >التقييم</th>
                                  <th >خيارات</th>
                                </tr>
                                <tr  v-for="(t,key) in orders.data" :key="key">
                                  <td>{{key}}</td>
                                  <td>{{t.id}}</td>
                                  <td>{{t.user.firstname +' '+t.user.lastname}}</td>
                                  <td>
                                     {{t.sku }}
                                    
                                  </td>
                                  <td> <strong>{{ t.quantity }}</strong></td>
                                  <td>{{t.total_price}} <strong>$</strong> </td>
                                  <td>
                                      <span  class="badge bg-danger p-1" style="    width: 53px;">معلق</span>
                                      <span class="badge bg-success p-1 mt-1" style="    width: 53px;">تم</span>
                                  </td>
                                  <td>
                                    {{t.rating}} / 5
                                  </td>
                                  <td>
                                      <a href="#"><i class="fa fa-check-square ml-2 "></i></a>
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
import VuePagination from './Pagination.vue';
export default {
    data(){
        return {
            tickets:[],
            filteredTickets:[],
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
    components:{
      VuePagination
    },
    mounted(){
         this.getOrders();
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
                axios.get(`getordersbyid/${Number.parseInt(query)}`)
                .then((response) => {
                  console.log(response.data)
                    this.orders = response.data;
                })
                .catch(() => {
                    console.log('handle server error from here');
                });
                
         }else{
            axios.get(`getordersbyusername/${query}`)
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
        getOrders() {
            axios.get(`getallorders?page=${this.orders.current_page}`)
                .then((response) => {
                    this.orders = response.data;
                })
                .catch(() => {
                    console.log('handle server error from here');
                });
        }
    }


}
</script>