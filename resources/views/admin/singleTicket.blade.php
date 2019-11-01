
@extends('admin.layouts.app')
@section('title','التذاكر')
@section('style')
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="{{asset('adminlte-rtl/plugins/datatables/dataTables.bootstrap4.css')}}">
  <style>
    label.error{
        color: red;
        font-weight: 500;
        margin-bottom: 0;
    }
  </style>
@endsection
@section('content')
<div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            {{--<div class="col-sm-6">
              <h1 class="m-0 text-dark">الرئيسية</h1>
            </div><!-- /.col -->
             <div class="col-sm-6">
              <ol class="breadcrumb float-sm-left">
                <li class="breadcrumb-item"><a href="#">خانه</a></li>
                <li class="breadcrumb-item active">الرئيسية</li>
              </ol>
            </div ><!-- /.col -->
          </div><!-- /.row -->--}}
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->
  
      <!-- Main content -->
      <div class="content">
        <div class="container-fluid "> 
            <div class="flash-message">
                @foreach (['danger', 'warning', 'success', 'info'] as $msg)
                @if(Session::has('alert-' . $msg))

                <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
                @endif
                @endforeach
            </div> 
            @if($errors)
              @foreach($errors->all() as $err)
              <div class="alert alert-success alert-dismissible fade show  mr-auto ml-auto mb-3" role="alert">
                  {{$err}}   
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
              </div>
              @endforeach
            @endif
            
        </div>
        
        <div class="card">
            <div class="card-header bg-primary">
              <h4 class="card-title ">مشاهدة التدكرة : #{{$ticket->id}}</h4>
            </div>
            <div class="card p-4 mt-3 pr-5">
              <h3 class="ticket-title">{{$ticket->title}} </h3>           
              
              <p class="text-muted" style="    font-size: 0.8rem;">انشئت في  @php echo date('m-d-Y',strtotime($ticket->created_at)) @endphp</p>
              <hr class="m-0  mb-3">
              <div class="card-body" style="background: #f4f6f9;">
                  <p class="text-justify text-dark">{{$ticket->content}}</p>
              </div>
              <div class="card-tools">
                    <div class="input-group input-group-sm" style="width: 150px;">
                      <button class="btn btn-flat btn-success mt-2 ">إضافة رد</button>
                    </div>
                  </div>
            </div>
            
            <!-- /.card-header -->
            <div class="card-body">
                            <!-- Conversations are loaded here -->
                            <div class="direct-chat-messages">
                              <!-- Message. Default to the left -->
                              <div class="direct-chat-msg">
                                <div class="direct-chat-info clearfix">
                                  <span class="direct-chat-name float-left">محمدرضا عطوان</span>
                                  <span class="direct-chat-timestamp float-right">۲۳ Jan ۲:۰۰ pm</span>
                                </div>
                                <!-- /.direct-chat-info -->
                                <img class="direct-chat-img" src="/img/notfound.png" alt="message user image">
                                <!-- /.direct-chat-img -->
                                <div class="direct-chat-text">
                                  واقعا این قالب رایگانه ؟ قابل باور نیست
                                </div>
                                <!-- /.direct-chat-text -->
                              </div>
                              <!-- /.direct-chat-msg -->
            
                              <!-- Message to the right -->
                              <div class="direct-chat-msg right">
                                <div class="direct-chat-info clearfix">
                                  <span class="direct-chat-name float-right">سارا</span>
                                  <span class="direct-chat-timestamp float-left">۲۳ Jan ۲:۰۵ pm</span>
                                </div>
                                <!-- /.direct-chat-info -->
                                <img class="direct-chat-img" src="dist/img/user3-128x128.jpg" alt="message user image">
                                <!-- /.direct-chat-img -->
                                <div class="direct-chat-text">
                                  بهتره اینو باور کنی :)
                                </div>
                                <!-- /.direct-chat-text -->
                              </div>
                              <!-- /.direct-chat-msg -->
            
                              <!-- Message. Default to the left -->
                              <div class="direct-chat-msg">
                                <div class="direct-chat-info clearfix">
                                  <span class="direct-chat-name float-left">محمدرضا عطوان</span>
                                  <span class="direct-chat-timestamp float-right">۲۳ Jan ۵:۳۷ pm</span>
                                </div>
                                <!-- /.direct-chat-info -->
                                <img class="direct-chat-img" src="dist/img/user1-128x128.jpg" alt="message user image">
                                <!-- /.direct-chat-img -->
                                <div class="direct-chat-text">
                                  میخوام با این قالب یه اپلیکیشن باحال بزنم ؟‌ تو هم همکاری میکنی ؟
                                </div>
                                <!-- /.direct-chat-text -->
                              </div>
                              <!-- /.direct-chat-msg -->
            
                              <!-- Message to the right -->
                              <div class="direct-chat-msg right">
                                <div class="direct-chat-info clearfix">
                                  <span class="direct-chat-name float-right">سارا</span>
                                  <span class="direct-chat-timestamp float-left">۲۳ Jan ۶:۱۰ pm</span>
                                </div>
                                <!-- /.direct-chat-info -->
                                <img class="direct-chat-img" src="dist/img/user3-128x128.jpg" alt="message user image">
                                <!-- /.direct-chat-img -->
                                <div class="direct-chat-text">
                                  اره حتما
                                </div>
                                <!-- /.direct-chat-text -->
                              </div>
                              <!-- /.direct-chat-msg -->
            
                            </div>
                            <!--/.direct-chat-messages-->
            
                            <!-- Contacts are loaded here -->
                            <div class="direct-chat-contacts">
                              <ul class="contacts-list">
                                <li>
                                  <a href="#">
                                    <img class="contacts-list-img" src="dist/img/user1-128x128.jpg">
            
                                    <div class="contacts-list-info">
                                      <span class="contacts-list-name">
                                        محمدرضا عطوان
                                        <small class="contacts-list-date float-left">۱۳۹۷/۱۰/۰۱</small>
                                      </span>
                                      <span class="contacts-list-msg">تا حالا کجا بودی ؟‌من...</span>
                                    </div>
                                    <!-- /.contacts-list-info -->
                                  </a>
                                </li>
                                <!-- End Contact Item -->
                                <li>
                                  <a href="#">
                                    <img class="contacts-list-img" src="dist/img/user7-128x128.jpg">
            
                                    <div class="contacts-list-info">
                                      <span class="contacts-list-name">
                                        سارا فرهانی
                                        <small class="contacts-list-date float-left">۲/۲۳/۲۰۱۵</small>
                                      </span>
                                      <span class="contacts-list-msg">تا حالا منتظر تو بودم...</span>
                                    </div>
                                    <!-- /.contacts-list-info -->
                                  </a>
                                </li>
                                <!-- End Contact Item -->
                                <li>
                                  <a href="#">
                                    <img class="contacts-list-img" src="dist/img/user3-128x128.jpg">
            
                                    <div class="contacts-list-info">
                                      <span class="contacts-list-name">
                                        نکیسا کیانی
                                        <small class="contacts-list-date float-left">۲/۲۰/۲۰۱۵</small>
                                      </span>
                                      <span class="contacts-list-msg">پس بیشتر صبر کن تا برگردم...</span>
                                    </div>
                                    <!-- /.contacts-list-info -->
                                  </a>
                                </li>
                                <!-- End Contact Item -->
                                <li>
                                  <a href="#">
                                    <img class="contacts-list-img" src="dist/img/user5-128x128.jpg">
            
                                    <div class="contacts-list-info">
                                      <span class="contacts-list-name">
                                        رحمت موسوی
                                        <small class="contacts-list-date float-left">۲/۱۰/۲۰۱۵</small>
                                      </span>
                                      <span class="contacts-list-msg"> حالتون چطورههههه !...</span>
                                    </div>
                                    <!-- /.contacts-list-info -->
                                  </a>
                                </li>
                                <!-- End Contact Item -->
                                <li>
                                  <a href="#">
                                    <img class="contacts-list-img" src="dist/img/user6-128x128.jpg">
            
                                    <div class="contacts-list-info">
                                      <span class="contacts-list-name">
                                        جکسون عبداللهی
                                        <small class="contacts-list-date float-left">۱/۲۷/۲۰۱۵</small>
                                      </span>
                                      <span class="contacts-list-msg">عالیییییییییی...</span>
                                    </div>
                                    <!-- /.contacts-list-info -->
                                  </a>
                                </li>
                                <!-- End Contact Item -->
                                <li>
                                  <a href="#">
                                    <img class="contacts-list-img" src="dist/img/user8-128x128.jpg">
            
                                    <div class="contacts-list-info">
                                      <span class="contacts-list-name">
                                        کتایون ریحانی
                                        <small class="contacts-list-date float-left">۱/۴/۲۰۱۵</small>
                                      </span>
                                      <span class="contacts-list-msg">بیخیالش پیداش میکنم...</span>
                                    </div>
                                    <!-- /.contacts-list-info -->
                                  </a>
                                </li>
                                <!-- End Contact Item -->
                              </ul>
                              <!-- /.contacts-list -->
                            </div>
                            <!-- /.direct-chat-pane -->
            </div>
               
            </div>


            
            </div>
            
          </div>
              
              
             
              
@section('js')

@endsection
@endsection