<?php 

namespace App\Controllers;

use App\Classes\Redirect;
use App\Classes\Request;
use App\Classes\Session;
use App\Classes\Validate;
use App\Models\UserModel;

class UserController extends BaseController{
    public function __construct()
    {
        $this->userModel = new UserModel();
    }
    public function login()
    {
        $this->views('user/login');
    }

    public function checkLogin()
    {
        $post = Request::get('post');
        
       $da =  $this->userModel->userExit($post->email);
       if($post->email === $da->email){
           if(password_verify($post->password , $da->password)){
               Session::add('email',$post->email);
               Redirect::index();
           }else{
            Session::flash('pass_error','password not match!');
            Redirect::back();
           }
       }else{
           Session::flash('error','Authentication Fail!');
           Redirect::back();
       }
    //    $2y$10$UwaQLvXRFCZ1z6Li5kYqoOzDkjc4GBnpOCFvktxRkqB.SNS/eVFYO
    //    $2y$10$p.XMELKMPlX/j.ZyAApKA.aIxFistkWoKJAmryD6/RJaqJgMh0lIe
    }

    public function register()
    {
        $this->views('user/register');
    }
    public function checkRegister()
    { 
         $post = Request::get('post');
        //  format($post);
         $con = [
           
            'name' => ['minLength'=>4,'require'=>true],
            'email'=>['uniqueMail' => 'users','require'=>true,'minLength'=>13],
            'password' => ['minLength'=>5,'require'=>true] 
         ];
         Validate::checkValidate($post,$con);
         if(Validate::hasError()){
             $data = cold(['errors'],[Validate::getError()]);
             $this->views('user/register',$data);
         }else{
             $post = json_decode(json_encode($post),true);
             extract($post);
             $this->userModel->insertUser($name,$email,$password);
            Redirect::index();
         }
    }

    public function logout(){
        if(Session::has('email')){
            Session::remove('email');
            Redirect::index();
        }
    }
 }