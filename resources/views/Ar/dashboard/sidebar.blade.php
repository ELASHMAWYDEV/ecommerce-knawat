<div id="sidebar-wrapper">
    <ul class="sidebar-nav">
        <li class="sidebar-brand">
            <img src="{{asset('profile_img/').'/'.Auth::user()->billingInfo->img}}" style="width:50px;height:50px;border-radius:50%;box-shadow: rgb(193, 179, 179) 0px 0px 8px 0px;" alt="">
        </li>
        <li>
            <a href="{{route('user.dashboard')}}">الرئيسية</a>
        </li>
        
        <li>
        <a href="{{route('user.settings')}}">الإعدادات</a>
        </li>
        <li>
        <li>
        <a href="{{route('user.tickets')}}">التداكر</a>
        </li>
        <li>
        <a href="{{route('user.addTicket')}}">فتح تدكرة</a>
        </li>
    </ul>
</div>