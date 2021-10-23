<?php

use App\Classes\CSRFToken;
use App\Classes\DataBase;
use App\Classes\Mail;
use App\Classes\Session;
use App\Classes\UploadFile;
use App\Classes\Validate;
use App\Controllers\IndexController;
use App\Models\CategoryModel;
use App\Models\Model;
use App\Models\ProductModel;

require_once '../bootstrap/init.php';

 new Router();
 $mailer = new Mail();
 $data = [
     'to' => 'drezee2000@gmail.com',
     'to_name'=>'Joe User',
     'subject'=>'I am Testing E-Site',
     'body' => 'You have successfully installed XAMPP on this system! Now you can start using Apache, MariaDB, PHP and other components. You can find more info in the FAQs section or check the HOW-TO Guides for getting started with PHP applications.',
     'filename'=>'mailer'
 ];


 $date =   new Validate();
 $data = [
     'name' =>'',
    //  'email'=> 'mgmsdg@gmail.com'
 ];
 $con = [
    //  'name' => ['minLength' =>'5','requrie'=>true],
     'name' => ['unique' =>'category','minLength' => 4 , 'requrie' => true]
 ];
 $model = new Model();
//  echo $model->Count('products');
//  echo $da;
// format($da);

