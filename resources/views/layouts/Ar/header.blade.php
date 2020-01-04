<!-- HEADER -->
<div id="header" class="header">
    <div class="wl">
        {{-- <i id="menu-toggle" href="#" class="toggle square"><i class="fa fa-bars fa-lg" aria-hidden="true"></i></i> --}}
           <nav id="sidebar-wrapper">
               <ul class="sidebar-nav">
                   <a id="close-menu" href="#" class="pull-right toggle square"><i class="fa fa-times fa-lg main-r-color"></i></a>
                   <li class="sidebar-brand">
                       <a href="#top" onclick=$("#close-menu").click();></a>
                   </li>
                   <li  style="clear:both">
                       <a  href="{{route('frontEnd.home')}}" onclick=$("#close-menu").click();>الرئيسية</a>
                   </li>
                   
                   <li>
                       <a href="{{route('frontEnd.products')}}" onclick=$("#close-menu").click();>المنتجات</a>
                   </li>
                   <li>
                       <a href="{{route('frontEnd.about_us')}}" onclick=$("#close-menu").click();>من نحن</a>
                   </li>
                   <li>
                       <a href="{{route('frontEnd.terms')}}" onclick=$("#close-menu").click();>الشروط والقوانين</a>
                   </li>
                   <li>
                       <a href="{{route('frontEnd.contact_us')}}" onclick=$("#close-menu").click();>اتصل بنا</a>
                   </li>
                   <hr style="margin: 5px 0 0;border-top: 1px solid #666f77;">
                   <li>
                       <a href="{{route('frontEnd.setLang',['lang'=>'En'])}}" onclick=$("#close-menu").click();>الانجليزية</a>
                   </li>
                   
               </ul>
           </nav>
    </div>
        @include('layouts.Ar.topHeader')
        <!--/.top-header -->
        <!-- MAIN HEADER -->
        @include('layouts.Ar.mainHeader')
        <!-- END MANIN HEADER -->

        {{-- @include('layouts.navMenu') --}}

    </div>
    <!-- end header -->