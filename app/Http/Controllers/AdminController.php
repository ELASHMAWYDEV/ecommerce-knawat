<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\Settings;
class AdminController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    //
    public function updateSiteSettings(Request $request){
        //dd($request);
        $this->validate($request,[
           'name'=>'required',
           'name_e'=>'required'
        ]);
  
        $email = $request->email | '';
       
        
        $settings = Setting::find(1);
        
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
}
