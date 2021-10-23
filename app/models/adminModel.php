<?php
namespace App\Models;

class adminModel extends Model{
  
     public function insertAdmin($name,$email,$password,$phone)
     {
        $password = password_hash($password,PASSWORD_BCRYPT);
         $this->getDB()->query('INSERT INTO admin(name,email,password,phone) VALUES (:name,:email,:password,:phone)');
         $this->getDB()->bind(':name',$name);
         $this->getDB()->bind(':email',$email);
         $this->getDB()->bind(':password',$password);
         $this->getDB()->bind(':phone',$phone);
       return $this->getDB()->execute();
     }
}