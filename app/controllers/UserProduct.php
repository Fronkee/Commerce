<?php 

namespace App\Controllers;

use App\Classes\Request;
use App\Classes\Session;
use App\Models\CategoryModel;
use App\Models\ProductModel;

class UserProduct extends BaseController
{
    public function __construct()
    {
        $this->category = new CategoryModel();
        $this->product  = new ProductModel();
    }
     public function category($cat_name)
     {
         $cat   = $this->category->exit('category',$cat_name);
         $start = 0;
         if(isset($_GET['start'])){
             $start= $_GET['start'];
         }
        $data = cold(['products'],[$this->product->productByCatId('products',$cat->id,$start,10)]);
        $this->views('category',$data);

     }
     public function detail($id)
     {
          $product = $this->product->getById('products',$id);
          $start = 0;
           if(isset($_GET['start'])){
             $start = $_GET['start'];
           }
          $products = $this->product->productByCatId('products',$product->cat_id,$start,5);
         $data = cold(['product','products'],[$product,$products]);
         $this->views('detail',$data);
     }

     public function cart(){
        //  echo "success";
          $post = Request::get('post');
          $items = $post->cart;
        //   echo json_encode($post);
           $items = $post->cart;
            $cart_array = [];
            foreach($items as $item)
            {
              $product = $this->product->getById('products',$item);
              $product->qty = 1;
              array_push($cart_array,$product);
            }
            echo json_encode( $cart_array);
            exit;
       
          
     }

     public function showCart()
     {
              $this->views('showCart'); 
     }

     public function   payout(){
        $post = Request::get('post');
        if($this->saveOrder($post->items)){
          echo "success";
          exit;
        }
     }

     public function   saveOrder($orders){
          $order = serialize($orders);
          return true;
   }
}