<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Exceptions\AuthFailedException;
use App\User;
use Session;
class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    //get the current lang 
    public function lang(){
        return Session::get('lang');
    }
    protected function authenticated(Request $request,$user){
        return response()->json([
            'status'=> 'ok'
        ]);
    }
    protected function sendFailedLoginResponse(Request $request){

        throw new AuthFailedException;

    }
    public function checkIfUserBlocked($email){
        $user = User::whereEmail($email)->first();
        //if the email is verified or not
        if($user){
            if($user->email_verification == 0){
               if($this->lang() == 'En'){
                return response()->json(['type'=>'0','msg'=>'your email isn\'t verified yet please check your email and verify it']);
               }else{
                return response()->json(['type'=>'0','msg'=>'الايمايل الدي أدخلته غير مفعل يرجى تفقد البريد الوارد وتفعيل الايمايل']);
               }
            }
           
            
        //check if the user is blocked by admin or not
        if($user->state == false){
          if($this->lang() ==  'En'){
          return response()->json(['type'=>'1','msg'=>'Your account has been blocked by admin please send message from contact page']);
          }else{
            return response()->json(['type'=>'1','msg'=>'تم حظر حسابك من طرف الادمن يرجى  مراسلته من صفحة اتصل بنا']);
          }
          
        } 
        return response()->json(['type'=>'2','msg'=>'ok']);
       }
    
        return response()->json(['type'=>'3','msg'=>'user not found']);
     }
}
