<?php

namespace App\Controllers;
   
  class BaseController{
  
      public function views($views,$data = []){
         extract($data);
         if(\file_exists(APPROOT .'/resource/views/' .$views .".php")){
            require_once APPROOT .'/resource/views/' .$views .".php";
         } 
     }

    /**
     * connect to Database
     */

   //   public function model($model){
   //    if(\file_exists(APPROOT .'/app/models/' .$model.".php")){
   //       require_once APPROOT .'/app/models/' .$model .".php";
   //    } 
   //     return $model();
   //   }
     
  }
   
  