<?php 

namespace App\Controllers;

use App\Classes\Redirect;
use App\Classes\Request;
use App\Classes\Session;
use App\Classes\UploadFile;
use App\Classes\Validate;
use App\Models\CategoryModel;
use App\Models\ProductModel;

class ProductDetailController extends BaseController{
    public function __construct()
    {
        $this->category  = new CategoryModel();
        $this->product = new ProductModel();
    }
    public function detail()
    {
        $start = 0;
        if(isset($_GET['start'])){
            $start = $_GET['start'];
        }
        $data = cold(['products'],[$this->product->pagination('products',$start,7)]);
       $this->views('admin/product/detail',$data);
    }

    public function edit($id)
    {
        //coming from get method
        $product = $this->product->getById('products',$id);
        $data = cold(['product','cat_name'],[ $product,$this->product->getById('category',$product->cat_id)]);
       $this->views('admin/product/edit',$data);
    }

    public function update()
    {
        $post = Request::get('post');
        $file = Request::get('files');
        $con = [
            'name' => ['require'=>true,'minLength'=>3],
            'description' => ['minLength' =>20]
          ];
          Validate::checkValidate($post,$con);
          if(Validate::hasError())
          {
            Session::flash('error','Product Updating Data is Error!');
            $this->edit($post->id);
          }  else{
            extract(json_decode(json_encode($post),true));
            $img = $img;
             if(!empty($file->file->name)){
                 $img  = UploadFile::getPath($file);
             }
             $updating = $this->product->updateProduct('products',$id,$cat_id,$name,$price,$img,$description);
                    if($updating)
                    {
                       UploadFile::move($file);
                       Session::flash('success','Update Products Successfully!');
                    //    $data = cold(['products'],[$this->product->all('products')]);
                    //    $this->views('admin/product/detail',$data);
                         $this->detail();
                    }
          }  
             
    }


    public function delete($id)
    {
       $con = $this->product->destroy('products',$id);
        if($con){
            Session::flash('product_delete','Prodcut Deleted is Successfully!');
            $this->detail();
        }     
    }
    public function detailDelete($id){
        $con = $this->product->destroy('products',$id);
        if($con){
            Session::flash('product_delete','Prodcut Deleted is Successfully!');
            $this->product($id);
        }  
    }
     
    //get product by Category id
    public function product($id)
    {
        $start = 0;
        if(isset($_GET['start'])){
            $start = $_GET['start'];
        }
            $data = cold(['cats','products'],[$this->category->all('category','asc',),
            $this->product->productByCatId('products',$id,$start,7)]);
            $this->views('admin/category/cat_product',$data);
      
       
    }
    public function view()
    {
        $start = 0;
        if(isset($_GET['start'])){
            $start = $_GET['start'];
        }
        $data = cold(['products'],[$this->product->pagination('products',$start,10)]);
        $this->views('admin/card',$data);
    }
    public function viewDelete($id){
        $con = $this->product->destroy('products',$id);
        if($con){
            $this->view();
        }    
    }
    
}