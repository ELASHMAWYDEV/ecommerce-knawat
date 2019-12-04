    <!--footer -->

    <section id="footer" class="bg-white ">
        <div class="contacts-list-info row  main-b-bg text-center text-white m-0">
            <div class="col-md-4">
                    <div class="d-inline-flex p-4 text-left">
                            <i  class="fa fa-map-marker fa-3x mr-3"> </i>
                                <div class="media-body" >
                                    <h6 class="mt-0 p-name">
                                     {{$settings->address}}
                                    </h6> 
                                    <p>Working address! </p>
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
                                    <p>Support Line! </p>
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
                                    orders support!
                                </div>
                    </div>
            </div>
        </div>
        <div class="container pt-4 pb-2" >
            <div class="row text-left  text-sm-left text-md-left" id="mainfooter">
                <div class="col-xs-12 col-sm-6 col-md-3">
                            <h5>Contact Info</h5>
                            <p>
                                we have a great service linked to knawat.com commerce service
                                if you have any question plese contact us
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
                    <h5>Quick links</h5>
                    <ul class="list-unstyled quick-links">
                        <li><a href="/">Home</a></li>
                        <li><a href="{{route('frontEnd.about_us')}}">About</a></li>
                        <li><a href="javascript:void();">Services</a></li>
                        <li><a href="javascript:void();">Offers</a></li>
                    </ul>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-3">
                    <h5>Additional links</h5>
                    <ul class="list-unstyled quick-links">
                        <li><a href="{{route('frontEnd.about_us')}}">About Us</a></li>
                        <li><a href="{{route('frontEnd.terms')}}">Terms and Conditions  </a></li>
                        <li><a href="{{route('frontEnd.faq')}}">FAQ</a></li>
                        {{-- <li><a href="{{route('frontEnd.terms')}}"><i class="fa fa-angle-double-right ml-2"></i>Contact Us</a></li> --}}

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
                    
                    <p class="h6">&copy All right Reversed.<a class="text-green ml-2"  href="javascript:void()" style="color: rgb(243, 245, 247);
                        font-weight: bold;
                        text-decoration: none;" > {{$settings->site_name_e}}</a>
                    </p>
                </div>
                </hr>
        </div>
  </section>
 <!--footer -->