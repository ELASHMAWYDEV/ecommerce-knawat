<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link text-center">
      <img src="{{asset('img/').'/'.$settings->logo}}" alt="AdminLTE Logo" class=" img-circle elevation-3"
           style="opacity: .8;    max-height: 50px;">
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <div>
        <!-- Sidebar user panel (optional) -->
       {{--  <div class="user-panel mt-3 pb-3 mb-3 d-flex">
          <div class="image">
            <img src="https://secure.gravatar.com/avatar/5ffa2a1ffeb767c60ab7e1052e385d5c?s=52&d=mm&r=g" class="img-circle elevation-2" alt="User Image">
          </div>
          <div class="info">
            <a href="#" class="d-block">محمدرضا عطوان</a>
          </div>
        </div> --}}

        <!-- Sidebar Menu -->
        <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar ayat-nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                  <!-- Add icons to the links using the .nav-icon class
                       with font-awesome or any other icon font library -->
                  <li class="nav-item">
                        <a href="{{route('admin.index')}}" class="nav-link ayat-nl @if(Request::segment(2) =='') active @endif">
                            <i class="nav-icon fa fa-home"></i>
                          <p>الرئيسية</p>
                        </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{route('admin.settings')}}" class="nav-link ayat-nl @if(Request::segment(2) =='settings') active @endif">
                        <i class="nav-icon fa fa-dashboard"></i>
                      <p>إعدادات الموقع</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{route('admin.slider')}}" class="nav-link ayat-nl @if(Request::segment(2) =='settings') active @endif">
                        <i class="nav-icon fa fa-image"></i>
                      <p>إعدادات السلايدر</p>
                    </a>
                  </li>
                  <li class="nav-item">
                      <a href="{{route('admin.products')}}" class="nav-link ayat-nl @if(Request::segment(2) =='products') active @endif">
                        <i class="nav-icon fa fa-cubes"></i>
                        <p>المنتجات </p>
                      </a>
                  </li>
                  <li class="nav-item">
                      <a href="{{route('admin.users')}}" class="nav-link ayat-nl @if(Request::segment(2) =='users') active @endif">
                        <i class="nav-icon fa fa-users"></i>
                        <p>إدارة العملاء</p>
                      </a>
                  </li>
                  <li class="nav-item">
                      <a href="{{route('admin.tickets')}}" class="nav-link ayat-nl @if(Request::segment(2) =='tickets') active @endif">
                        <i class="nav-icon fa fa-ticket"></i>
                        <p>التذاكر</p>
                      </a>
                  </li>
                  <li class="nav-item">
                      <a href="{{route('admin.orders')}}" class="nav-link ayat-nl @if(Request::segment(2) =='orders') active @endif">
                        <i class="nav-icon fa fa-shopping-bag"></i>
                        <p>الطلبات</p>
                      </a>
                  </li>
                 
                  <li class="nav-item has-treeview ">
                    <a href="{{route('admin.pages',['slug'=>'about_us'])}}" class="nav-link ayat-nl @if(Request::segment(2) =='Pages') active @endif">
                        <i class="nav-icon fa fa-desktop" aria-hidden="true"></i>
                      <p>إدارة الصفحات <i class="right fa fa-angle-left"></i></p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                          <a  href="{{route('admin.pages',['slug'=>'about_us'])}}" class="nav-link pr-3 @if(Request::segment(3) =='all') active @endif">
                            <i class="fa fa-check-circle fa-1x nav-icon" style="   position: relative;top:4px"></i>
                            <p>من نحن</p> 
                          </a>
                        </li>
                        <li class="nav-item">
                          <a  href="{{route('admin.pages',['slug'=>'faq'])}}" class="nav-link pr-3 @if(Request::segment(3) =='all') active @endif">
                            <i class="fa fa-check-circle fa-1x nav-icon" style="   position: relative;top:4px"></i>
                            <p>سياسة الاستخدام</p> 
                          </a>
                        </li>
                        <li class="nav-item">
                          <a  href="{{route('admin.pages',['slug'=>'terms'])}}" class="nav-link pr-3 @if(Request::segment(3) =='all') active @endif">
                            <i class="fa fa-check-circle  fa-1x nav-icon" style="    position: relative;top:4px"></i>
                            <p>الشروط والقوانين</p> 
                          </a>
                        </li>
                       {{--  <li class="nav-item">
                          <a href="" class="nav-link pr-3 @if(Request::segment(3) =='addPage') active @endif">
                            <i class="fa fa-plus fa-1x nav-icon"></i>
                            <p>إنشاء صفحة</p>
                          </a>
                        </li> --}}
                        
                    </ul>
                  </li>
                  <li class="nav-item">
                      <a href="{{route('admin.newsletter')}}" class="nav-link ayat-nl @if(Request::segment(2) =='newsletter') active @endif">
                        <i class="nav-icon fa fa-envelope-o"></i>
                        <p>القائمة البريدية</p>
                      </a>
                  </li>
                  
                </ul>
              </nav>
        <!-- /.sidebar-menu -->
      </div>
    </div>
    <!-- /.sidebar -->
  </aside>

