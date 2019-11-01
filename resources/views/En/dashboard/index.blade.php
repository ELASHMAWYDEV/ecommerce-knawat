@extends('En.dashboard.home')
@section('excss')
<style>
    .media{    padding: 1rem;color:#fff;
    }
    .user-stat{background:#37B047}
    .product-stat{background:#8262E4}
    .favorited-stat{background:#08a90d}
    .message-stat{background:#FB8F17}
    .loader {
  border: 16px solid #f3f3f3; /* Light grey */
  border-top: 16px solid #3498db; /* Blue */
  border-radius: 50%;
  width: 30px;
  height: 30px;
  animation: spin 2s linear infinite;
}
/*comments*/
.comment-wrapper .panel-body {
    max-height:650px;
    overflow:auto;
}

.comment-wrapper .media-list .media img {
    width:64px;
    height:64px;
       border: 1px solid #e5e7e8;
    border-radius: 50%;
    margin-right: 6px;
}

.comment-wrapper .media-list .media {
    border-bottom:1px dashed #efefef;
    margin-bottom:25px;
}
.latest-messages{box-shadow: 0 0px 5px 2px #c1c1c1;}
.latest-messages .media-body p{color: #090808;}
</style>
@endsection
@section('dashboardcontent')
<div class="p-2">
    <div class="row">
          <div class="col-md-3 ">
                    
            <div class="media favorited-stat">
                <i class="fa fa-cubes  fa-2x ml-4" aria-hidden="true"></i>
                <div class="media-body">
                  <h3 class="mt-0 ml-2" id="pr-fav"><div class="loader"></div>
                  </h3>
                  <p class="font-size-1">products favorited</p>
                </div>
                
            </div>
            
          </div>
          <div class="col-md-3 ">
                    
            <div class="media product-stat">
                <i class="fa fa-cubes  fa-2x ml-4" aria-hidden="true"></i>
                <div class="media-body">
                  <h3 class="mt-0 ml-2" id="pr-cart"><div class="loader"></div>
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
    <div class="latest-messages mt-3 p-3">
        
            <div class="row bootstrap snippets">
                    <div class="col-md-offset-2 col-sm-12">
                        <div class="comment-wrapper">
                            <div class="panel panel-info">
                                
                                <div class="panel-body">
                                    
                                    <ul class="media-list">
                                        <h5>latest tickets replies</h5>
                                        <li class="media border">
                                            <a href="#" class="pull-left">
                                                <img src="/img/avatar2.png" alt="" class="img-circle">
                                            </a>
                                            <div class="media-body">
                                                <span class="text-muted pull-right">
                                                    <small class="text-muted">30 min ago</small>
                                                </span>
                                                <strong class="text-success">@MartinoMont</strong>
                                                <p>
                                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                                    Lorem ipsum dolor sit amet, <a href="#">#consecteturadipiscing </a>.
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
@endsection