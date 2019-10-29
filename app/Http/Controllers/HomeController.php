<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Util\Products;
use App\Cart;
use auth;
use Session;
use App\Pages;
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
    public function loginPage(){
        return view($this->lang().'.login');
    }

    //the product page 
    public function products(){
       // $products = $this->p->getProducts();
       // $categories = collect($this->p->getCategories())->splice(20);
       // return view($this->lang().'.products',compact('products','categories'));
        return view($this->lang().'.products');
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
}
