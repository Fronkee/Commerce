<?php

namespace App\Classes;

use PDO;
use PDOException;

class DataBase{
    
     private  $db_host;
     private  $db_name;
     private  $db_user;
     private  $db_pass;
     private  $dbh;
     private  $stmt;

      public  function __construct()
      {
          $this->db_host = $_ENV['DB_HOST'];
          $this->db_name = $_ENV['DB_NAME'];
          $this->db_user = $_ENV['DB_USER'];
          $this->db_pass = $_ENV['DB_PASS'];
        
        //connection
        $dbc = "mysql:host=".$this->db_host .";dbname=".$this->db_name;

        //getError
        $options = [
          PDO::ATTR_PERSISTENT => true,
          PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        ];

            try{
                $this->dbh = new PDO($dbc,$this->db_user,$this->db_pass,$options);
            }catch(PDOException $e){
                exit($e->getMessage());
            }
      }
      //query
    
      public function query($qry){
        $this->stmt = $this->dbh->prepare($qry);
    }
      //bind 
      public function bind($param,$value,$type =''){
        if(empty($type)){
            switch($value){
                case is_int($value):
                   $type = PDO::PARAM_INT;
                   break;
               case is_bool($value):
                   $type = PDO::PARAM_BOOL;
                   break;
               case  is_null($value):
                   $type = PDO::PARAM_NULL;
                   break;
               default:
                  $type = PDO::PARAM_STR;    
            }
        }
      $this->stmt->bindValue($param,$value,$type);
   }
      
      //execute query
      public function execute(){
        return $this->stmt->execute();
    }

      //singleSet Data
      public function singleSet(){
         $this->execute();
         return $this->stmt->fetch(PDO::FETCH_OBJ);
      }

      //multiple Data
      public function multipleSet(){
          $this->execute();
          return $this->stmt->fetchAll(PDO::FETCH_OBJ);
      }
      
      public function rowCount(){
        return  $this->stmt->rowCount();
     }
       
  }
