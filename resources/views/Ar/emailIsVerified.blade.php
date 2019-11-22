@extends('En.app')
@section('title','التحقق من الايمايل')
@section('content')

<div class="container p-5">

     <div class="p-1 border col-sm-8 m-auto p-3 bg-white">
        @foreach (['danger', 'warning', 'success', 'info'] as $msg)
        @if(Session::has('alert-' . $msg))

        <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
        @endif
        @endforeach
         <a href="#" class="btn btn-primary text-white" data-toggle="modal" data-target="#login-modal">تسجيل الدخول</a>
     </div>
    
</div>



@endsection