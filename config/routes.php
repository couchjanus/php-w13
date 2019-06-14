<?php

return [
   'contact' => 'ContactController@index',
   'about' => 'AboutController@index',
   'blog' => 'BlogController@index',
   'guest' => 'GuestbookController@index',
   '404' => 'PagesController@notFound',
   'api/shop'=> 'HomeController@getProducts',
   'product-detail/{id}'=> 'HomeController@getProduct',

   'admin' => 'Admin\DashboardController@index',
   'admin/categories' => 'Admin\CategoryController@index',
   'admin/categories/create' => 'Admin\CategoryController@create',
   'admin/categories/edit/{id}' => 'Admin\CategoryController@edit',
   'admin/categories/delete/{id}' => 'Admin\CategoryController@delete',

   'admin/products' => 'Admin\ProductController@index',
   'admin/products/create' => 'Admin\ProductController@create',
   'admin/products/edit/{id}' => 'Admin\ProductController@edit',
   'admin/products/delete/{id}' => 'Admin\ProductController@delete',
   'admin/products/show/{id}' => 'Admin\ProductController@show',


   'admin/roles' => 'Admin\RoleController@index',
   'admin/roles/create'  => 'Admin\RoleController@create',
   'admin/roles/edit/{id}' => 'Admin\RoleController@edit',
   'admin/roles/delete/{id}' => 'Admin\RoleController@delete',
   
   'admin/users' => 'Admin\UserController@index',
   'admin/users/create' => 'Admin\UserController@create',
   'admin/users/edit/{id}' => 'Admin\UserController@edit',
   'admin/users/delete/{id}' => 'Admin\UserController@delete',
      
   'register' => 'AuthController@signup',
   'login' => 'AuthController@signin',
   'logout' => 'AuthController@logout',
   
   'profile' => 'ProfileController@index',
   'profile/edit' => 'ProfileController@edit',
   
   //Главаня страница
   'index.php' => 'HomeController@index',
   '' => 'HomeController@index',
];
