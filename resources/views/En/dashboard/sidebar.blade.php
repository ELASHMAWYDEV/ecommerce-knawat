<div id="sidebar-wrapper">
    <ul class="sidebar-nav">
        <li class="sidebar-brand">
            <img src="{{asset('profile_img/').'/'.Auth::user()->billingInfo->img}}" style="width:50px;height:50px;border-radius:50%;box-shadow: rgb(193, 179, 179) 0px 0px 8px 0px;" alt="">
        </li>
        <li>
            <a href="{{route('user.dashboard')}}">Dashboard</a>
        </li>
        
        <li>
        <a href="{{route('user.settings')}}">Settings</a>
        </li>
        <li>
        <li>
        <a href="{{route('user.tickets')}}">Tickets</a>
        </li>
        <li>
        <a href="{{route('user.addTicket')}}">Open Ticket</a>
        </li>
        <li>
        <a href="{{route('user.orders')}}">My Orders</a>
        </li>
    </ul>
</div>