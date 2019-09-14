@include('frontEnd.app')
@section('content')
    
<!-- page wapper-->
<div class="columns-container">
        <div class="container" id="columns">
            <!-- breadcrumb -->
            <div class="breadcrumb clearfix">
                <a class="home" href="#" title="Return to Home">Home</a>
                <span class="navigation-pipe">&nbsp;</span>
                <span class="navigation_page">Authentication</span>
            </div>
            <!-- ./breadcrumb -->
            <!-- page heading-->
            <h2 class="page-heading">
                <span class="page-heading-title2">Authentication</span>
            </h2>
            <!-- ../page heading-->
            <div class="page-content">
                <div class="row">
                    <div class="col-sm-6">
                                <div class="flash-message">
                                    @foreach (['danger', 'warning', 'success', 'info'] as $msg)
                                    @if(Session::has('alert-' . $msg))
                    
                                    <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} 
                                      <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                    </p>
                                    @endif
                                    @endforeach
                                </div> 
                               
                                @if($errors)
                                  @foreach($errors->all() as $err)
                                  <div class="alert alert-danger alert-dismissible fade show  mr-auto ml-auto mb-3" role="alert">
                                      {{$err}}   
                                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                      </button>
                                  </div>
                                  @endforeach
                                @endif
                        <div class="box-authentication">
                            <h3>Create an account</h3>
                            <form class="form-horizontal" method="POST" action="{{ route('users.store') }}">
                                    {{ csrf_field() }}
            
                                    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                        <label for="name" class="col-md-4 control-label">Name</label>
            
                                        <div class="col-md-6">
                                            <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>
            
                                            @if ($errors->has('name'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('name') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
            
                                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                        <label for="email" class="col-md-4 control-label">E-Mail Address</label>
            
                                        <div class="col-md-6">
                                            <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>
            
                                            @if ($errors->has('email'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('email') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
            
                                    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                        <label for="password" class="col-md-4 control-label">Password</label>
            
                                        <div class="col-md-6">
                                            <input id="password" type="password" class="form-control" name="password" required>
            
                                            @if ($errors->has('password'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('password') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
            
                                    <div class="form-group">
                                        <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>
            
                                        <div class="col-md-6">
                                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                                        </div>
                                    </div>
            
                                    <div class="form-group">
                                        <div class="col-md-6 col-md-offset-4">
                                            <button type="submit" class="btn btn-primary">
                                                Register
                                            </button>
                                        </div>
                                    </div>
                                </form>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="box-authentication">
                            <h3>Already registered?</h3>
                            <label for="emmail_login">Email address</label>
                            <input id="emmail_login" type="text" class="form-control">
                            <label for="password_login">Password</label>
                            <input id="password_login" type="password" class="form-control">
                            <p class="forgot-pass"><a href="#">Forgot your password?</a></p>
                            <button class="button"><i class="fa fa-lock"></i> Sign in</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ./page wapper-->
@endsection