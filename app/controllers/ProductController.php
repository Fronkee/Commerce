<?php

namespace App\Controllers;

use App\Classes\Redirect;
use App\Classes\Request;
use App\Classes\Session;
use App\Classes\UploadFile;
use App\Classes\Validate;
use App\Models\CategoryModel;
use App\Models\ProductModel;

class ProductController extends BaseController{
      public function __construct()
      {
          $this->cat = new CategoryModel();
          $this->product = new ProductModel();
      }
      //GET method Request
      public function index()
      {
          $data = cold(['cats'],[$this->cat->all('category')]);
          $this->views('admin/product/home',$data);
      }
      
      //Post method request create
      public function create()
      {
          $file = Request::get('files');
          $post = Request::get('post');
          //check validate value
          $con = [
              'name' => ['unique'=>'products','require'=>true],
              'description' => ['minLength' => 20]
            ];
            Validate::checkValidate($post,$con);
           if(!Validate::hasError())
           {
                    /**
                     * #1check file name >
                     * check file size
                     * check valid file
                     */
                   if(!empty($file->file->name) ){
                        if(UploadFile::fileSize($file))
                        {
                            //file size success
                           if(UploadFile::isImage($file))
                            {
                               /**
                                * file extension success
                                * 
                                */
                                $image =  UploadFile::getPath($file);
                                $post  = json_decode(json_encode($post),true);//change Object to Array 
                                extract($post);//array to change @var   
                                $insert =  $this->product->insertProudct('products',$cat_id,$name,$price,$image,$description);
                                     if($insert)
                                     {
                                         if(UploadFile::move($file))
                                         {
                                            Session::flash('product_success','Create Product Successfully');
                                            $data = cold(['cats'],[$this->cat->all('category')]);
                                            $this->views('admin/product/home',$data);
                                         }else{
                                             Session::flash('file',"Cannt Moving File Error!");
                                             $data = cold(['cats'],[$this->cat->all('category')]);
                                            $this->views('admin/product/home',$data);
                                         }
                                      
                                     }
                            }else{
                                Session::flash('invalid','Selected File extension is not valid!');
                                $data = cold(['cats'],[$this->cat->all('category')]);
                                $this->views('admin/product/home',$data);
                            }
                        }else{
                            Session::flash('size','Selected File-size is too much');
                            $data = cold(['cats'],[$this->cat->all('category')]);
                            $this->views('admin/product/home',$data);
                        }
                   }else{
                       Session::flash('empty','Please Select File');
                       $data = cold(['cats'],[$this->cat->all('category')]);
                       $this->views('admin/product/home',$data);
                   }
           }else{
                $data = cold(['cats','error'],[$this->cat->all('category'),Validate::getError()]);
                $this->views('admin/product/home',$data);
           }
       
      }
 }