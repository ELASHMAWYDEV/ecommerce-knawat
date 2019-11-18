@extends('En.app')
@section('title','products')
@section('content')

<div class="container p-5">
    
    <form action="{{route('frontEnd.email.verify')}}" method="post">
     @if($errors->all())
     @foreach ($erros->all() as $error)
         <div class="alert alert-danger">{{$error}}</div>
     @endforeach
     @endif
     
     <div class="form-group col-sm-6 m-auto  p-3 bg-white" style=" box-shadow: 0px 0px 9px 0 #5d5454;">
            <div class="p-1">
                    @foreach (['danger', 'warning', 'success', 'info'] as $msg)
                    @if(Session::has('alert-' . $msg))
            
                    <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
                    @endif
                    @endforeach
            </div> 
        {{ csrf_field() }}
         <label for="token">Enter the verification code</label>
         <input type="text" class="form-control mb-2" name="emailtokenv" required autofocus>
         <input type="submit" value="Verify" class="btn main-b-bg text-white">
     </div>
    </form>
</div>



@endsection