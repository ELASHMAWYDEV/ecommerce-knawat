@extends('En.app')
@section('title','dashboard')
@section('css')
<style>
body{
    background:#f4f3ef;    
}

#wrapper {
    padding-left: 0;
    -webkit-transition: all 0.5s ease;
    -moz-transition: all 0.5s ease;
    -o-transition: all 0.5s ease;
    transition: all 0.5s ease;
}

#wrapper.toggled {
    padding-left: 220px;
}

#sidebar-wrapper-dashboard {
    z-index: 1000;
    position: fixed;
    left: 220px;
    width: 0;
    height: 100%;
    margin-left: -220px;
    overflow-y: auto;
    background:#fff;
    -webkit-transition: all 0.5s ease;
    -moz-transition: all 0.5s ease;
    -o-transition: all 0.5s ease;
    transition: all 0.5s ease;
}

#sidebar-wrapper-dashboard {
    box-shadow: inset -1px 0px 0px 0px #DDDDDD;
}

#wrapper.toggled #sidebar-wrapper-dashboard {
    width: 220px;
}

#page-content-wrapper {
    width: 100%;
    position: absolute;
    padding: 15px;
}

#wrapper.toggled #page-content-wrapper {
    position: absolute;
    margin-right: -220px;
}

/* Sidebar Styles */

.sidebar-nav {
    position: absolute;
    top: 0;
    width: 220px;
    margin: 0;
    padding: 0;
    list-style: none;
}

.sidebar-nav li {
    text-indent: 30px;
    line-height: 40px;box-shadow: 0 1px 2px #cac8c8;
}
.sidebar-nav li a:hover {
    text-decoration: none;
    color: #221e1e;
}
.sidebar-nav li a {
    display: block;
    text-decoration: none;
    color: #6f6b6b;
    font-weight: 500;
}

.sidebar-nav li a:hover {
    text-decoration: none;
}

.sidebar-nav li a:active,
.sidebar-nav li a:focus {
    text-decoration: none;
}

.sidebar-nav > .sidebar-brand {
text-align: center;    font-size: 18px;
    line-height: 60px;text-indent: 0;    height: auto;
}

.sidebar-nav > .sidebar-brand a {
    color: #999999;
}

.sidebar-nav > .sidebar-brand a:hover {
    color: #fff;
    background: none;
}

@media(min-width:768px) {
    #wrapper {
        padding-left: 220px;
        min-height: 24rem;
    }

    #wrapper.toggled {
        padding-left: 0;
    }

    #sidebar-wrapper-dashboard {
        width: 220px;
        position: absolute;
    }

    #wrapper.toggled #sidebar-wrapper-dashboard {
        width: 0;
    }

    #page-content-wrapper {
        padding: 20px;
        position: relative;
    }

    #wrapper.toggled #page-content-wrapper {
        position: relative;
        margin-right: 0;
    }
}

#sidebar-wrapper-dashboard li.active > a:after {
    border-right: 17px solid #f4f3ef;
    border-top: 17px solid transparent;
    border-bottom: 17px solid transparent;
    content: "";
    display: inline-block;
    position: absolute;
    right: -1px;
}

.sidebar-brand {
    border-bottom: 1px solid rgba(102, 97, 91, 0.3);
}

.sidebar-brand {
    padding: 10px 0px;text-align: center
   /*  margin: 0 20px; */
}

.navbar .navbar-nav > li > a p {
    display: inline-block;
    margin: 0;
}
p {
    font-size: 16px;
    line-height: 1.4em;
}

.navbar-default {
    background-color: #f4f3ef;
    border:0px;
    border-bottom: 1px solid #DDDDDD;
}

.btn-menu {
    border-radius: 3px;
    padding: 4px 12px;
    margin: 14px 5px 5px 20px;
    font-size: 14px;
    float: left;
}
#footer{display: none}
.main-menu-area{display: none}
</style>
@endsection
@yield('excss')
@section('content')
<div class="content">

<div id="wrapper" class="wrapper-content">
    @include('En.dashboard.sidebar')
        <nav class="navbar navbar-default bg-white">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button class=" btn btn-success btn-toggle-menu" type="button">
                        <i class="fa fa-bars"></i>
                    </button>
                </div>
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-right">
                        <li>
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="ti-panel"></i>
        						<p>Stats</p>
                            </a>
                        </li>
        				<li>
                            <a href="#">
        						<i class="ti-settings"></i>
        						<p>Settings</p>
                            </a>
                        </li>
                    </ul>
        
                </div>
            </div>
        </nav>
    <div id="page-content-wrapper">
       
        <div class="container-fluid bg-white p-3" style="box-shadow: 1px 0px 8px 0px #798ca3;">
            @yield('dashboardcontent')
        </div>
    </div>
</div>
    
</div>
 @endsection
 @section('js')
<script>
$(function(){
    $(".btn-toggle-menu").click(function() {
        $("#wrapper").toggleClass("toggled");
    });
}) 
</script>  
 @endsection