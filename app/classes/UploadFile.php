<?php

namespace App\Classes;

 class UploadFile{

       protected static  $filename;
       protected static $filesize = 401975;
       protected static $image_path;
      
       /**
        * change filename with tmp_name
        * change lower case
        * change _ '' / => to -
        */
       public static function setName($file,$file_name=""){
            if(empty($file_name)){
                $name = pathinfo($file->file->tmp_name,PATHINFO_FILENAME);    
            }
            $name = strtolower(\str_replace(['_','','/'],['-'],$name));
            $hash = md5(\microtime());
            $ext  = pathinfo($file->file->name,PATHINFO_EXTENSION);
            return  self::$filename ="{$name}-{$hash}.{$ext}";
       }

       public static function getName(){
           return self::$filename;
       }
       /**
        * check valid filesize
        */
       public static function fileSize($file){
          return $file->file->size <= self::$filesize ? true :false;                 
       }
       /**
        * check valid file extension
        */
       public static function isImage($file){
           $ext = pathinfo($file->file->name,PATHINFO_EXTENSION);
           $valid = ['jpg','jpeg','png','gif'];
           return in_array($ext,$valid);
       }
       //get path
       public static function getPath($file){
           return self::$image_path = self::setName($file) ;
       }
       /**
        * move file 
        */
       public static function move($file){
           $path = APPROOT ."/public/assets/uploads/";
           if(!is_dir($path)){
               mkdir($path);
           }
           $name = self::$image_path;
           $file_path = $path . $name;
           return move_uploaded_file($file->file->tmp_name,$file_path);
       } 
}