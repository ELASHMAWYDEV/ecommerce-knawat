<div class="nav-bar-t main-b-bg">
    <nav class="navbar navbar-expand-lg navbar-dark  container">
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
                <a class="dropdown-item" href="{{route('frontEnd.user.favorites')}}"><i class="fa fa-heart-o main-r-color mr-2"></i> المفضلة <favoritesCount></favoritesCount></a>
                @guest
                 <a href="#" class="dropdown-item" data-target="#login-modal" data-toggle="modal"> <i class="fa fa-sign-in main-r-color mr-2"></i> تسجيل الدخول </a>
                 <a href="#" class="dropdown-item" data-target="#register-modal" data-toggle="modal"> <i class="fa fa-unlock-alt main-r-color mr-2"></i> تسجيل </a>
                @else
                <a class="dropdown-item" href="{{route('user.dashboard')}}"><i class="fa fa-tachometer main-r-color mr-2"></i>لوحة التحكم</a>
                <a class="dropdown-item" href="{{route('logout')}}"> <i class="fa fa-sign-out main-r-color mr-2"></i> تسجيل الخروج </a>
                @endguest
                <a class="dropdown-item" href="{{route('frontEnd.setLang',['lang'=>'En'])}}"> <i class="fa fa-language main-r-color mr-2"></i> الانجليزية </a>
              </div>
            </li>
            <li class="nav-item dropdown d-292-none">
              <a class="nav-link header-nav-link " href="{{route('frontEnd.user.cart')}}" id="loginWhishlistdropdown" role="button" >
                <cartitemscount></cartitemscount> 
                 السلة
              </a>
            
            </li>
          </ul>
          <ul class=" d-none d-292-flex list-unstyled justify-content-center">
              <li class="nav-item dropdown">
              <a class="nav-link text-weight header-nav-link" href="#" id="loginWhishlistdropdown2" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                حسابي
              </a>
              <div class="dropdown-menu" aria-labelledby="loginWhishlistdropdown">
                <a class="dropdown-item" href="{{route('frontEnd.user.favorites')}}"><i class="fa fa-heart-o main-r-color mr-2"></i> المفضلة <favoritesCount></favoritesCount></a>
                
                  @guest
                  <a href="#" class="dropdown-item" data-target="#login-modal" data-toggle="modal"> <i class="fa fa-sign-in main-r-color mr-2"></i> تسجيل الدخول </a>
                  <a href="#" class="dropdown-item" data-target="#register-modal" data-toggle="modal"> <i class="fa fa-unlock-alt main-r-color mr-2"></i> تسجيل </a>
                  @else
                  <a class="dropdown-item" href="{{route('user.dashboard')}}"><i class="fa fa-tachometer main-r-color mr-2"></i>لوحة التحكم</a>
                  <a class="dropdown-item" href="{{route('logout')}}"> <i class="fa fa-sign-out main-r-color mr-2"></i> تسجيل الخروج </a>
                  @endguest
                  <a class="dropdown-item" href="{{route('frontEnd.setLang',['lang'=>'En'])}}"> <i class="fa fa-language main-r-color mr-2"></i> الانجليزية </a>
                </a>
              </div>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link text-weight header-nav-link" href="{{route('frontEnd.user.cart')}}" id="loginWhishlistdropdown" role="button" >
                <cartitemscount></cartitemscount>
                 السلة
              </a>
          </ul>
        </div>
    </nav>
</div>