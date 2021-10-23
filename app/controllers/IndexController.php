<?php
namespace App\Controllers;

use App\Models\ProductModel;

class IndexController extends BaseController{
     public function __construct()
     {
       $this->product = new ProductModel();
     }
     public function index(){
         $start = 0;
         if(isset($_GET['start'])){
             $start = $_GET['start'];
             //pagination
         }
         $data = cold(['products'],[$this->product->pagination('products',$start,10)]);
         $this->views('index',$data);
        
     }
     public function content()
     {
         $this->views('content');
     }
 }


