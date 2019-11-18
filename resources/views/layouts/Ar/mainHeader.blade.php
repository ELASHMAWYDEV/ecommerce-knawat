<div class="main-menu-area" >
  <lang lang="Ar"></lang>
    <nav class="navbar navbar-expand-lg navbar-light  container p-0 pl-3">
         
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#mainmenuarea" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <currency></currency>
        <div class="collapse navbar-collapse" id="mainmenuarea">
          <ul class="navbar-nav ">
           
            
            <categories lang="Ar"></categories>
            <li class="nav-item dropdown pt-6px">
              <a class="nav-link " href="#" id="homedropdownmanu" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                الرئيسية
              </a>
              <div class="dropdown-menu dropd-h-p" aria-labelledby="homedropdownmanu">
                <a class="dropdown-item" href="{{route('frontEnd.home')}}"> الصفحة الرئيسية</a>
                <a class="dropdown-item" href="#"> رابط</a>
                <a class="dropdown-item" href="#">رابط اضافي</a>
              </div>
            </li>
            <li class="nav-item dropdown pt-6px">
              <a class="nav-link " href="#" id="productdropdownmenu" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
               المنتجات
              </a>
              <div class="dropdown-menu dropd-h-p" aria-labelledby="productdropdownmenu">
                <a class="dropdown-item" href="{{route('frontEnd.products')}}">جميع المنتجات</a>
                <a class="dropdown-item" href="#">رابط اضافي</a>
              </div>
            </li>
            <li class="nav-item dropdown pt-6px">
              <a class="nav-link " href="{{route('frontEnd.setLang',['lang'=>'En'])}}" >
               الانجليزية
              </a>
              <div class="dropdown-menu dropd-h-p" aria-labelledby="productdropdownmenu">
                <a class="dropdown-item" href="{{route('frontEnd.products')}}">جميع المنتجات</a>
                <a class="dropdown-item" href="#">رابط اضافي</a>
                <a class="dropdown-item" href="#">رابط اضافي</a>
              </div>
            </li>
            
           
          </ul>
           <currencylg lang="Ar"></currencylg>
        </div>

    </nav>
   
    <categoriessm></categoriessm>
      
    
</div>