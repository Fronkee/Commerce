<?php
 
 namespace App\Controllers;

use App\Classes\Redirect;
use App\Classes\Request;
use App\Classes\Session;
use App\Classes\Validate;
use App\Models\adminModel;
use App\Models\CategoryModel;

 class AdminController extends BaseController{
   public function __construct()
   {
       $this->model =  new CategoryModel();
       $this->admin = new  adminModel();
   }
   // home route
    public function home()
    {
         $data =['category' => $this->model->all('category')];
         $this->views('admin/home',$data); 
    }
    //login route
    public function login()
    {
       $this->views('admin/login');
    }
    public function checkLogin()
    {
       $post = Request::get('post');
       $data = $this->admin->emailExit('admin',$post->email);
       echo $data->name;
       if($data){
           if(password_verify($post->password,$data->password)){
              Session::add('admin-email',$data->email);
              Session::flash('name',$data->name);
               Redirect::to('admin/home');
           }else{
               Session::flash('password',"password not match!");
               Redirect::back();
           }
       }else{
         Session::flash('email_err',"Email not match!");
         Redirect::back();
       }
       
    }

    public function logout()
    {
      if(Session::has('admin-email')){
         Session::remove('admin-email'); 
     }
     Redirect::to('admin');
    }

    public function adminCreate()
    {
      $this->views('admin/create-admin');
    }

    public function adminCreatePost(){
      $post = Request::get('post');
      // format($post);
       if($post->password === $post->con_pass){
          $con = [
             'name' =>['require'=>true,'minLength'=>5],
             'email'=>['uniqueMail'=>'admin']
          ];
           Validate::checkValidate($post,$con);
           if(!Validate::hasError()){
            $this->admin->insertAdmin($post->name,$post->email,$post->password,$post->num);
            Session::flash('success','Created Admin is Successfully');
            Redirect::back();
           }else{
            Session::flash('authen','Authentication Fail!');
            Redirect::back();
           }
       }else{
         Session::flash('error','Password Not Match!');
         Redirect::back();
       }
    }

    public function msg()
   {
      $data = cold(['msg'],[$this->model->all('message')]);
      $this->views('admin/message',$data);
   }

   public function orders()
   {
      $items= $this->model->getOrders();
      // format($items);
    $data = cold(['orders'],[$this->model->getOrders()]);
    $this->views('admin/order',$data);
   }
 }