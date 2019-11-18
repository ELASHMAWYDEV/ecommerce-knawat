    <!--footer -->
    <section id="footer" class="bg-white pt-3">
        <div class="container pt-4 pb-2" >
            <div class="row text-center text-xs-center text-sm-left text-md-left">
                <div class="col-xs-12 col-sm-4 col-md-4">
                    <h5>Quick links</h5>
                    <ul class="list-unstyled quick-links">
                        <li><a href="/"><i class="fa fa-angle-double-right ml-2"></i>Home</a></li>
                        <li><a href="{{route('frontEnd.about_us')}}"><i class="fa fa-angle-double-right ml-2"></i>About</a></li>
                        <li><a href="javascript:void();"><i class="fa fa-angle-double-right ml-2"></i>Services</a></li>
                        <li><a href="javascript:void();"><i class="fa fa-angle-double-right ml-2"></i>Offers</a></li>
                    </ul>
                </div>
                <div class="col-xs-12 col-sm-4 col-md-4">
                    <h5>Additional links</h5>
                    <ul class="list-unstyled quick-links">
                        <li><a href="{{route('frontEnd.about_us')}}"><i class="fa fa-angle-double-right ml-2"></i>About Us</a></li>
                        <li><a href="{{route('frontEnd.terms')}}"><i class="fa fa-angle-double-right ml-2"></i>Terms and Conditions  </a></li>
                        <li><a href="{{route('frontEnd.faq')}}"><i class="fa fa-angle-double-right ml-2"></i>FAQ</a></li>
                        {{-- <li><a href="{{route('frontEnd.terms')}}"><i class="fa fa-angle-double-right ml-2"></i>Contact Us</a></li> --}}

                    </ul>
                </div>
                <div class="col-xs-12 col-sm-4 col-md-4">
                    <h5>Contact links</h5>
                    <ul class="list-unstyled quick-links ">
                        <li><a href="javascript:void();"><i class="fa  fa-globe  mr-2 main-b-color"></i> {{$settings->address}}</a></li>
                        <li><a href="javascript:void();"><i class="fa fa-phone  mr-2 main-b-color"></i>  {{$settings->phone}}</a></li>
                        <li><a href="javascript:void();"><i class="fa fa-envelope   mr-2 main-b-color"></i> {{$settings->site_email}}</a></li>
                        
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
                    
                    <p class="h6">&copy All right Reversed.<a class="text-green ml-2"  href="/" style="color: #3d464d;
                        font-weight: bold;
                        text-decoration: none;" > {{$settings->site_name_e}}</a>
                    </p>
                </div>
                </hr>
        </div>
  </section>
 <!--footer -->