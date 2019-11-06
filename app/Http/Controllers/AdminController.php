<?php

namespace App\Http\Controllers;

use Auth;
use Session;
use App\User;
use App\Pages;
use App\Reply;
use App\Ticket;
use App\Settings;
use App\Favorites;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;

class AdminController extends Controller
{
    public function __construct(){
        $this->middleware('admin');
    }
    public function settings(){
       return $settings = Settings::find(1);
    }
    public function index(){
        $user = Auth::guard('admin')->user();
        $settings = $this->settings();
        $users =  User::count();
        return view('admin.home',compact('users','settings'));
    }
    public function settingsPage(){
        $settings = Settings::findorfail(1);
        return view('admin.settings',compact('settings'));
    }
    public function usersPage(){
        $users = User::latest('created_at')->get();
        $settings = $this->settings();
        return view('admin.users',compact('users','settings'));  
    }
    public function updateSiteSettings(Request $request){
        //dd($request);
        $this->validate($request,[
           'name'=>'required',
           'name_e'=>'required'
        ]);
  
        $email = $request->email | '';
       
        
        $settings = Settings::find(1);
        
        $logo=$request->logo;
        if($logo){
            $fich=time().$logo->getClientOriginalName();
            $logo->move(public_path('img/'),$fich);
        }else{
            $fich=$settings->logo;
        }
         
         $settings->site_name = $request->name;
         $settings->site_name_e = $request->name_e;
         $settings->site_email = $email;
         $settings->contact_us_email = $request->contact_us_email;
         $settings->facebook_link =( $request->facebook_u) ? ( $request->facebook_u) : $settings->facebook_link;
         $settings->twitter_link = ($request->twitter_u) ? ($request->twitter_u): $settings->facebook_link;
         $settings->youtube_link = ($request->youtube_u) ? ($request->youtube_u) : $settings->facebook_link;       
         $settings->instagram_link = ($request->instagram_u) ? ($request->instagram_u) : $settings->instagram_link;       
         $settings->linkedin_link = ($request->linkedin_u) ? ($request->linkedin_u) : $settings->linkedin_link;       
         $settings->logo = $fich;
         $settings->address = ($request->address) ? $request->address : $settings->address;
         $settings->phone = ($request->phone) ? $request->phone : $settings->phone;

         $settings->save();
         Session::flash('alert-success','تم تغيير الإعدادات بنجاح');
         return redirect()->back();
    }
    public function block_user($id){
        $user = User::findorfail($id);
        $user->state = false;
        $user->save();
        Session::flash('alert-success','تم حظر المستخدم بنجاح');
        return redirect()->back();
    }
    public function unblock_user($id){
        $user = User::findorfail($id);
        $user->state =true;
        $user->save();
        Session::flash('alert-success','تم رفع حظر المستخدم بنجاح');
        return redirect()->back();
    }
    // the products page 
    public function productsPage(){
        $users = User::latest('created_at')->get();
        $favorites = Favorites::distinct('sku')->get();
        $settings = $this->settings();
        return view('admin.products',compact('users','settings','favorites')); 
    }
    //return the favorited products of all users
    public function getFavoritedproducts(){
        return response()->json([Favorites::all()->groupBy('sku')]);
    }
    public function staticpages($slug){
        $page =  Pages::findBySlug($slug);
        $settings = $this->settings();
        return view('admin.pages',compact('page','settings'));
    }
    public function updatePage(Request $request,$slug){
        $this->validate($request,[
            'description' => 'required',
            'description_ar'=>'required'
        ]);
        $page = Pages::findBySlug($slug);
        $page->description = $request->description;
        $page->description_ar = $request->description_ar;
        $page->save();
        Session::flash('alert-success','تم تعديل الصفحة بنجاح');
        return back();
    }
    //the tickets page
    public function tickets(){
        $tickets =  Ticket::latest()->get();
        $settings = $this->settings();
        return view('admin.tickets',compact('tickets','settings'));
    }
    //single page ticket 
    public function showTicket($id){
      $ticket =  Ticket::find($id);$settings = $this->settings();
      return view('admin.singleTicket',compact('ticket','settings'));
    }
    public function gettickets(){
        return response()->json(Ticket::with('user')->latest()->get());
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
          'from_admin'=>true
        ]);
        if($request->addfile != null){
          $fileName = time().'.'.$request->addfile->getClientOriginalExtension();
          $request->addfile->move(public_path('replies_files'), $fileName);
          $re->exfile = $fileName;
          $re->save();
        }
        if($request->notify){
            
             //admin notification
            $user = User::find($request->user_id);
            $ticket_id = $request->id;
        Mail::send('mail.newTicketReply',['user'=>$user,'reply'=>$re,'site_name_e'=>'trisoline ecommerce'],function($message) use ($user){
            $message->to('ayatir04@gmail.com');
            $message->subject(' رد جديد على التدكرة');
       });
        }
        return back();
    }
    public function close_ticket($id){
       $ticket = Ticket::find($id);
       $ticket->state = 0;
       $ticket->save();
       return response()->json(['success'=>'1']);
    }
    public function open_ticket($id){
       $ticket = Ticket::find($id);
       $ticket->state = 1;
       $ticket->save();
       return response()->json(['success'=>'1']);
    }
    
}
