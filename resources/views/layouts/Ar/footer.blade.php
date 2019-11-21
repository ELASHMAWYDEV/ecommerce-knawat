    <!--footer -->
    <section id="footer" class="bg-white pt-3">
        <div class="container pt-4 pb-2" >
            <div class="row text-center text-xs-center text-sm-left text-md-left">
                <div class="col-xs-12 col-sm-4 col-md-4">
                    <h5>روابط إضافية</h5>
                    <ul class="list-unstyled quick-links">
                        <li><a href="/"><i class="fa fa-angle-double-left mr-2"></i>الرئيسية</a></li>
                        <li><a href="{{route('frontEnd.about_us')}}"><i class="fa fa-angle-double-left mr-2"></i>من نخن</a></li>
                        <li><a href="javascript:void();"><i class="fa fa-angle-double-left mr-2"></i>الخدمات</a></li>
                        <li><a href="javascript:void();"><i class="fa fa-angle-double-left mr-2"></i>العروض</a></li>
                    </ul>
                </div>
                <div class="col-xs-12 col-sm-4 col-md-4">
                    <h5>روابط إضافيه</h5>
                    <ul class="list-unstyled quick-links">
                        <li><a href="{{route('frontEnd.about_us')}}"><i class="fa fa-angle-double-left mr-2"></i>من نحن</a></li>
                        <li><a href="{{route('frontEnd.terms')}}"><i class="fa fa-angle-double-left mr-2"></i>الشروط والقوانين</a></li>
                        <li><a href="{{route('frontEnd.faq')}}"><i class="fa fa-angle-double-left mr-2"></i>الاسئلة الشائعة</a></li>
                        {{-- <li><a href="{{route('frontEnd.terms')}}"><i class="fa fa-angle-double-left mr-2"></i>Contact Us</a></li> --}}

                    </ul>
                </div>
                <div class="col-xs-12 col-sm-4 col-md-4">
                    <h5>روابط الاتصال</h5>
                    <ul class="list-unstyled quick-links ">
                        <li><a href="javascript:void();"><i class="fa  fa-globe  mr-2 main-b-color"></i>{{$settings->address}}</a></li>
                        <li><a href="javascript:void();"><i class="fa fa-phone  mr-2 main-b-color"></i> {{$settings->phone}}</a></li>
                        <li><a href="javascript:void();"><i class="fa fa-envelope   mr-2 main-b-color"></i>{{$settings->site_email}}</a></li>
                        
                    </ul>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 mt-2 mt-sm-5">
                    <ul class="list-unstyled list-inline social text-center ">
                        <li class="list-inline-item"><a href="{{$settings->facebook_link}}" target="_blank"><i class="fa fa-facebook fa-lg"></i></a></li>
                        <li class="list-inline-item"><a href="{{$settings->twitter_link}}" target="_blank"><i class="fa fa-twitter fa-lg"></i></a></li>
                        <li class="list-inline-item"><a href="{{$settings->youtube_link}}" target="_blank"><i class="fa fa-youtube fa-lg"></i></a></li>
                        <li class="list-inline-item"><a href="{{$settings->linkedin_link}}" target="_blank"><i class="fa fa-linkedin fa-lg"></i></a></li>
                        <li class="list-inline-item"><a href="{{$settings->instagram_link}}" target="_blank"><i class="fa fa-instagram fa-lg"></i></a></li>
                    </ul>
                </div>
                </hr>
            </div>	
                
        </div>
        <div class="text-center">
                <div class="text-white main-b-bg p-3">
                    
                    <p class="h6">&copy جميع الحقوق محفوظة.<a class="text-green ml-2"  href="/" style="color: #3d464d;
                        font-weight: bold;
                        text-decoration: none;" >{{$settings->site_name}}</a>
                    </p>
                </div>
                </hr>
        </div>
  </section>
 <!--footer -->