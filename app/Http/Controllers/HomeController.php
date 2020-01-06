<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Util\Products;
use App\Cart;
use auth;
use Session;
use App\Pages;
use App\MailingList;
use App\Slider;
use Illuminate\Support\Facades\Mail;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    protected $p;
    public function __construct(Products $products)
    {
        //$this->middleware('auth')->except('index','loginPage');
        $this->p = $products;
        
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lang = Session::get('lang');
        if( $lang == null){
            Session::put('lang','En');
        }

        
        return view($this->lang().'.home');
    }
    //the change lang function
    public function setLang($lang){
        Session::put('lang',$lang);
       
        return redirect()->back();
    }
    //get the current lang 
    public function lang(){
        return Session::get('lang');
    }
    public function getCategories(){
         return collect($this->p->getCategories());
    }
    public function getProducts(){
        
        return response()->json($this->p->getProducts()); 
    }
    public function get10Products(){
        
        return response()->json($this->p->get10Products()); 
    }
    public function getProductBySku($sku){
        return response()->json($this->p->getProductBySku($sku));
    }
    public function deleteProductBySku($sku){
        return response()->json($this->p->deleteProduct($sku));
    }
    public function getCurrencies(){
        return response()->json($this->p->getCurrencies());
    }
    //payments 
    public function payments($sku){
        dd($this->p->payments($sku));
    }
    public function loginPage(){
        return view($this->lang().'.login');
    }

    //the product page 
    public function products(){
       // $products = $this->p->getProducts();
       // $categories = collect($this->p->getCategories())->splice(20);
       // return view($this->lang().'.products',compact('products','categories'));
       $sliders = Slider::all();
       return view($this->lang().'.products',compact('sliders'));
    }
    public function productDetails($sku){
        //check if the item is in cart or not
        $cartitem = Cart::where('user_id',Auth::id())->where('sku',$sku)->first();
        $incart =  $cartitem ? true : false;
        return view($this->lang().'.productDetails',compact('sku','incart'));
    }
    public $pageContent = null;
    //the static pages 
    public function getPageBySlug($slug){
        $pageContent =  Pages::findBySlug($slug);
        return view($this->lang().'.staticpages',compact('pageContent'));
     }
     public function about_us(){ 
          return  $this->getPageBySlug('about_us');
     }
     public function terms(){ 
         return  $this->getPageBySlug('terms');
     }
     public function faq(){ 
         return  $this->getPageBySlug('faq');
     }
     public function contact_us(){
         return view($this->lang().'.contact');
     }
     //the user contact us form page
     public function contact_us_add(Request $request){
       
        if($request->lang == null){
            Mail::send('mail.contact_us',['request'=>$request,'site_name_e'=>'trisoline ecommerce'],function($message) use ($request){
                $message->to('ayatir04@gmail.com');
                $message->subject('Message from Contact Us page');
           });
           return response()->json(['success'=>'Your message sent successfuly you will get a response intermediatly']);

        }
            Mail::send('mail.contact_us_ar',['request'=>$request,'site_name_e'=>'trisoline ecommerce'],function($message) use ($request){
                $message->to('ayatir04@gmail.com');
                $message->subject('استفسار من صفحة اتصل بنا');
           });
           return response()->json(['success'=>'تم إرسال الرسالة بنجاح وسيتم الرد عليك قريبا']);

        

      }
      public function mailinglist(Request $request){
         
          $this->validate($request,[
            'email'=>'string|required'
          ]);
          $mail =  MailingList::whereEmail($request->email)->first();
          if($mail){
              if($this->lang() == 'Ar'){
                return response()->json(['type'=>'info','data'=>'البريد الالكتروني موجود مسبقا في القائمة']);
              }
                return response()->json(['type'=>'info','data'=>'Email already subscribed']);
          }
          Mailinglist::create([
              'email'=>$request->email
          ]);
          if($this->lang() == 'Ar'){
            return response()->json(['type'=>'success','data'=>'تم الاشتراك شكرا لك']);
          }
         
          return response()->json(['type'=>'success','data'=>'Email subscribed successfuly,Thanks']);
      }
      

     public function dashboard(){
         return  view($this->lang().'.dashboard.index');
     }
     public function userinfo(){
       return Auth::user();
     }
     public function userBillinginfo(){
         
         return Auth::user()->billingInfo()->first();
     }
}
