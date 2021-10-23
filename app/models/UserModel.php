<?php 

namespace App\Models;

class UserModel extends Model{
  
    public function userExit($email){
        $this->getDB()->query("SELECT * FROM users WHERE email=:email");
        $this->getDB()->bind(':email',$email);
        return $this->getDB()->singleSet();
    }

    public function insertUser($name,$email,$password)
    {
        $password = password_hash($password,PASSWORD_BCRYPT);
        $this->getDB()->query("INSERT INTO users (name,email,password) VALUES (:name,:email,:password)");
        $this->getDB()->bind(":name",$name);
        $this->getDB()->bind(":email",$email);
        $this->getDB()->bind(":password",$password);
        return $this->getDB()->execute();
    }

}