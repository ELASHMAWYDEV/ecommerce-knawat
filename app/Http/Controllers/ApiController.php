<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Util\Post;

use Knawat\MP;


class ApiController extends Controller
{
    //


    

   public $mp;

    protected $post;

    public function __construct(Post $post)
    {
        $this->post = $post;
       
    }

    public function index()
    {
    
        $this->mp = new MP(
            '87f75780-c89f-11e9-989e-ffa75a9513df',
            '781b0a6b-8797-41a4-bf3e-4e3dc09330ff'
        );
        $products = $this->mp->getProducts(20, 1);
        $invoices = $this->mp->get('/catalog/categories');
        //$invoices = $this->mp->get('/catalog/products/count');
        //$invoices = $this->mp->get('/catalog/products/MK016-3512-026');
       // $invoices = $this->mp->delete('/catalog/products/MK016-3512-026');
        //$orders = $this->mp->post('/orders');
        dd($invoices);

    	return view('home', compact('products','invoices'));
    }

    public function show($id)
    {
    	$post = $this->post->findById($id);

    	return view('posts', compact('post'));
    }
}
