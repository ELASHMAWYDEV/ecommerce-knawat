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
                              <h3 class="card-title">{{!lang ? 'My Tickets' :'تداكري' }}</h3>
                              <div class="card-tools float-right">
                                    <div class="input-group input-group-sm" style="width: 150px;">
                                      <input type="text" name="table_search"  v-model="searchTicket"
                                       class="form-control float-right" :placeholder="!lang ? 'search by title' : 'البحث بالعنوان'">
                  
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
                                  <th style="width: 10px">#</th>
                                  <th>{{!lang ? 'Title' : 'العنوان'}}</th>
                                  <th>{{!lang ? 'Last Update' : 'اخر تحديث'}}</th>
                                  <th >{{!lang ? 'Type': 'النوع'}}</th>
                                  <th >{{!lang ? 'State' : 'الحالة'}}</th>
                                  <th ></th>
                                </tr>
                                <tr  v-for="(t,key) in filteredTickets" :key="key">
                                  <td>{{key}}</td>
                                  <td><a class="text-decoration-none font-weight-bold" :href="'tickets/'+t.id">{{t.title}}</a> </td>
                                  <td>{{getFullDate(t.updated_at)}}</td>
                                  
                                  <td>{{(lang && t.type == 'r') ? 'استفسار' : 'مشكلة' ? (!lang && t.type == 'r') ? 'Request' : 'Problem' :'' }}</td>
                                  <td>
                                      <span v-if="t.state == 0" class="badge bg-danger p-2 text-white" style="    width: 40px;">{{!lang ? 'Closed' : 'مغلق'}}</span>
                                      <span v-else class="badge bg-success p-2 text-white" style="    width: 40px;">{{!lang ? 'Open' : 'مفتوح'}}</span>
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
                              <a href="/create_ticket" class="btn btn-primary p-1">{{!lang ? 'Add Ticket' : 'إضافة تدكرة' }}</a>
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
            axios.get('/mytickets')
            .then(res => {
                this.tickets = res.data;
                this.filteredTickets = res.data;
            })
        },
        paginateTickets($type){

        },
        getFullDate(date){
        let formated = new Date(date);
        return formated.getDate()+'-'+formated.getMonth()+'-'+formated.getFullYear();
      }
      
    },
    computed:{
      lang(){
          return this.$store.state.lang;
      }
    }
  


}
</script>