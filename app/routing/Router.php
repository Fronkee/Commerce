<?php 

use App\Routing\RouteDispatcher;

class Router{
    public function __construct()
    {
        self::route();
    }
    public static function route(){
        /**
         * Altorouter/Altorouter in packagist
         */
        $router = new AltoRouter();
        $router->setBasePath('/myshop/public');

        #default Route
        $router->map('GET','/','App\Controllers\IndexController@index','Index Route');
     
        require_once 'admin_route.php';
        require_once 'user_route.php';
      


        #call RouteDispatcher
         new RouteDispatcher($router);
    }
}


