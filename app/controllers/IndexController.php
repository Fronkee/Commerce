<?php
namespace App\Controllers;

use App\Classes\Redirect;
use App\Classes\Request;
use App\Classes\Session;
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

     public function contentCreate()
     {
         $post = Request::get('post');
         $post = json_decode(json_encode($post),true);
         extract($post);
        $con =  $this->product->insertMsg($name,$email,$phone,$state);
         if($con){
             Session::flashMsg('msg_suc',"Thank You , For your Message");
             Redirect::back();
         }
     }
 }


