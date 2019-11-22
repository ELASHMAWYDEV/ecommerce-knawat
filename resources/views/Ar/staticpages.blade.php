@extends('Ar.app')
@section('title',$pageContent->slug)
@section('content')
   
<!-- page wapper-->
<div class="columns-container container p-3 ">
        <div class="container bg-white pt-3 pb-3" id="columns">
            <!-- breadcrumb -->
            <div class="breadcrumb clearfix">
                <a class="home" href="#" title="Return to Home">الرئيسية</a>
                <span class="navigation-pipe">&nbsp; 
                    <i class="fa fa-chevron-left mr-2" style="font-size: 0.7rem;"></i>
                </span>
                <span class="navigation_page">
                    @if($pageContent->slug == 'about_us')
                     من نحن
                    @else
                      @if($pageContent->slug == 'faq')
                       الاسئلة الشائعة
                      @else
                        الشروط والقوانين   
                      @endif
                    @endif
                </span>
            </div>
            
            <div class="page-content">
                {!!$pageContent->description_ar!!}
            </div>
        </div>
</div>
    <!-- ./page wapper-->
@endsection