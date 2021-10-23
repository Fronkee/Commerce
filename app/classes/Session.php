<?php

namespace App\Classes;

 class Session{
    /**
     * check key in Session 
     */
    public static function has($key){
      return isset($_SESSION[$key]) ? true : false;
    }
    
    /**
     * not has in Session,
     * add value and key in the Session
     */
    public static function add($key,$value){
      if(!self::has($key)){
         $_SESSION[$key] = $value;
      }
    }
    
    /**
     * if has Session
     * return Sesssion value
     */  
    public static function get($key){
      if(self::has($key)){
          return $_SESSION[$key];
      }
    }

    /**
     * if has Session
     * destory Sesssion 
     */ 
      public static function remove($key){
        if(self::has($key)){
            unset($_SESSION[$key]);
        }
      }

    /**
     * if has Session key
     * replace  value in old Session
     */ 
    public static function replace($key,$value){
        if(self::has($key)){
            self::remove($key);
        }
        return $_SESSION[$key] = $value;
    }

    /**
     * flash message 
     * if use key,flash message work
     * if use key and value,stroe Message in session
     */
    public static function flash($key , $value = ''){
      if(!empty($value)){
          self::replace($key,$value);
      }else{
          echo"<p class='alert  rounded-0 english text-white' style='background-color:#2a5d84'>" . self::get($key) . "</p>";
           self::remove($key);
      }
    }

    public static function flashMsg($key, $value=""){
      if(!empty($value)){
        self::replace($key,$value);
    }else{
        echo self::get($key) ;
         self::remove($key);
    }
    }
 }