<?php
session_start();
use App\Classes\Session;
use App\Classes\DataBase;

define("APPROOT" ,realpath(__DIR__ .'/../'));
define("URLROOT",'http://localhost:8080/MYSHOP/public/');

require_once APPROOT .'/vendor/autoload.php';
require_once APPROOT . '/app/config/_env.php';

new DataBase();
require_once APPROOT . '/app/routing/router.php';

