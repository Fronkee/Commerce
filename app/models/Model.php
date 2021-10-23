<?php

namespace App\Models;

use App\Classes\DataBase;

class Model{
    private $db;
   
    public function __construct()
    {
        $this->db = new DataBase();
    }
   public function getDB(){
      return $this->db;
   }
    /**
     * Get all Database 
     * all for one method
     */
    public function all($table,$con = '')
    {
       if(empty($con)){
        $this->db->query('SELECT * FROM '. $table .' ORDER BY name DESC');
        return  $this->db->multipleSet();
       }else{
        $this->db->query('SELECT * FROM '. $table );
        return  $this->db->multipleSet();
       }
    
    }
    /**
     * get by id and table name
     * all for one method
     */
    public function getById($table,$id)
    {
      $this->db->query("SELECT * FROM ".$table." WHERE id=:id");
      $this->db->bind(":id",$id);
      return $this->db->singleSet() ? $this->db->singleSet() :false;
    }
    /**
     * check Value from Database
     * all for one method
     */
    public function exit($table,$value)
    {      
       if(is_string($value)){
        $this->db->query("SELECT * FROM ".$table." WHERE name=:name");
        $this->db->bind(":name",$value);
        return $this->db->singleSet() ? $this->db->singleSet():false;
        }elseif(is_int($value)){
          //value is integer
          $this->db->query("SELECT * FROM ".$table." WHERE id=:id");
          $this->db->bind(":id",$value);
          return $this->db->singleSet() ? $this->db->singleSet() :false;
        }
    }
      
    /**
     * check email exit
     */
    public function emailExit($table,$value){
        $this->db->query("SELECT * FROM ".$table." WHERE email=:email");
        $this->db->bind(":email",$value);
        return $this->db->singleSet() ? $this->db->singleSet():false;
    }
   /**
    * Delete Value From Database
    * all for one method
    */
   public function destroy($table,$id)
   {
     $this->db->query("Delete From ". $table ." WHERE id=:id");
     $this->db->bind(':id',$id);
     return $this->db->execute();
   }
    /**
     * Input Value To Database
     * need two @param for table
     */
   public function insert($table,$name)
   {
    $this->db->query("INSERT INTO ". $table ." (name) VALUES (:name)");
      $this->db->bind(':name',$name);
     return  $this->db->execute();
   }

   /**
    *update value From Database 
     * need three @param for table
     */ 
   public function update($table,$name,$id)
   {
      $this->db->query("UPDATE ". $table . " SET name=:name WHERE id=:id");
      $this->db->bind(":name",$name);
      $this->db->bind(":id",$id);
      return $this->db->execute();
   }

   //for product table
   public function insertProudct($table,$cat_id,$name,$price,$image,$description)
   {
      $this->db->query("INSERT INTO ". $table ."( cat_id,name,price,image,description )VALUES (:cat_id,:name,:price,:image,:description)");
      $this->db->bind(':cat_id',$cat_id);    
      $this->db->bind(':name',$name); 
      $this->db->bind(':price',$price); 
      $this->db->bind(':image',$image); 
      $this->db->bind(':description',$description);   
      return $this->db->execute();               
   }

   //update product table
   public function updateProduct($table,$id,$cat_id,$name,$price,$img,$desc)
  {
        $this->db->query("UPDATE ". $table . " SET cat_id=:cat_id,name=:name,price=:price,
                     image=:image,description=:description WHERE id=:id");
        $this->db->bind(":cat_id",$cat_id);
        $this->db->bind(":name",$name);
        $this->db->bind(":price",$price);
        $this->db->bind(":image",$img);
        $this->db->bind(":description",$desc);
        $this->db->bind(":id",$id);
      return $this->db->execute();
  }

  public function productByCatId($table,$id,$start,$end)
  {
   /**
    * @$table for table name
    * @$id for category id
    * @start for pagination
    * @end for ending point
    */
      $this->db->query("SELECT * FROM ". $table . " WHERE cat_id=:cat_id LIMIT $start,$end ");
      $this->db->bind(':cat_id',$id);
      return $this->db->multipleSet();
  }
 
  public function Count($table,$id = '')
  {
     if(empty($id))
     {
      $this->db->query('SELECT * FROM ' . $table);
      $this->db->execute();
      return  $this->db->rowCount();
     }else{
      $this->db->query('SELECT * FROM ' . $table ." WHERE cat_id=:cat_id");
      $this->db->bind(':cat_id',$id);
      $this->db->execute();
      return  $this->db->rowCount();
     }
  }

  public function pagination($table,$start,$end,$con = '')
  {
    /**
     * @table  for tablename
     * @start  for paginatio
     * @end    for ending mark
     */
    if(empty($con)){
      $this->db->query("SELECT * FROM ". $table ." ORDER BY name DESC LIMIT $start,$end ");
      return  $this->db->multipleSet();
     }else{
      $this->db->query("SELECT * FROM ". $table ." LIMIT $start,$end " );
      return  $this->db->multipleSet();
     }
  }
 
}