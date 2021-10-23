<?php

namespace App\Classes;

 class Request{

      public static function all($is_array = false){
           $result = [];
           if(count($_GET)> 0) $result['get'] = $_GET; 
           $_POST = filter_input_array(INPUT_POST,FILTER_SANITIZE_STRING);
           if(count($_POST)>0) $result['post'] = $_POST;
           $result['files'] = $_FILES;

          return json_decode(json_encode($result),$is_array);
      }

      public static function get($key){
            return self::all()->$key;
      }

      public static function has($key){
           return \array_key_exists($key,self::all(true))?true :false;
      }

      public static function old($key,$value){
           return isset(self::all()->key->value)?self::all()->key->value:'';
      }
 }