<?php

namespace App\Http\Controllers;

use Session;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

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
    public function store(Request $request)
    {
      //  dd($request->all());
        $this->validate($request,[
           'firstname'=>'string|max:200',
           'lastname'=>'string|max:200',
           'email' => 'required|string|email|max:255|unique:users',
           'phone'=>'required',
           'address'=>'string|required',
           'password' => 'required|string|min:6|confirmed',
        ]);
        $user  = user::where('email',$request->email)->first();
        
        $user = User::create([
            'firstname'=>$request->firstname,
            'lastname'=>$request->firstname,
            'email'=>$request->email,
            'phone'=>$request->phone,
            'address'=>$request->address,
            'password'=>bcrypt($request->password)
        ]);
        Mail::send('mail.NewRegistration',['user'=>$user,'site_name_e'=>'trisoline ecommerce'],function($message) use ($user){
            $message->to('ayatir04@gmail.com');
            $message->subject('new registration in website');
       });
        Session::flash('alert-success','The registration passed with success');
        return back();
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
