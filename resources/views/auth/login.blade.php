
@extends('En.app')
@section('title','login')
@section('css')

@endsection
@section('content')

 <!-- mian login content-->
 <div class="container pt-4 pb-4">
    
            
    <!-- page wapper-->
    <div class="columns-container p-3 bg-white" style="box-shadow: 0px 0px 8px 0 #c1b3b3;">
            <div class="container" id="columns">
               
                <!-- page heading-->
                <h3 class="page-heading">
                    <span class="page-heading-title2">Authentication</span>
                </h3>
                <!-- ../page heading-->
                <div class="page-content">
                    <div class="row m-0">
                        <div class="col-sm-6 border">
                            <div class="box-authentication">
                                <h5>Create an account</h5>
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
                                <form class="form-horizontal" method="POST" action="{{ route('users.store') }}">
                                        {{ csrf_field() }}
                
                                        <div class="form-group{{ $errors->has('firstname') ? ' has-error' : '' }}">
                                            <label for="firstname" class="col-md-4 control-label">firstname</label>
                
                                            <div class="col-md-10"> 
                                                <input id="firstname" type="text" class="form-control w-100" name="firstname" value="{{ old('firstname') }}" required autofocus>
        
                                                @if ($errors->has('firstname'))
                                                    <span class="help-block">
                                                        <strong>{{ $errors->first('firstname') }}</strong>
                                                    </span>
                                                @endif 
                                            </div>
                                        </div>
                                        <div class="form-group{{ $errors->has('lastname') ? ' has-error' : '' }}">
                                                <label for="lastname" class="col-md-4 control-label">lastname</label>
                    
                                                <div class="col-md-10"> 
                                                    <input id="lastname" type="text" class="form-control w-100" name="lastname" value="{{ old('lastname') }}" required autofocus>
            
                                                    @if ($errors->has('lastname'))
                                                        <span class="help-block">
                                                            <strong>{{ $errors->first('lastname') }}</strong>
                                                        </span>
                                                    @endif 
                                                </div>
                                        </div>
                                        <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
                                                <label for="address" class="col-md-4 control-label">address</label>
                    
                                                <div class="col-md-10"> 
                                                    <input id="address" type="text" class="form-control w-100" name="address" value="{{ old('address') }}" required autofocus>
            
                                                    @if ($errors->has('address'))
                                                        <span class="help-block">
                                                            <strong>{{ $errors->first('address') }}</strong>
                                                        </span>
                                                    @endif
                                                </div>
                                        </div>
                                        <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
                                                <label for="phone" class="col-md-4 control-label">phone</label>
                    
                                                <div class="col-md-10"> 
                                                    <input id="phone" type="number" class="form-control w-100" name="phone" value="{{ old('phone') }}" required autofocus>
            
                                                    @if ($errors->has('phone'))
                                                        <span class="help-block">
                                                            <strong>{{ $errors->first('phone') }}</strong>
                                                        </span>
                                                    @endif 
                                                </div>
                                        </div>
                                        <div class="form-group{{ $errors->has('remail') ? ' has-error' : '' }}">
                                            <label for="remail" class="col-md-4 control-label">E-Mail Address</label>
                
                                            <div class="col-md-10">
                                                <input id="remail" type="email" class="form-control w-100" name="remail" value="{{ old('remail') }}" required>
                
                                                @if ($errors->has('remail'))
                                                    <span class="help-block">
                                                        <strong>{{ $errors->first('remail') }}</strong>
                                                    </span>
                                                @endif 
                                            </div>
                                        </div>
                
                                        <div class="form-group{{ $errors->has('rpassword') ? ' has-error' : '' }}">
                                            <label for="rpassword" class="col-md-4 control-label">password</label>
                
                                            <div class="col-md-10">
                                                <input id="rpassword" type="password" class="form-control w-100" name="rpassword" required>
                
                                                @if ($errors->has('rpassword'))
                                                    <span class="help-block">
                                                        <strong>{{ $errors->first('rpassword') }}</strong>
                                                    </span>
                                                @endif 
                                            </div>
                                        </div>
                
                                        <div class="form-group">
                                            <label for="password-confirm" class="col-md-4 control-label ">Confirm Password</label>
                
                                            <div class="col-md-10">
                                                <input id="password-confirm" type="password" class="form-control w-100" name="password_confirmation" required>
                                            </div>
                                        </div>
                
                                        <div class="form-group">
                                            <div class="col-md-10 col-md-offset-4">
                                                <button type="submit" class="btn main-b-bg text-light">
                                                    Register
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                            </div>
                        </div>
                        <div class="col-sm-6 border">
                            <div class="box-authentication">
                                <h5>Already registered?</h5>
                                <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                                    {{ csrf_field() }} 
            
                                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                        <label for="email" class=" control-label">Email</label>
            
                                        <div class="">
                                            <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>
            
                                             @if ($errors->has('email'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('email') }}</strong>
                                                </span>
                                            @endif  
                                        </div>
                                    </div>
            
                                    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                        <label for="password" class=" control-label">Password</label>
            
                                        <div class="">
                                            <input id="password" type="password" class="form-control" name="password" required>
            
                                            @if ($errors->has('password'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('password') }}</strong>
                                                </span>
                                            @endif  
                                        </div>
                                    </div>
            
                                    <div class="form-group">
                                        <div class="col-md-6 ">
                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }} style="margin-left: -13px;margin-top: 13px;"> Remember me 
                                                </label>
                                            </div>
                                        </div>
                                    </div>
            
                                    <div class="form-group">
                                        
                                            <button class="btn main-b-bg text-light"><i class="fa fa-lock"></i> Sign in</button>
                                        
                                    </div>
                                </form>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </div>
        <!-- ./page wapper-->
</div>
<!-- mian login content-->
    <!-- ./page wapper-->
@endsection