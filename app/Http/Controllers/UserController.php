<?php

namespace App\Http\Controllers;

use Session;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Validator;
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //return view('')
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
     //get the current lang 
     public function lang(){
        return Session::get('lang');
    }
    public function store(Request $request)
    {
      //  dd($request->all());
        $validator = Validator::make($request->all(), [
           'firstname'=>'string|max:200',
           'lastname'=>'string|max:200',
           'email' => 'required|string|email|max:255|unique:users',
           'phone'=>'required',
           'address'=>'string|required',
           'password' => 'required|string|min:6|confirmed',
        ]);
        if ($validator->passes()) {
        $user  = user::where('email',$request->email)->first();
        $tokenr=str_random(8);

        $user = User::create([
            'firstname'=>$request->firstname,
            'lastname'=>$request->firstname,
            'email'=>$request->email,
            'emailtokenv'=>$tokenr,
            'phone'=>$request->phone,
            'address'=>$request->address,
            'password'=>bcrypt($request->password)
        ]);
        //admin notification
        Mail::send('mail.NewRegistration',['user'=>$user,'site_name_e'=>'trisoline ecommerce'],function($message) use ($user){
            $message->to('ayatir04@gmail.com');
            $message->subject('new registration in website');
       });
       //notification to the user to verify email
       Mail::send('mail.emailVerification',['user'=>$user,'site_name_e'=>'trisoline ecommerce'],function($message) use ($user){
        $message->to($user->email);
        $message->subject('verify email');
   });
       return response()->json(['success'=>'success,we sent you an activation code, please check your email']);
    }
    //return the errors messages 
    return response()->json(['errors'=>$validator->errors()->all()]);
    }
    public function verifyEmail(Request $request){
       
      $this->validate($request,[
          'emailtokenv'=>'required'
      ]);
      $token = $request->emailtokenv;
      $user = User::where('emailtokenv',$token)->first();
     
      if($user != null){
        if($user->email_verification == true){
            Session::flash('alert-info','The email already verified');
            return back(); 
        }
        $user->emailtokenv = '';
        $user->email_verification = true;
        $user->save();
        Session::flash('alert-success','Thanks for confirming your email');
        return view($this->lang().'.emailIsVerified');
      }else{
        Session::flash('alert-danger','your token is invalid or email has been already verified '); 
      }
      return back();
    }
    public function verifyEmailg($token){
      $user = User::where('emailtokenv',$token)->first();
      if($user != null){
        if($user->email_verification == 1){
            Session::flash('alert-info','The email already verified');
            return back(); 
        }
        $user->emailtokenv = '';
        $user->email_verification = 1;
        $user->save();
        Session::flash('alert-success','Thanks for confirming your email');
        
      }else{
        Session::flash('alert-warning','your token is invalid or email has been already verified '); 
      }
      return view($this->lang().'.emailIsVerified');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
