<?php 

         #admin Route
         $router->map('GET','/admin','App\Controllers\AdminController@login','Admin Login Route');
         $router->map('POST','/admin','App\Controllers\AdminController@checkLogin','Admin post Login Route');
         $router->map('GET','/admin/logout','App\Controllers\AdminController@logout','Admin logout Route');
         $router->map('GET','/admin/home','App\Controllers\AdminController@home','Admin Route');
         $router->map('GET','/admin/create-admin','App\Controllers\AdminController@adminCreate','Admin-create Route');
         $router->map('POST','/admin/create-admin','App\Controllers\AdminController@adminCreatePost','Admin-create post Route');

         #admin category route
         $router->map('GET','/admin/category','App\Controllers\CategoryController@index','category Route');
         $router->map('GET','/admin/category/create','App\Controllers\CategoryController@index','GET Create Route');
         $router->map('POST','/admin/category/create','App\Controllers\CategoryController@create','Create Route');
         $router->map('GET','/admin/category/delete/[i:id]','App\Controllers\CategoryController@delete','Delete Route');
         $router->map('POST','/admin/category/update/','App\Controllers\CategoryController@update','Update Route');
         #admin product route
         $router->map('GET','/admin/product/create','App\Controllers\ProductController@index','product Route');
         $router->map('POST','/admin/product/create','App\Controllers\ProductController@create','product Create Route');
         #admin product-detail route
         $router->map('GET','/admin/product/detail','App\Controllers\ProductDetailController@detail','product-detail Route');
         $router->map('GET','/admin/product/edit/[i:id]','App\Controllers\ProductDetailController@edit','product-edit Route');
         $router->map('POST','/admin/product/update','App\Controllers\ProductDetailController@update','product-update Route');
         $router->map('GET','/admin/product/delete/[i:id]','App\Controllers\ProductDetailController@delete','product-delete Route');
         $router->map('GET','/admin/product/view','App\Controllers\ProductDetailController@view','product-view Route');
         $router->map('GET','/admin/product/view/delete/[i:id]','App\Controllers\ProductDetailController@viewDelete','product-delete view Route');
         $router->map('GET','/admin/product/product/[i:id]','App\Controllers\ProductDetailController@product','Arrange-Product Route');
         $router->map('GET','/admin/product/detail-delete/[i:id]','App\Controllers\ProductDetailController@detailDelete','delete detail-Product Route');
         
         #message
         $router->map('GET','/admin/message','App\Controllers\AdminController@msg','msg Route');
         #orders
         $router->map("GET",'/admin/orders','App\Controllers\AdminController@orders','order Route');
         $router->map("POST",'/admin/orders','App\Controllers\AdminController@postOrders','order-post Route');
         $router->map("GET",'/admin/orders-ready','App\Controllers\AdminController@orderReadyList','order-ready Route');
         $router->map("POST",'/admin/orders-ready','App\Controllers\AdminController@orderReadyListPost','order-ready-post Route');
         $router->map("GET",'/admin/deleteOrder/[i:id]','App\Controllers\AdminController@deleteOrder','delete-order Route');