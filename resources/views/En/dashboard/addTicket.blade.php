@extends('En.dashboard.home')
@section('excss')
<style>
 input[type='radio']{
    width: 40px;
    position: relative;
    top: 2px;
 }
 .addfilelink{    font-size: 16px;
    color: #2678d0;
    cursor: pointer;}
@media(max-width:575px){
    #columns > form  label{padding-left: 0px}
}
</style>
@endsection
@section('dashboardcontent')
<div class="p-2">
    <!-- page wapper-->
            <div class="container p-3 bg-white" id="columns">
                
               <h5>Open ticket</h5>
               <hr>
               <form action="{{route('user.createTicket')}}" method="post" enctype="multipart/form-data" style="box-shadow: 0 1px 8px #cac8c8;
               padding: 1.5rem;">
                {{ csrf_field() }}
                <input type="hidden" name="user_id" value="{{Auth::id()}}">
                <div class="row m-0">
                    <label for="title" class="col-sm-2"><strong>Type</strong></label>
                    <div class="col-sm-10">
                        <div>
                          <input type="radio" name="type[]" value="r" id="req"><label for="req">Request</label>

                        </div>
                        <div>
                          <input type="radio" name="type[]" value="p" id="prob"><label for="prob">Probleme</label> 

                        </div>
                    </div>
                </div>
                
                <hr><br>
                <div class="row mr-0 ml-0 form-group">
                    <label for="title" class="col-sm-2"><strong>Subject</strong></label>
                    <input type="text" class="col-sm-10 form-control" name="title" id="title">
                </div>
                <div class="row mr-0 ml-0 form-group">
                    <label class="col-sm-2" for="content"><strong>Content</strong></label>
                    <textarea name="content" id="content" class="form-control col-sm-10" rows="8"></textarea>
                </div>
                <div class="row mr-0 ml-0 mt-2 form-group">
                    <label class="col-sm-2" for="content"><strong>Add Attachment</strong></label>
                    <label for="addfile" class=" addfilelink col-sm-10" >
                     [ Add File ] 
                    </label><input type="file" id="addfile" name="addfile" class="d-none">
                </div>
                <br>
               <button class="btn btn-primary pl-4 pr-4 d-block" >Send</button>
              </form>
            </div>
 
    
</div>
@endsection