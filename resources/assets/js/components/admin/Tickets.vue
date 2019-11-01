<template>
    <div class="card">
                            <div class="card-header">
                              <h3 class="card-title">قائمة التذاكر</h3>
                              <div class="card-tools">
                                    <div class="input-group input-group-sm" style="width: 150px;">
                                      <input type="text" name="table_search"  v-model="searchTicket"
                                       class="form-control float-right" placeholder="بحث بالعنوان">
                  
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
                                  <th>العنوان</th>
                                  <th >العميل</th>
                                  <th >النوع</th>
                                  <th >الحالة</th>
                                  <th ></th>
                                </tr>
                                <tr  v-for="(t,key) in filteredTickets" :key="key">
                                  <td>{{key}}</td>
                                  <td>{{t.title}}</td>
                                  <td>
                                    {{t.user.firstname}} {{t.user.firstname}}
                                  </td>
                                  <td>{{t.type == 'r' ? 'استفسار' : 'مشكلة'}}</td>
                                  <td>
                                      <span v-if="t.state == 0" class="badge bg-danger p-1">مغلق</span>
                                      <span v-else class="badge bg-success p-1">مفتوح</span>
                                  </td>
                                  <td>
                                      <a :href="'tickets/'+t.id"><i class="fa fa-eye ml-2 "></i></a>
                                  </td>
                                </tr>
                                </tbody>
                              </table>
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer clearfix">
                              <ul class="pagination pagination-sm m-0 float-right">
                                <li class="page-item"><a class="page-link" @click="paginateTickets('prev')">«</a></li>
                                <li class="page-item"><a class="page-link" @click="paginateTickets('next')" >»</a></li>
                              </ul>
                            </div>
    </div>
</template>
<script>
export default {
    data(){
        return {
            tickets:[],
            filteredTickets:[],
            searchTicket : '',
        }
    },
    mounted(){
        this.getTickets();
    },
    watch:{
       searchTicket(query){
         if(query.toString().length == 0){
           return  this.filteredTickets = this.tickets;
         }
           this.filteredTickets = this.tickets.filter(t =>{
                return ((t.title.includes(query))
                || (t.user.firstname.includes(query))
                || (t.user.lastname.includes(query))
                )
           });
       }
    },
    methods:{
        getTickets(){
            axios.get('alltickets')
            .then(res => {
                this.tickets = res.data;
                this.filteredTickets = res.data;
            })
        },
        paginateTickets($type){

        }
    }


}
</script>