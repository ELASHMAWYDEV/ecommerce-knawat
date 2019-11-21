@extends('Ar.app')
@section('title','products')
@section('content')

<!-- main product content-->
<div class="main-product-content">
    <div class="container pt-4 pb-4">
      <div class="row flex-row-reverse">
          <div class="col-lg-9 col-12">
             <div class="row">
                 <div class="col">
                     <div class="shop-top-bar mb-30 pb-1 pt-2">
                           <div class="shop-bar-inner">
                                   <div class="product-view-mode">
                                   <!-- shop-item-filter-list start -->
                                   <!-- <ul class="shop-item-filter-list list-unstyled d-flex">
                                   <li>
                                       <a class="change-view change-view--active" data-view="grid" title="Grid view"><i class="fa fa-th"></i></a>
                                   </li>
                                   <li>
                                       <a class="change-view" data-view="list" title="List view"><i class="fa fa-th-list"></i></a>
                                   </li>
                                   </ul> -->
                                   <!-- shop-item-filter-list end -->
                                   </div>
                                   <div class="toolbar-amount">
                                       <span>عرض 1 - 18 من 33 عنصر</span>
                                   </div>
                           </div>
           
                               <div class="product-select-box">
                                <sortproducts></sortproducts>
                               </div>
                     </div>
                     <!--products-->
                     <div class="shop-products-wrapper">
                         <div id="grid">

                               <Products userId="{{Auth::id()}}"></Products>
                            
                         </div>
                         <paginateProducts></paginateProducts>
                     </div>

                     <!--products-->
                     <!-- featured services -->
                     <div class="featured-servicesborder-0" style="padding: 14px;    clear: both;" >
                         <div class="row bg-white">
                               <div class="media col-md-4 border p-2">
                                       <i class="fa fa-truck main-b-color fa-3x mr-3"></i>
                                       <div class="media-body">
                                           <h5 class="mt-0">شحن مجاني</h5>
                                           يبدأ من طلب أكثر من 200$
                                       </div>
                               </div>
                               <div class="media col-md-4 border p-2">
                                       <i class="fa fa-phone main-b-color  fa-3x mr-3"></i>
                                       <div class="media-body">
                                           <h5 class="mt-0">الدعم 24/7</h5>
                                           اتصل بنا على الخدمة
                                       </div>
                               </div>       
                               <div class="media col-md-4 border p-2">
                                       <i class="fa fa-paper-plane main-b-color fa-3x mr-3"></i>
                                       <div class="media-body">
                                           <h5 class="mt-0">أفضل العروض</h5>
                                           خصم حتى 50%
                                       </div>
                               </div>       
                         </div>
                      
                     </div>
                     
                     <!--featured services-->
                     <!--best sellter-->
                     <h6 class="mt-2 ">
                           <span class="slide-choosen-categories main-b-color d-inline-block">الأكثر مبيعا <hr class="hr-choosen-c"></span>
                           <hr class="hr-full-slide-section">
                     </h6>
                     <bestsellers></bestsellers>
                      <!--best sellter-->
                      <!-- most seller categories-->
                      
                     <popularcategories></popularcategories>

                      <!-- most seller categories-->
                 </div>
                   
             </div>
             <div class="shop-products-wrapper">

             </div>
          </div>
          <div class="col-lg-3">
              <div class="shop-sidebar">
                  <!--
                   <div class="categories-box sidebar-categores-box">
                         <div class="section-title">
                           <h5 class="font-weight-bold">CATEGORIES</h5>
                         </div>
                          <div class="sidebar-categores-inner">
                           <div class="filter-group">
                             
                             
                             <a class="" href="best-sellers.html"><i class="fa fa-check main-b-color "></i> Best Sellers <span>(16)</span></a>
                             
                             <a class="active" href="camera.html"><i class="fa fa-check main-b-color "></i> CAMERA <span>(21)</span></a>
                             
                             <a class="" href="deal.html"><i class="fa fa-check main-b-color "></i> deal <span>(15)</span></a>
                             
                             <a class="" href="featured.html"><i class="fa fa-check main-b-color "></i> Featured <span>(16)</span></a>
                             
                             <a class="" href="new-arrivals.html"><i class="fa fa-check main-b-color "></i> New arrivals <span>(15)</span></a>
                             
                     
                           </div>
                          </div>
                   </div>
                  -->
                   <bigcatalogue></bigcatalogue>
                   <div class="categories-box sidebar-categores-box">
                         <div class="section-title">
                           <h5 class="font-weight-bold">اللون</h5>
                         </div>
                          <div class="sidebar-categores-inner">
                           <div class="filter-group">
                             
                             
                             <a class="" href="javascript:void();"><i class="fa fa-check main-b-color "></i> أحمر<span> (16)</span></a>
                             
                             <a class="" href="javascript:void();"><i class="fa fa-check main-b-color "></i> أخضر <span> (21)</span></a>
                             
                             <a class="" href="javascript:void();"><i class="fa fa-check main-b-color "></i> أزرق <span> (15)</span></a>
                             
                             <a class="" href="javascript:void();"><i class="fa fa-check main-b-color "></i> أبيض <span> (16)</span></a>
                             
                             <a class="" href="javascript:void();"><i class="fa fa-check main-b-color "></i> أصفر<span> (15)</span></a>
                             <a class="" href="javascript:void();"><i class="fa fa-check main-b-color "></i> أسود<span> (15)</span></a>
                             
                     
                           </div>
                          </div>
                   </div>
                   <div class="categories-box sidebar-categores-box">
                         <div class="section-title">
                           <h5 class="font-weight-bold">الحجم</h5>
                         </div>
                        <sizefilter></sizefilter>
                   </div>
              </div>
          </div>
      </div>
    </div> 
    <!--main product content-->

    </div>
@endsection