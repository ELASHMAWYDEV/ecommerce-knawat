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
<dashboardindex></dashboardindex>
@endsection