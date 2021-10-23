<?php 
 
  namespace App\Routing;
  class RouteDispatcher{  
     /**
      * @param $match 
      * @param $controller
      *@param $method 
      */
      private  $match;
      private  $controller;
      private $method;

      public function __construct(\AltoRouter $router){
          $this->match = $router->match();
          list($controller,$method) = explode("@",$this->match['target']);
           $this->controller = $controller;
           $this->method = $method;
            if(is_callable([ $this->controller, $this->method])){
               call_user_func_array([ new $this->controller, $this->method],$this->match['params']);
            }else{
                echo 'not callable';
            }
        
      }
  }
