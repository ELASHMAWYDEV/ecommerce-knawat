    <!--footer -->
    <section id="footer" class="bg-white">
            <div class="contacts-list-info row  main-b-bg text-center text-white m-0">
                    <div class="col-md-4">
                            <div class="d-inline-flex p-4 text-left">
                                    <i  class="fa fa-map-marker fa-3x mr-3"> </i>
                                        <div class="media-body" >
                                            <h6 class="mt-0 p-name">
                                             {{$settings->address}}
                                            </h6> 
                                            <p>مكان العمل! </p>
                                        </div>
                            </div>
                    </div>
                    <div class="col-md-4">
                            <div class="d-inline-flex p-4 text-left">
                                    <i  class="fa fa-phone fa-3x mr-3"> </i>
                                        <div class="media-body" >
                                            <h6 class="mt-0 p-name">
                                             {{$settings->phone}}
                                            </h6> 
                                            <p>خط الدعم! </p>
                                        </div>
                            </div>
                    </div>
                    <div class="col-md-4">
                            <div class="d-inline-flex p-4 text-left">
                                    <i class="fa  fa-envelope fa-3x mr-3" > </i>
                                        <div class="media-body" >
                                            <h6 class="mt-0 p-name">
                                             {{$settings->site_email}}
                                            </h6>  
                                             البريد الرئيسي!
                                        </div>
                            </div>
                    </div>
            </div>
        <div class="container pt-4 pb-2" >
            <div class="row text-left text-sm-left text-md-left" id="mainfooter">
                    <div class="col-xs-12 col-sm-6 col-md-3">
                            <h5>معلومات الاتصال</h5>
                            <p>
                                نحن في خدمتكم وتحت احتياجاتكم ادا كان لديك استفسار تفضل بمراسلنا
                            </p>

                            <ul class="list-unstyled quick-links contact_uslinks">
                                <li class="adress"> 
                                    <i class="fa  fa-globe  mr-2 main-b-color"></i> 
                                    <p>{{$settings->address}}</p> 
                                </li>
                                <li class="adress"> 
                                    <i class="fa fa-phone  mr-2 main-b-color"></i> 
                                    <p>{{$settings->phone}}</p> 
                                </li>
                                <li class="adress"> 
                                    <i class="fa fa-envelope   mr-2 main-b-color"></i> 
                                    <p>{{$settings->site_email}}</p> 
                                </li>

                                
                            </ul>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-3">
                    <h5>روابط سريعة</h5>
                    <ul class="list-unstyled quick-links">
                        <li><a href="/">الرئيسية</a></li>
                        <li><a href="{{route('frontEnd.about_us')}}">من نحن</a></li>
                        <li><a href="javascript:void();">الخدمات</a></li>
                        <li><a href="javascript:void();">العروض</a></li>
                    </ul>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-3">
                    <h5>روابط إضافيه</h5>
                    <ul class="list-unstyled quick-links">
                        <li><a href="{{route('frontEnd.about_us')}}">من نحن</a></li>
                        <li><a href="{{route('frontEnd.terms')}}">الشروط والقوانين</a></li>
                        <li><a href="{{route('frontEnd.faq')}}">الاسئلة الشائعة</a></li>
                        {{-- <li><a href="{{route('frontEnd.terms')}}"><i class="fa fa-angle-double-left mr-2"></i>Contact Us</a></li> --}}

                    </ul>
                </div>
                <mailinglist></mailinglist>
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
                    
                    <p class="h6">&copy جميع الحقوق محفوظة.<a class="text-green ml-2"  href="javascript:void()" style="color: rgb(243, 245, 247);
                        font-weight: bold;
                        text-decoration: none;" >{{$settings->site_name}}</a>
                    </p>
                </div>
                </hr>
        </div>
  </section>
 <!--footer -->