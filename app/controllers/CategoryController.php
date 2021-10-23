<?php

namespace App\Controllers;

use App\Classes\CSRFToken;
use App\Classes\Redirect;
use App\Classes\Request;
use App\Classes\Session;
use App\Classes\Validate;
use App\Models\CategoryModel;
use App\Models\ProductModel;

class CategoryController extends BaseController
{
   public function __construct()
   {
      $this->category = new CategoryModel();
      $this->product = new ProductModel();
   }
    public function index()
    { 
      $start = 0;
      if(isset($_GET['start'])){
         $start = $_GET['start'];
      }//for pagination
      $data =  cold(['category'],[$this->category->pagination('category',$start,6)]);
       $this->views('admin/category/home',$data);
    }
    /**
     * Create Routing 
     * Create Method
     */
    public function create()
    {
                /**
                 * @var $data for Validation Error
                 */
                $start = 0;
                if(isset($_GET['start'])){
                   $start = $_GET['start'];
                }//for pagination
               $post = Request::get('post');
               $con = [
                 'name' => ['unique' => 'category','require'=>true,'minLength'=>4,'maxLength'=>10]
               ];
               Validate::checkValidate($post,$con); //Check Validation Class
                if(Validate::hasError()){
                  //  format(Validate::getError());
                
                  $data = cold(['category', 'error'],[$this->category->pagination('category',$start,6), Validate::getError()]);
                  $this->views('admin/category/home',$data);
                }else{
                  $this->category->insert('category',Request::get('post')->name);
                  $data =  cold(['category'],[$this->category->pagination('category',$start,6)]);
                  Session::flash('success','Created Category Successfully');
                  $this->views('admin/category/home',$data);
                  //   Redirect::to('admin/category');
                   
                }
         
    }
     /**
     * Delete Routing POST
     * 
     */
    public function delete($id)
    {
         if( $this->category->destroy('category',$id)){
            $data =  cold(['category'],[$this->category->all('category')]);
            // Redirect::to('admin/home');
            Session::flash('delete',"Delete Category Successfully");
            $this->views('admin/category/home',$data);
    
         }
    }

    /**
     * update Routing POST
     */
    public function update()
    {
      //  format(json_encode(Request::get('post')));
       $post = Request::get('post');
      $id = Request::get('post')->id;
      $name = Request::get('post')->name;
      $con = [
         'name' => ['unique' => 'category','maxLength'=>10,'minLength'=>4]
       ];
       Validate::checkValidate($post,$con);//Check Validation
        if(Validate::hasError()){
           header('HTTP/1.1 422 Validation Error!', true , 422);
           echo json_encode(Validate::getError());
        }else{
           $this->category->update('category',$name,$id);
           $data['con'] = 'Update Category Successfully';
           echo json_encode($data['con']);
        }
    }

}