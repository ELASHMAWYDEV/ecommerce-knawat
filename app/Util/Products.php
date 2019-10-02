<?php
namespace App\Util;

use Knawat\MP;

class Products {
    public $mp;

    public function __construct()
    {
        $this->mp = new MP(
            '87f75780-c89f-11e9-989e-ffa75a9513df',
            '781b0a6b-8797-41a4-bf3e-4e3dc09330ff'
        );
       
    }
    public function getProducts(){
        $products = $this->mp->getProducts();
        return $products;
    }
    public function get10Products(){
        $products = $this->mp->getProducts(10);
        return $products;
    }
    public function productsCount(){
       return $this->mp->get('/catalog/products/count');
    }
    public function getProductBySku($sku){
        return $this->mp->get('/catalog/products/'.$sku);
    }
    public function deleteProduct($sku){
        return $this->mp->delete('/catalog/products/'.$sku);
    }
    public function updateProduct($sku){
        return $this->mp->put('/catalog/products/'.$sku,['name.ar'=>"rest"]);
    }
    
    public function getCategories(){
        return $this->mp->get('/catalog/categories');
    }

    //orders 
    public function getOrders(){
        return $this->mp->get('/orders');
    }
    public function getOrder($id){
        return $this->mp->get('/orders'.'/'.$id);
    }

}