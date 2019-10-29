<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\Settings;
use App\User;
use App\Favorites;
use App\Pages;
use App\Ticket;
use Auth;
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
        $tickets =  Ticket::latest();
        $settings = $this->settings();
        return view('admin.tickets',compact('tickets','settings'));
    }
    
}
