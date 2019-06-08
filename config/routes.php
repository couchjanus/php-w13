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

   // 'admin/categories/edit/1' => 'Admin\CategoryController@edit',
   'admin/categories/edit/{id}' => 'Admin\CategoryController@edit',
   'admin/categories/delete/{id}' => 'Admin\CategoryController@delete',
   

   'admin/products' => 'Admin\ProductController@index',
   'admin/products/create' => 'Admin\ProductController@create',

   'admin/products/edit/{id}' => 'Admin\ProductController@edit',
   'admin/products/delete/{id}' => 'Admin\ProductController@delete',
   'admin/products/show/{id}' => 'Admin\ProductController@show',

   //Главаня страница
   'index.php' => 'HomeController@index',
   '' => 'HomeController@index',
];
