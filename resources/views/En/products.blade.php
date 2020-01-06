@extends('En.app')
@section('title','products')
@section('content')

<!-- main product content-->
<div class="main-product-content">
    <div class="container pt-4 pb-4">
      <div class="row flex-row-reverse">
          <div class="col-lg-9 col-12">
             <div class="row">
                 <div class="col">
                     <!--the main slider -->
                     <div id="mainslid" class="carousel slide" data-ride="carousel">
                        <div class="carousel-inner">
                          @foreach ($sliders as $slider)
                            <div class="carousel-item @if($loop->first) active @endif">
                              <img class="d-block w-100" src="{{asset('slider_img/').'/'.$slider->image}}" alt="First slide">
                            </div>  
                          @endforeach
                        </div>
                        <a class="carousel-control-prev" href="#mainslid" role="button" data-slide="prev">
                          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                          <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#mainslid" role="button" data-slide="next">
                          <span class="carousel-control-next-icon" aria-hidden="true"></span>
                          <span class="sr-only">Next</span>
                        </a>
                      </div>
                     <!--the main slider -->
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
                                       <span>Showing 1 - 18 of 33 item(s)</span>
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
                                       <i class="fa fa-truck oldmain-b-color fa-3x mr-3"></i>
                                       <div class="media-body">
                                           <h5 class="mt-0">Free Shipping</h5>
                                           Start from order 200$
                                       </div>
                               </div>
                               <div class="media col-md-4 border p-2">
                                       <i class="fa fa-phone oldmain-b-color  fa-3x mr-3"></i>
                                       <div class="media-body">
                                           <h5 class="mt-0">Support 24/7</h5>
                                           Call us in service
                                       </div>
                               </div>       
                               <div class="media col-md-4 border p-2">
                                       <i class="fa fa-paper-plane oldmain-b-color fa-3x mr-3"></i>
                                       <div class="media-body">
                                           <h5 class="mt-0">Hot Offers</h5>
                                           Discount up to 50%
                                       </div>
                               </div>       
                         </div>
                      
                     </div>
                     
                     <!--featured services-->
                     <!--best sellter-->
                     <h6 class="mt-2 ">
                           <span class="slide-choosen-categories oldmain-b-color d-inline-block">BEST SELLERS <hr class="hr-choosen-c"></span>
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
                   {{-- <div class="categories-box sidebar-categores-box">
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
                   </div> --}}
                   <bigcatalogue></bigcatalogue>
                   <div class="categories-box sidebar-categores-box">
                         <div class="section-title">
                           <h5 class="font-weight-bold">COLOR</h5>
                         </div>
                          <div class="sidebar-categores-inner">
                           <div class="filter-group">
                             
                             
                             <a class="" href="javascript:void();"><i class="fa fa-check oldmain-b-color "></i> red<span>(16)</span></a>
                             
                             <a class="" href="javascript:void();"><i class="fa fa-check oldmain-b-color "></i> green <span>(21)</span></a>
                             
                             <a class="" href="javascript:void();"><i class="fa fa-check oldmain-b-color "></i> blue <span>(15)</span></a>
                             
                             <a class="" href="javascript:void();"><i class="fa fa-check oldmain-b-color "></i> white <span>(16)</span></a>
                             
                             <a class="" href="javascript:void();"><i class="fa fa-check oldmain-b-color "></i> yellow<span>(15)</span></a>
                             <a class="" href="javascript:void();"><i class="fa fa-check oldmain-b-color "></i> black<span>(15)</span></a>
                             
                     
                           </div>
                          </div>
                   </div>
                   <div class="categories-box sidebar-categores-box">
                         <div class="section-title">
                           <h5 class="font-weight-bold">SIZE</h5>
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