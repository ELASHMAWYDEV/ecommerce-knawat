<?php

namespace App\Http\Controllers;

use Session;
use App\User;
use App\Favorites;
use App\Cart;
use App\BillingInfo;
use App\Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Validator;
use Auth;
use App\Reply;
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
        $billinginfo = BillingInfo::create([
            'user_id'=>$user->id,
            'address_line1'=>'',
            'img'=>'avatar.png',
            'address_line2'=>'',
            'city'=>'',
            'country'=>'',
        ]);
        //admin notification
        Mail::send('mail.newRegistration',['user'=>$user,'site_name_e'=>'trisoline ecommerce'],function($message) use ($user){
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
  public function update(Request $request)
    {
        //dd($request->all());
        $validator = Validator::make($request->all(), [
           'firstname'=>'string|max:200',
           'lastname'=>'string|max:200',
           'phone'=>'required',
           'address'=>'string|required',
           'password' => 'required|string|min:6|confirmed',
        ]);
        if ($validator->passes()) {
        
      
        $user = User::find($request->userid);
        
            $user->firstname = $request->firstname;
            $user->lastname =$request->lastname;
            $user->phone=$request->phone;
            $user->address=$request->address;
            $user->password=bcrypt($request->password);
            $user->save();
    
       return response()->json(['success'=>'success']);
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
    public function updatebillinginfo(Request $request){
        if($request->image != null){
        $imageName = time().'.'.$request->image->getClientOriginalExtension();
        $request->image->move(public_path('profile_img'), $imageName);
        }
      $validator = Validator::make($request->all(), [
        'address_line1'=>'string',
        'address_line2'=>'string',
        'city'=>'string|required',
        'country'=>'string|required',
      ]);
      if ($validator->passes()) {


        $billinginfo = BillingInfo::where('user_id',Auth::id())->first();
        if($request->image != null){
          $billinginfo->img = $imageName;
        }
        $billinginfo->address_line1 = $request->address_line1;
        $billinginfo->address_line2 = $request->address_line2;
        $billinginfo->city = $request->city;
        $billinginfo->country = $request->country;
        $billinginfo->save();

      return response()->json(['success'=>'success']);
      }
        //return the errors messages 
        return response()->json(['errors'=>$validator->errors()->all()]);
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
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    //////////////////////////////////////////////
    //get the user favorite page 
    public function favorites_page(){
      return view($this->lang().'.favorites') ;
    }
    //favorited items 
    public function getFavorites($user_id){
        $favorites = User::findorfail($user_id)->favorites();
 
        return response()->json($favorites->pluck('sku'));
    }
    //add to favorites
    public function addFavorite(Request $request){
         $validator = Validator::make($request->all(),[
           'user_id'=>'required',
           'sku'=>'required'
         ]);
         if($validator->passes()){
           $fav = Favorites::where('user_id',$request->user_id)->where('sku',$request->sku)->first();
           if($fav){
             return response()->json(['data'=>'the product already favorited']);
           }
           $favorite = Favorites::create([
             'user_id'=>$request->user_id,
             'sku'=>$request->sku
           ]);
           return response()->json(['data'=>'the product added to favorites successfuly']);
         }
    }
    public function removeFavorite($id){
    
      $favorite = Favorites::where('sku',$id)->first();
      $favorite->delete();
      return response()->json(['msg'=>'removed from favorites successfuly']);
    }
    public function cart_page(){
      return view($this->lang().'.cart');
    }
    //cart items 
    public function getCartItems($user_id){
      $cartitems = User::findorfail($user_id)->cartItems()->select('sku','quantity')->get()->toJson();;
      return ( $cartitems);
      return response()->json($cartitems->toArray());
    }
    public function addCartItem(Request $request){
    
      $validator = Validator::make($request->all(),[
        'user_id'=>'required',
        'sku'=>'required',
        'quantity'=>'required'
      ]);
      if($validator->passes()){
        $cartitem = Cart::where('user_id',$request->user_id)->where('sku',$request->sku)->first();
        if($cartitem){
          return response()->json([
            'msg'=>'the product already in cart',
            'type'=> 'info'
          ]);
        }
        $cartitem = Cart::create([
          'user_id'=>$request->user_id,
          'sku'=>$request->sku,
          'quantity'=>$request->quantity,
        ]);
          return response()->json([
            'msg'=>'the product added to cart successfuly',
            'type'=> 'success'
          ]);
      }
    }
    public function removeCartItem($id){
        
      $cart = Cart::where('sku',$id)->first();
      $cart->delete();
      return response()->json(['msg'=>'removed from cart successfuly']);
    }
    public function settings(){
      return view($this->lang().'.dashboard.settings');
    }
    public function tickets(){
      return view($this->lang().'.dashboard.tickets');
    }
     //single page ticket 
    public function showTicket($id){
      $ticket =  Ticket::find($id);
      return view($this->lang().'.dashboard.singleTicket',compact('ticket'));
    }
    //get the user tickets
    public function mytickets(){
      return response()->json(Ticket::where('user_id',Auth::id())->with('user')->latest()->get());
    }
    public function add_ticket_reply($id,Request $request){
     
      $this->validate($request,[
        'user_id'=>'required',
        'content'=>'string|required',
      ]);
     
      
      $re = Reply::create([
        'user_id'=>$request->user_id,
        'ticket_id'=>$id,
        'content'=>$request->content,
        
      ]);
      if($request->addfile != null){
        $fileName = time().'.'.$request->addfile->getClientOriginalExtension();
        $request->addfile->move(public_path('replies_files'), $fileName);
        $request->exfile = $fileName;
        $request->save();
      }
      return back();
    }
    public function userLatestReplies(){
      $ticket = Ticket::where('user_id',Auth::id())->latest()->first();
      $user = $ticket->user->billingInfo->img;
      return response()->json([
        'replies'=>$ticket->replies->take(3),'user_img'=>$user]);
    }
}
