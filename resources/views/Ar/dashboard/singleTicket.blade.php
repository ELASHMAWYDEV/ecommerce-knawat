@extends('En.dashboard.home')
@section('excss')
<style>
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
</style>
@endsection
@section('dashboardcontent')

<div class="p-2">
    <!-- page wapper-->
            <div class="container p-3 bg-white" id="columns">
               
                  <div class="card-header bg-success pb-1 pt-3">
                    <h5 class="card-title ">Tickets : #{{$ticket->id}}</h5>
                  </div>
                  <div class="card p-4 mt-3 pr-5">
                    <h3 class="ticket-title">{{$ticket->title}} </h3>           
                    
                    <p class="text-muted" style="    font-size: 0.8rem;">created at  @php echo date('m-d-Y',strtotime($ticket->created_at)) @endphp</p>
                    <hr class="m-0  mb-3">
                    <div class="card-body" style="background: #f4f6f9;">
                        <p class="text-justify text-dark">{{$ticket->content}}</p>
                    </div>
                    <div class="card-tools">
                          <div class="input-group input-group-sm" style="width: 150px;">
                            <button class="btn btn-flat btn-success mt-2 addbtncollapse" data-toggle="collapse" data-target="#addreply">Add Reply</button>
                          </div>
                    </div>
                    <div class="collapse" id="addreply">
                      @if($errors)
                       @foreach($errors->all() as $err)
                         <div class="alert alert-danger">{{$err}}</div>
                       @endforeach
                      @endif
                      <form action="{{route('user.add_ticket_reply',['ticket_id'=>$ticket->id])}}" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <input type="hidden" name="user_id" value="{{Auth::id()}}">
                       <textarea name="content" id="" class="form-control mt-2" rows="8"></textarea>
                       <label for="addfile" class="mt-3 addfilelink" >
                            [Add Files] 
                       </label><input type="file" id="addfile" name="addfile" class="d-none">
                       <button class="btn btn-primary pl-3 pr-3 d-block" >Send</button>
                      </form>
                    </div>
                  </div>
                  <div class="card mt-3">
                      <div class="container">
                          <ul class=" pt-3 pl-0">
                           
                            @forelse ($ticket->replies  as $reply)
                           
                            @if($reply->from_admin == 0)
                            <li class="media">
                                <a class="pull-left mr-2  d-none d-sm-block" href="#">
                                  <img class="media-object img-circle" src="{{asset('profile_img/').'/'.Auth::user()->billinginfo->img}}" alt="profile">
                                </a>
                                <div class="media-body">
                                  <div class="well well-lg">
                                      <h6 class="media-heading text-uppercase reviews">{{Auth::user()->fullname()}} <span class="float-right media-date">{{date('Y-m-d',strtotime($reply->created_at))}}</span></h6>
                                     {{--  <p class="media-date text-uppercase reviews ">
                                          
                                      </p> --}}
                                      <p class="media-comment">
                                        {{$reply->content}}
                                      </p>
                                      @if($reply->exfile)
                                      <hr>
                                      Attatched file <a target="_blink" href="{{asset('replies_files').'/'.$reply->exfile}}" class="ml-2">consult</a>
                                      @endif
                                  </div>              
                                </div>
                            </li>
                            @else
                            <li class="media " style="direction:rtl">
                                <a class="pull-left ml-2 d-none d-sm-block" href="#">
                                  <img class="media-object img-circle" src="{{asset('profile_img/admin.png')}}" alt="profile">
                                </a>
                                <div class="media-body">
                                  <div class="well well-lg">
                                      <h6 class="media-heading text-uppercase reviews">Support <span class="float-right media-date">{{date('Y-m-d',strtotime($reply->created_at))}}</span></h6>
                                      
                                      <p class="media-comment">
                                        {{$reply->content}}

                                      </p>
                                      @if($reply->exfile)
                                      <hr>
                                      Attatched file <a target="_blink" href="{{asset('replies_files').'/'.$reply->exfile}}" class="ml-2">consult</a>
                                      @endif
                                      
                                  </div>              
                                </div>
                            </li>
                            @endif
                            @empty
                                <div class="well well-lg">
                                    <h6 class="media-heading text-uppercase reviews">No replies yet </h6>
                                </div>
                            @endforelse
                             
                          </ul> 
                          
                       
                  </div>
                  </div>
 
    
</div>
</div>
@endsection
@section('js')
<script>
$(document).on('click','.addbtncollapse',function(){
  if(!$(this).hasClass('collapsed')){
    $(this).text('Close'); 
  }else{
    $(this).text('Add Reply'); 
  }
 
})
</script>
@endsection