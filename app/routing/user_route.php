<?php 
      #user product route
      $router->map('GET','/category/[a:name]','App\Controllers\UserProduct@category','user-product Route');
      $router->map('GET','/product/detail/[i:id]','App\Controllers\UserProduct@detail','user-product-detail Route');
      $router->map('POST','/product/cart','App\Controllers\UserProduct@cart','user-cart Route');
      $router->map('GET','/product/cart','App\Controllers\UserProduct@showCart','user-show-cart Route');
      $router->map('POST','/product/payout','App\Controllers\UserProduct@payout','user-payout Route');

      #check user route
      $router->map('GET','/user/login','App\Controllers\UserController@login','user login Route');
      $router->map('POST','/user/login','App\Controllers\UserController@checkLogin','user-post login Route');
      $router->map('GET','/user/register','App\Controllers\UserController@register','user-register Route');
      $router->map('POST','/user/register','App\Controllers\UserController@checkregister','user-post register Route');
      $router->map('GET','/user/logout','App\Controllers\UserController@logout','user logout Route');
