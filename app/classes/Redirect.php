<?php

namespace App\Classes;

class Redirect{
     
    public static function index(){
        header("Location:".URLROOT);
    }
     public static function to($link){
         header("Location:". URLROOT .$link);
     }
     public static function back(){
        header("Location:". $_SERVER['REQUEST_URI']);
    }
}