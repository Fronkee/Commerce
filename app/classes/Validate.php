<?php

namespace App\Classes;

use App\Models\Model;

class Validate extends Model{
    private static $error = [];
    private static $error_msg = [
     'uniqueMail'  =>  'Email is Already Exit!',
     'unique'      =>  ':field is Already Exit!',
     'require'     =>  ':field Must be Supply!',
     'minLength'   =>  ':field at least :condition characters!',
     'maxLength'   =>  ':field must be have :condition characters!',
     'email'       =>  'The :filed vaildation error',
     'string'      =>  'Please :filed can only fill string value',
     'int'         =>  'Please :filed can only fill integer value',
     'mix'         =>  'the :filed can only character',
    ];
    /**
     * check Validation
     */
    public static function checkValidate($data , $condition)
    {
         foreach($data as $key => $value){
             if(in_array($key,array_keys($condition))){
              //call dovalition function
              self::doValidate([
                'key' => $key,
                'value' => $value,
                'con' =>  $condition[$key]
              ]);
             }
            }
    }
    /**
     * Do validation 
     * replace :field of error_msg
     */
    public static function doValidate(Array $data)
    {
        $key = $data['key'];
        foreach($data['con'] as $method => $rule){
            $valid = call_user_func_array([self::class,$method],[$key,$data['value'],$rule]);
            if(!$valid){
                self::setError($key,
                \str_replace(
                    [':field',':condition'],[ucfirst($key),$rule],self::$error_msg[$method]));
            }
        }
    }
    /**
     * check value null or empty
     * #1
     */
     public static function checkValue($value)
     {
        if($value != null && !empty($value)){
            return true;
        }
     }
     /**
      * check value is exit or not in database
      * #2
      */
     public  static function unique($column,$value,$condition)
     {
         if(self::checkValue($value)){
            return !(new Self)->exit($condition,$value); // Model Object of  exit method
         }
     }
     public static function uniqueMail($colum,$value,$condition)
     {
        if(self::checkValue($value)){
            return !(new Self)->emailExit($condition,$value); // Model Object of  exit method
         }
     }
    /**
     * check minimum  length 
     * #3
     */
     public static function minLength($column,$value,$condition)
     {
         if(self::checkValue($value)){
            return strlen($value) >= $condition;
         }
     }
     /**
      * check maximun length 
      * #4
      */
      public static function maxLength($column,$value,$condition)
     {
         if(self::checkValue($value)){
            return strlen($value) <= $condition;
         }
     }
     /**
      * check email address 
      * #5
      */
     public static function email($column,$value,$condition)
    {
        if(self::checkValue($value)){
          return filter_var($value,FILTER_VALIDATE_EMAIL);
        }
    }

     /**
      * check String value 
      * #5
      */
    public static function string($column,$value,$condition)
    {
        if(self::checkValue($value)){
          return preg_match('/^[a-zA-Z]+$/',$value);
        }
    }
    
    /**
     * check Integer value
     * #6
     */
    public static function int($column,$value,$condition)
    {
         if(self::checkValue($value)){
             return preg_match('/^[0-9]+$/',$value);
         }
    }

    /**
     * check mixed Value 
     * string,integer,special words...
     * #7
     */
    public static function mix($column,$value,$condition)
    {
        if(self::checkValue($value)){
            return preg_match('/^[a-zA-z0-9\.$@]+$/',$value);
        }
    }
      /**
      * required field
      *#8
      */
    public static function require($colum,$value,$condition){
         if(!empty($value) && $value != ''){
             return true;
         }else{
             return false;
         }
         
    } 
    /**
     * set Error
     */
    public static function setError($key=null ,$value){
         if($key){
           self::$error[$key] = $value;
         }
    }
    /**
     * check  Error Message
     */
    public static function hasError(){
        return  count(self::$error) > 0 ? true : false;
    }
    /**
     * get Error
     */
    public static function getError(){
        return self::$error;
    }
}