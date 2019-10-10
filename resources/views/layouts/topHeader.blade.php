<div class="nav-bar-t main-b-bg">
    <nav class="navbar navbar-expand-lg navbar-dark  container">
        <div class="navbar-brand  logo">
              <a  id="site-name" href="{{route('frontEnd.home')}}">
                <img src="{{asset('img/logo.png')}}"  alt="site logo">
              </a>
        </div>
       
        
        <div class="navbar-collapse p-0" id="navbarNavDropdown">
          <ul class="navbar-nav header-area">
           
            <searchproducts  userId="{{Auth::id()}}"></searchproducts>
            <i class="fa fa-search fa-2x text-light bg-dark  top-search-btn"></i>
            
            <li class="nav-item dropdown d-292-none ">
              <a class="nav-link  header-nav-link" href="#" id="loginWhishlistdropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                My Account <i class="fa fa-chevron-down"></i>
              </a>
              <div class="dropdown-menu" aria-labelledby="loginWhishlistdropdown">
                <a class="dropdown-item" href="{{route('frontEnd.user.favorites')}}"><i class="fa fa-heart-o main-r-color mr-2"></i> Favorites <favoritesCount></favoritesCount></a>
                @guest
                 <a href="#" class="dropdown-item" data-target="#login-modal" data-toggle="modal"> <i class="fa fa-sign-in main-r-color mr-2"></i> Login </a>
                 <a href="#" class="dropdown-item" data-target="#register-modal" data-toggle="modal"> <i class="fa fa-unlock-alt main-r-color mr-2"></i> Register </a>
                @else
                <a class="dropdown-item" href="{{route('logout')}}"> <i class="fa fa-sign-out main-r-color mr-2"></i> Logout </a>
                @endguest
              </div>
            </li>
            <li class="nav-item dropdown d-292-none">
              <a class="nav-link header-nav-link " href="{{route('frontEnd.user.cart')}}" id="loginWhishlistdropdown" role="button" >
                <i class="fa fa-shopping-cart fa-lg ">
                    <i class="badge-info main-r-bg rounded-badge" style="font-size: 15px;position: relative;top: -10px;">5</i>
                </i> 
                 Cart
              </a>
            
            </li>
          </ul>
          <ul class=" d-none d-292-flex list-unstyled justify-content-center">
              <li class="nav-item dropdown">
              <a class="nav-link text-weight header-nav-link" href="#" id="loginWhishlistdropdown2" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                My Account
              </a>
              <div class="dropdown-menu" aria-labelledby="loginWhishlistdropdown">
                <a class="dropdown-item" href="{{route('frontEnd.user.favorites')}}"><i class="fa fa-heart-o main-r-color mr-2"></i> Favorites <i class="badge-info rounded-badge main-b-bg">5</i></a>
                
                  @guest
                  <a href="#" class="dropdown-item" data-target="#login-modal" data-toggle="modal"> <i class="fa fa-sign-in main-r-color mr-2"></i> Login </a>
                  <a href="#" class="dropdown-item" data-target="#register-modal" data-toggle="modal"> <i class="fa fa-unlock-alt main-r-color mr-2"></i> Register </a>
                  @else
                  <a class="dropdown-item" href="{{route('logout')}}"> <i class="fa fa-sign-out main-r-color mr-2"></i> Logout </a>
                  @endguest
                </a>
              </div>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link text-weight header-nav-link" href="{{route('frontEnd.user.cart')}}" id="loginWhishlistdropdown" role="button" >
                <i class="fa fa-shopping-cart fa-lg ">
                    <i class="badge-info main-r-bg rounded-badge" style="font-size: 15px;position: relative;top: -10px;">5</i>
                </i> 
                 Cart
              </a>
          </ul>
        </div>
    </nav>
</div>