
@extends('admin.layouts.app')
@section('title','التذاكر')
@section('style')
  
  <style>
    label.error{
        color: red;
        font-weight: 500;
        margin-bottom: 0;
    }
    .card-title {
    font-size: 1.25rem;color:white;
    font-weight: 400;
    margin: 0;
}
.reviews {
    color: #555;    
    font-weight: bold;
    margin: 10px auto 20px;
}
.media .media-object { width: 100px;height: 100px; }
.media-date {     font-size: 14px;
}
.media-date li { padding: 0; }
.media-date li:first-child:before { content: ''; }
.media-date li:before { 
    content: '.'; 
    margin-left: -2px; 
    margin-right: 2px;
}
.media-comment { margin-bottom: 20px; }
.img-circle {
    border-radius: 50%;border: 1px solid #cac4c4;
}
.well-lg{padding: 24px;
    border-radius: 6px;}
.well {
    min-height: 20px;
    padding: 19px;
    margin-bottom: 20px;
    background-color: #f5f5f5;
    border: 1px solid #e3e3e3;
    border-radius: 4px;
    -webkit-box-shadow: inset 0 1px 1px rgba(0,0,0,.05);
    box-shadow: inset 0 1px 1px rgba(0,0,0,.05);
}
.addfilelink{font-size: 16px;       color: #2678d0;cursor: pointer}
.addfilelink:hover{    color:  rgba(0, 123, 255, 0.84);}
.addbtncollapse {    font-size: 0.9rem !important;}
#notify{    position: relative;
    top: 3px;
    margin-left: 5px;}
  </style>
@endsection
@section('content')
<div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            {{--<div class="col-sm-6">
              <h1 class="m-0 text-dark">الرئيسية</h1>
            </div><!-- /.col -->
             <div class="col-sm-6">
              <ol class="breadcrumb float-sm-left">
                <li class="breadcrumb-item"><a href="#">خانه</a></li>
                <li class="breadcrumb-item active">الرئيسية</li>
              </ol>
            </div ><!-- /.col -->
          </div><!-- /.row -->--}}
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->
  
      <!-- Main content -->
      <div class="content">
        <div class="container-fluid "> 
            <div class="flash-message">
                @foreach (['danger', 'warning', 'success', 'info'] as $msg)
                @if(Session::has('alert-' . $msg))

                <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
                @endif
                @endforeach
            </div> 
            @if($errors)
              @foreach($errors->all() as $err)
              <div class="alert alert-success alert-dismissible fade show  ml-auto ml-auto mb-3" role="alert">
                  {{$err}}   
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
              </div>
              @endforeach
            @endif
            
        </div>
        
        <div class="card">
            <div class="card-header bg-primary">
              <h4 class="card-title ">مشاهدة التدكرة : #{{$ticket->id}}
                 @if($ticket->state == 1)
                  <button class="btn float-left btn-danger closeTicket" data-ticket_id='{{$ticket->id}}'
                  >غلق التذكرة</button>
                  @else
                  <button class="btn float-left btn-success openTicket" data-ticket_id='{{$ticket->id}}'
                  >فتح التذكرة</button>
                  @endif
              </h4>
            </div>
            <div class="card p-4 mt-3 pr-5">
              <h3 class="ticket-title">{{$ticket->title}} </h3>           
              
              <p class="text-muted" style="    font-size: 0.8rem;">انشئت في  @php echo date('m-d-Y',strtotime($ticket->created_at)) @endphp</p>
              <hr class="m-0  mb-3">
              <div class="card-body" style="background: #f4f6f9;">
                  <p class="text-justify text-dark">{{$ticket->content}}</p>
              </div>
              <div class="card-tools">
                    <div class="input-group input-group-sm" style="width: 150px;">
                      <button class="btn btn-flat btn-success mt-2 addbtncollapse" data-toggle="collapse" data-target="#addreply">إضافة رد</button>
                    </div>
              </div>
              <div class="collapse" id="addreply">
                  @if($errors)
                   @foreach($errors->all() as $err)
                     <div class="alert alert-danger">{{$err}}</div>
                   @endforeach
                  @endif
                  <form action="{{route('admin.add_ticket_reply',['ticket_id'=>$ticket->id])}}" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <input type="hidden" name="user_id" value="{{$ticket->user->id}}">
                   <textarea name="content" id="" class="form-control mt-2" rows="8"></textarea>
                   <label for="addfile" class="mt-3 addfilelink" >
                        [إرفاق ملف] 
                   </label><input type="file" id="addfile" name="addfile" class="d-none">
                   <br>
                    <input type="checkbox" class="mt-1 " name="notify" id="notify"> 
                   <label for="notify">إرسال إشعار</label>
                  
                   <button class="btn btn-primary pl-4 pr-4 d-block" >إرسال</button>
                  </form>
              </div>
            </div>
            
            <!-- /.card-header -->
            <div class="card mt-3">
                <div class="container">
                    <ul class="p-5">
                     
                      @forelse ($ticket->replies  as $reply)
                     
                      @if($reply->from_admin == 0)
                      <li class="media">
                          <a class="pull-left ml-2  d-none d-sm-block" href="#">
                            <img class="media-object img-circle" src="{{asset('profile_img/').'/'.$ticket->user->billinginfo->img}}" alt="profile">
                          </a>
                          <div class="media-body">
                            <div class="well well-lg">
                                <h6 class="media-heading text-uppercase reviews">{{$ticket->user->fullname()}} <span class="float-left media-date">{{date('Y-m-d',strtotime($reply->created_at))}}</span></h6>
                               {{--  <p class="media-date text-uppercase reviews ">
                                    
                                </p> --}}
                                <p class="media-comment">
                                  {{$reply->content}}

                                </p>
                                @if($reply->exfile)
                                <hr>
                                 ملف مرفق<a target="_blink" href="{{asset('replies_files').'/'.$reply->exfile}}" class="mr-2">معاينة</a>
                                @endif
                            </div>              
                          </div>
                      </li>
                      @else
                      <li class="media " style="direction:rtl">
                          <a class="pull-left ml-2  d-none d-sm-block" href="#">
                            <img class="media-object img-circle" src="{{asset('profile_img/admin.png')}}" alt="profile">
                          </a>
                          <div class="media-body">
                            <div class="well well-lg">
                                <h6 class="media-heading text-uppercase reviews">Support <span class="float-left media-date">{{date('Y-m-d',strtotime($reply->created_at))}}</span> </h6>
                                
                                <p class="media-comment">
                                  {{$reply->content}}

                                </p>
                                @if($reply->exfile)
                                <hr>
                                 ملف مرفق <a target="_blink" href="{{asset('replies_files').'/'.$reply->exfile}}" class="mr-2">معاينة</a>
                                @endif
                                
                            </div>              
                          </div>
                      </li>
                      @endif
                      @empty
                          <div class="well well-lg">
                              <h6 class="media-heading text-uppercase reviews"> لايوجد ردود </h6>
                          </div>
                      @endforelse
                       
                    </ul> 
                    
                 
                </div>
            </div>
               
            </div>


            
            </div>
            
          </div>
              
              
             
              
@section('js')
<script type="text/javascript" src="{{asset('js/sweetalert.min.js')}}"></script>

<script>
$(document).on('click','.addbtncollapse',function(){
  if(!$(this).hasClass('collapsed')){
    $(this).text('تراجع'); 
  }else{
    $(this).text('إضافة رد'); 
  }
 
})
$(document).on('click','.closeTicket',function(){
       let ticket_id = $(this).data('ticket_id');
      var dat = $(this);
      Swal.fire({ 
      title: 'سيتم غلق هاته التدكرة وتصبح محلولة',
      text: "يمكنك اعادة فتحها في أي وقت",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'نعم !',
      cancelButtonText:'إلغاء'
    }).then((result) => {
      if (result.value) {
        $.ajax({
          url:'/admin/tickets/'+ticket_id+'/close',
          method:'get',
          data:{},
          dataType:'json',
          success:function(data){
             if(data.success == 1){
              Swal.fire({
                icon: 'success',
                title: 'تم غلق التدكرة',
                
                showConfirmButton: false,
                timer: 2000
              })
              $(dat).removeClass('btn-danger');
              $(dat).addClass('btn-success');
              $(dat).text('فتح التدكرة');
              $(dat).removeClass('closeTicket');
              $(dat).addClass('openTicket');

             }
          }
        })
        
      }
    })
})
$(document).on('click','.openTicket',function(){
       let ticket_id = $(this).data('ticket_id');
      var dat = $(this);
      Swal.fire({ 
      title: 'سيتم فتح هاته التدكرة ',
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'نعم !',
      cancelButtonText:'إلغاء'
    }).then((result) => {
      if (result.value) {
        $.ajax({
          url:'/admin/tickets/'+ticket_id+'/open',
          method:'get',
          data:{},
          dataType:'json',
          success:function(data){
             if(data.success == 1){
              Swal.fire({
                icon: 'success',
                title: 'تم غلق التدكرة',
                
                showConfirmButton: false,
                timer: 2000
              })
              $(dat).removeClass('btn-success');
              $(dat).addClass('btn-danger');
              $(dat).text('غلق التدكرة');
              $(dat).removeClass('openTicket');
              $(dat).addClass('closeTicket');

             }
          }
        })
        
      }
    })
})
</script>
@endsection
@endsection