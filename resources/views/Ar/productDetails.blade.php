@extends('Ar.app')
@section('title','product |'.$sku)
@section('content')
<!-- mian product content-->
<div class="container pt-4 pb-4">
    
    <!-- single product--> 
   
     
       <productdetails vid="{{$sku}}" userId="{{Auth::id()}}" incart="{{$incart}}"></productdetails>
         

   
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
  
    $("#img_1").ezPlus({
            zoomType: 'lens',
            lensShape: 'round',
            lensSize: 100
        });
})

</script>
@endsection