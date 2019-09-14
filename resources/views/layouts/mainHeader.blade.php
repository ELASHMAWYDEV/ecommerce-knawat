<div class="main-menu-area" >
    <nav class="navbar navbar-expand-lg navbar-light  container p-0 pl-3">
         
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#mainmenuarea" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="mainmenuarea">
          <ul class="navbar-nav ">
           
            <li class="nav-item dropdown text-light d-none d-lg-inline-block">
              <a class="nav-link main-r-bg " href="#" id="allcategory" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                All Categories   
              </a>
              <categories></categories>
            </li>
            <li class="nav-item dropdown pt-6px">
              <a class="nav-link " href="#" id="homedropdownmanu" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Home
              </a>
              <div class="dropdown-menu dropd-h-p" aria-labelledby="homedropdownmanu">
                <a class="dropdown-item" href="{{route('frontEnd.home')}}">Home Page</a>
                <a class="dropdown-item" href="#">Another action</a>
                <a class="dropdown-item" href="#">Something else here</a>
              </div>
            </li>
            <li class="nav-item dropdown pt-6px">
              <a class="nav-link " href="#" id="productdropdownmenu" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
               Product
              </a>
              <div class="dropdown-menu dropd-h-p" aria-labelledby="productdropdownmenu">
                <a class="dropdown-item" href="{{route('frontEnd.products')}}">All Products</a>
                <a class="dropdown-item" href="#">Another action</a>
                <a class="dropdown-item" href="#">Something else here</a>
              </div>
            </li>
            <currency></currency>
           
          </ul>
           <currencylg></currencylg>
        </div>

    </nav>
    <nav class="navbar allcat-xs">
    <li class="nav-item dropdown text-light  d-lg-none  container">
        <a class="nav-link main-r-bg" href="#" id="allcategory" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fa fa-bars"></i> All Categories 
        </a>
        <div class="dropdown-menu" aria-labelledby="allcategory">
          <a class="dropdown-item" href="#">Action</a>
          <a class="dropdown-item" href="#">Another action</a>
          <a class="dropdown-item" href="#">Something else here</a>
        </div>
    </li>
      
    </nav>
    
</div>