<div id="new-header" class="new-main-bg">
<div class="container">
  <nav class="p-2 d-flex">
       
    @if(!Auth::check())
    <Button class="btn loginbtn  "  data-target="#register-modal" data-toggle="modal"><i class="fa fa-user mr-1"></i>إنشاء حساب </Button>
    <Button class="btn loginbtn"  data-target="#login-modal" data-toggle="modal"><i class="fa fa-user mr-1"></i> تسجيل دخول </Button>
    @else
    <a class="btn loginbtn" href="{{route('logout')}}" style="    width: 100px;"  ><i class="fa fa-sign-out mr-1"></i> تسجيل الخروج </a>
    @endif

  </nav>
  <ul  class="navbar-nav d-flex  lang-currency">
  <li class="dropdown ">
        <a class="text-weight " href="#"  role="button" onclick="togglelangdropdown()">
          <i class="fa fa-flag mr-1"></i> العربية  <i class="fa fa-caret-down"></i>
        </a>
        <div class="dropdown-menu lang-dropdown" aria-labelledby="loginWhishlistdropdown">
            <a class="dropdown-item " 
            href="{{route('frontEnd.setLang',['lang'=>'En'])}}"> <i class="fa fa-language main-r-color mr-2"></i>الانجليزية </a>
          </a>
        </div>
    </li>
    |
    <li class="dropdown  ">
        <a class="nav-link " href="#" role="button" onclick="togglecurrencydropdown()" >
          العملة : USD <i class="fa  fa-caret-down"></i>
        </a>
        <div class="currency-dropdownmenu "  >
          <a class="dropdown-item btn" >USD</a>
          <a class="dropdown-item btn" >TRY</a>
          <a class="dropdown-item btn" >EUR</a>
          <a class="dropdown-item btn" >GBP</a>
        </div>
    </li>
    
  </ul>
</div>
</div>
<div class="nav-bar-t ">
    <nav class="navbar navbar-expand-lg navbar-dark  container pt-2 ">
        <div class="navbar-brand  logo">
              <a  id="site-name" href="{{route('frontEnd.home')}}">
                <img src="{{asset('img/logo.png')}}"  alt="site logo">
              </a>
        </div>
       
        
        <div class="navbar-collapse p-0" id="navbarNavDropdown">
          <ul class="navbar-nav header-area">
           
            <searchproducts  userId="{{Auth::id()}}" lang="Ar"></searchproducts>
            <i class="fa fa-search fa-2x text-light bg-dark  top-search-btn"></i>
            
            <li class="nav-item dropdown d-292-none ">
              <a class="nav-link  header-nav-link" href="#" id="loginWhishlistdropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="fa fa-chevron-down mr-2"></i>  حسابي 
              </a>
              <div class="dropdown-menu" aria-labelledby="loginWhishlistdropdown">
                <a class="dropdown-item" href="{{route('frontEnd.user.favorites')}}"><i class="fa fa-heart-o main-b-color mr-2"></i> المفضلة <favoritesCount></favoritesCount></a>
                @guest
                 <a href="#" class="dropdown-item" data-target="#login-modal" data-toggle="modal"> <i class="fa fa-sign-in main-b-color mr-2"></i> تسجيل الدخول </a>
                 <a href="#" class="dropdown-item" data-target="#register-modal" data-toggle="modal"> <i class="fa fa-unlock-alt main-b-color mr-2"></i> تسجيل </a>
                @else
                <a class="dropdown-item" href="{{route('user.dashboard')}}"><i class="fa fa-tachometer main-b-color mr-2"></i>لوحة التحكم</a>
                <a class="dropdown-item" href="{{route('logout')}}"> <i class="fa fa-sign-out main-b-color mr-2"></i> تسجيل الخروج </a>
                @endguest
                <a class="dropdown-item" href="{{route('frontEnd.setLang',['lang'=>'En'])}}"> <i class="fa fa-language main-b-color mr-2"></i> الانجليزية </a>
              </div>
            </li>
            <li class="nav-item dropdown d-292-none">
              <a class="nav-link header-nav-link " href="{{route('frontEnd.user.cart')}}" id="loginWhishlistdropdown" role="button" >
                <cartitemscount></cartitemscount> 
                 السلة
              </a>
            
            </li>
          </ul>
          <ul class=" d-none d-292-flex list-unstyled justify-content-center mb-0" style="    margin-top: -22px;">
              {{-- <li class="nav-item dropdown">
              <a class="nav-link text-weight header-nav-link" href="#" id="loginWhishlistdropdown2" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                حسابي
              </a>
              <div class="dropdown-menu" aria-labelledby="loginWhishlistdropdown">
                <a class="dropdown-item" href="{{route('frontEnd.user.favorites')}}"><i class="fa fa-heart-o main-b-color mr-2"></i> المفضلة <favoritesCount></favoritesCount></a>
                
                  @guest
                  <a href="#" class="dropdown-item" data-target="#login-modal" data-toggle="modal"> <i class="fa fa-sign-in main-b-color mr-2"></i> تسجيل الدخول </a>
                  <a href="#" class="dropdown-item" data-target="#register-modal" data-toggle="modal"> <i class="fa fa-unlock-alt main-b-color mr-2"></i> تسجيل </a>
                  @else
                  <a class="dropdown-item" href="{{route('user.dashboard')}}"><i class="fa fa-tachometer main-b-color mr-2"></i>لوحة التحكم</a>
                  <a class="dropdown-item" href="{{route('logout')}}"> <i class="fa fa-sign-out main-b-color mr-2"></i> تسجيل الخروج </a>
                  @endguest
                  <a class="dropdown-item" href="{{route('frontEnd.setLang',['lang'=>'En'])}}"> <i class="fa fa-language main-b-color mr-2"></i> الانجليزية </a>
                </a>
              </div>
            </li> --}}
            <li class="nav-item dropdown" id="sidemenubar"><a class="nav-link " href="javascript:void()">
              <i class="fa fa-bars main-b-color fa-lg"></i></a>
            </li>
            <li class="nav-item dropdown"><a href="{{route('user.dashboard')}}"  class="nav-link">
              <i class="fa fa-user main-b-color fa-lg"></i></a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link text-weight " href="{{route('frontEnd.user.favorites')}}" id="loginWhishlistdropdown" role="button" >
                <favoritesCount></favoritesCount>
              </a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link text-weight" href="{{route('frontEnd.user.cart')}}" id="loginWhishlistdropdown" role="button" >
                <cartitemscount></cartitemscount>
              </a>
            </li>
            <li class="nav-item dropdown">
              <currency></currency>
            </li>
          </ul>
        </div>
    </nav>
</div>