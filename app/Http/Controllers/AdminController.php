<?php

namespace App\Http\Controllers;

use Auth;
use Session;
use App\User;
use App\Order;
use App\Pages;
use App\Reply;
use App\Ticket;
use App\Settings;
use App\Favorites;
use App\MailingList;
use App\Slider;
use App\Shipping;
use App\ShippingCompanies;
use DB;
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
    //the newsletter page
    public function newsletter(){
        $emails = MailingList::all();
        return view('admin.newsletter',compact('emails'));
    }
    public function deletenewsletter($email){
        $emailitem = MailingList::whereEmail($email)->first();
        $emailitem->delete();
        
        return response()->json('تم حدف البريد بنجاح');
    }
    //the orders page
    public function orderspage(){
        return view('admin.orders');
    }
    public function getallorders(){
        $orders = Order::with('user')->paginate(2);
        return response()->json($orders);
    }
    public function getordersbyusername($w){
        $orders = Order::with(['user' => function($q) use($w) {
            $q->where('firstname', 'like','%'.$w.'%'); // '=' is optional
        }])
        ->paginate(20);
        return response()->json($orders);
    }
    public function getordersbyid($order_id){
        //here we use where because we are receiving a string not a number
        
        $orders = Order::with('user')->where('id','like','%'.$order_id.'%')->paginate(1);

        return response()->json($orders);
    }
 
    //the slider page 
    public function sliderpage(){
        $sliders = Slider::all();
        return view('admin.sliders',compact('sliders'));
    }
    public function addSlider(Request $request){
        $this->validate($request,[
            'image'=>'required|image|mimes:jpeg,png,jpg,gif,svg'
        ]);
        
        $slider = new Slider();
        $slider->title = $request->title ? $request->title : '';
         if($file =  $request->file('image')){
                $img = time() . '' .$file->getClientOriginalName();
                $file->move(public_path('slider_img/'),$img);
            
                $slider->image = $img;
     }
     $slider->save();
     Session::flash('alert-success','تم إضافة السلايدر بنجاح');
     return redirect()->back();

    }
    public function updateSlider(Request $request,$id){
        
        $slider = Slider::findorfail($id);
        $slider->title = $request->title ? $request->title : $slider->title;
        if($file =  $request->file('image')){
            if(file_exists(public_path('slider_img/'.$slider->image))){
           
                unlink(public_path('slider_img/'.$slider->image));
            
            }
            $img = time() . '' .$file->getClientOriginalName();
                $file->move(public_path('slider_img/'),$img);
            
                $slider->image = $img;
        }else{
            $slider->image = $slider->image;
        }
        $slider->save();
        Session::flash('alert-success','تم تعديل السلايدر بنجاح');
        return redirect()->back();


    }
    public function deleteSlider($id){
        
        $slider = Slider::findorfail($id);
        $image = $slider->image;
       
        if(file_exists(public_path('slider_img/'.$image))){
           
            unlink(public_path('slider_img/'.$image));
        
        }
        $slider->delete();
        
        Session::flash('alert-success','تم حدف السلايدر بنجاح');
        return redirect()->back();

    }
    //the shipping page 
    public function shippingpage(){
        $shipping_companies = ShippingCompanies::all();
        $shippings = Shipping::orderBy('country','desc')->get();
        return view('admin.shipping',compact('shippings','shipping_companies'));
    }
    public function addShipping(Request $request){
        $this->validate($request,[
            'country'=>'required',
            'weight'=>'required',
            'price'=>'required'
        ]);
        $shipp = Shipping::where('country',$request->country)->first();
        if($shipp && ($shipp->company_id == $request->company_id)){
            Session::flash('alert-success','البلد موجود بنفس الشركة من قبل');
            return redirect()->back();
        }
        $shipping = new Shipping();
        $shipping->company_id = $request->company_id ? $request->company_id : 1;
        $shipping->country = $request->country;
        $shipping->weight = $request->weight;
        $shipping->price = $request->price;
        $shipping->save();
     Session::flash('alert-success','تم إضافة التسعيرة بنجاح');
     return redirect()->back();

    }
    public function updateShipping(Request $request,$id){
        //find the current shipping to update
        $shipping = Shipping::findorfail($id);
      
        //search the related shipping to the same country 
        $relatedshipp = Shipping::where('country',$shipping->country)->where('id','!=',$id)->get();
        foreach($relatedshipp as $sh){
           if($sh->company_id == $request->company_id){
            Session::flash('alert-warning','البلد موجود بنفس اسم الشركة من قبل');
            return redirect()->back();
            } 
        } 
        
        
        $shipping->company_id = $request->company_id ? $request->company_id : $shipping->company_id;
        $shipping->weight = $request->weight ? $request->weight : $shipping->weight;
        $shipping->price = $request->price ? $request->price : $shipping->price;
        $shipping->save();
        Session::flash('alert-success','تم تعديل التسعيرة بنجاح');
        return redirect()->back();


    }
    public function deleteShipping($id){
        
        $shipping = Shipping::findorfail($id);
        
        $shipping->delete();
        
        Session::flash('alert-success','تم حدف التسعيرة بنجاح');
        return redirect()->back();

    }
    //activate and disactivate the adjustment price status
    public function updateAdjustmentStatus($status){
        $shippings = Shipping::query();
        $shippings->update(['adjustment_price'=>$status]);
        Session::flash('alert-success','تم تحديث حالة تسعيرة التوظيب بنجاح');
        return redirect()->back();
    }
    
   
    public function changeShippingcompany(Request $request){
        $current_company =ShippingCompanies::findorfail($request->company_id);

        $shippings = ShippingCompanies::query();
        $shippings->update(['state'=>false]);
        $current_company->state = true;
        $current_company->save();
        Session::flash('alert-success','تم تغيير شركة  الشحن بنجاح');
        return redirect()->back();
    }
    
    
}
