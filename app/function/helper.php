<?php

   //mailer

use App\Classes\Session;
use App\Models\Model;

   function mailMake($filename,$data)
   {
      extract($data);
      ob_start();
      require_once APPROOT . "/resource/mail/". $filename . ".php";
      $body = ob_get_contents();  
   ob_end_clean();
   return $body;
   }

   //Data format 
    function format($data)
    {
         echo "<pre>" . print_r($data,true) . "</pre>";
      }

   //pubic assets
    function assets($link)
    {
     echo  URLROOT .'assets/'.$link;
    }
   //multiple error output msg
    function error_fun($error)
    {
       if(!empty($error)){
          foreach($error as $msg){
             echo'<div class="container col-md-5 rounded-0 mt-2">
             <p class="alert alert-warning rounded-0 english">'.$msg
              .'</p></div>';
          }
       }
    } 
    //single error
    function singleError(Array $errors)
    {
         foreach($errors as $er){           
             if(Session::has($er)){
                return Session::flash($er);
             }
         }
    }
   /**
    * Counting of values
    */
    function counting($table)
    {
      $model =  new Model();
      $con = $model->all($table);
      return count($con);
    } 

    function orderCount()
    {
       $model = new Model();
      return count( $model-> getOrders());
    }
    //format for Basecontroller view method @$data = []
    function cold(Array $key,Array $value)
    {
       $fin =[];
      //  $con =  count($key) && count($value);
       for($x = 0 ; $x < count($key); $x++){
          $fin += [$key[$x] => $value[$x]];  
       }
      return $fin;
    }
   //  breadcrumb
    function breadcrumb()
    {
       $link = $_SERVER['REQUEST_URI'];
       $uri  = rtrim($_SERVER['REQUEST_URI'],"/") ;
        return explode('/',$uri);
         
    }
    function pagi($table,$id = '')
    {
      $model =  new Model();
      return  $model->Count($table,$id);
    }
    
    function cut($key){
       $val=Session::get($key);
      if(strlen($val) <= 15){
         return $val;
      }else{
        $value = explode('@',$val);
        $setup = "{$value[0]}<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;@{$value[1]}";
        return $setup;
      }
 
       
    }
