@extends('En.app')
@section('title','products')
@section('content')
<!-- mian product content-->
<div class="container pt-4 pb-4">
    
    <!-- single product--> 
   
     
       <productdetails vid="{{$sku}}"></productdetails>
         

   
   <!--related products
   <relatedProducts vid="{{$sku}}"></relatedProducts>
   -->
   <!--related products-->
</div>
@endsection
@section('js') 

<script type="text/javascript" src="https://cdn.rawgit.com/igorlino/elevatezoom-plus/1.1.6/src/jquery.ez-plus.js"></script>
<script>
$(document).ready(function(){
  
    $("#img_01").ezPlus({
            zoomType: 'lens',
            lensShape: 'round',
            lensSize: 100
        });
})
</script>
@endsection