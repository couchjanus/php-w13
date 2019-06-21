<?php

// return [
//    'contact' => 'ContactController@index',
//    'about' => 'AboutController@index',
//    'blog' => 'BlogController@index',
//    'guest' => 'GuestbookController@index',
//    '404' => 'PagesController@notFound',
//    'api/shop'=> 'HomeController@getProducts',

//    'api/detail/{id}' => 'HomeController@getProduct',
//    'api/check' => 'AuthController@loggedCheck',
//    'api/cart' => 'OrderController@cart',

//    'product-detail/{id}'=> 'HomeController@getProduct',

//    'admin' => 'Admin\DashboardController@index',
//    'admin/categories' => 'Admin\CategoryController@index',
//    'admin/categories/create' => 'Admin\CategoryController@create',
//    'admin/categories/edit/{id}' => 'Admin\CategoryController@edit',
//    'admin/categories/delete/{id}' => 'Admin\CategoryController@delete',

//    'admin/products' => 'Admin\ProductController@index',
//    'admin/products/create' => 'Admin\ProductController@create',
//    'admin/products/edit/{id}' => 'Admin\ProductController@edit',
//    'admin/products/delete/{id}' => 'Admin\ProductController@delete',
//    'admin/products/show/{id}' => 'Admin\ProductController@show',


//    'admin/roles' => 'Admin\RoleController@index',
//    'admin/roles/create'  => 'Admin\RoleController@create',
//    'admin/roles/edit/{id}' => 'Admin\RoleController@edit',
//    'admin/roles/delete/{id}' => 'Admin\RoleController@delete',
   
//    'admin/users' => 'Admin\UserController@index',
//    'admin/users/create' => 'Admin\UserController@create',
//    'admin/users/edit/{id}' => 'Admin\UserController@edit',
//    'admin/users/delete/{id}' => 'Admin\UserController@delete',
   
//    'admin/orders' => 'Admin\OrderController@index',
//    'admin/orders/create' => 'Admin\OrderController@create',
//    'admin/orders/edit/{id}' => 'Admin\OrderController@edit',
//    'admin/orders/delete/{id}' => 'Admin\OrderController@delete',
   
//    'register' => 'AuthController@signup',
//    'login' => 'AuthController@signin',
//    'logout' => 'AuthController@logout',
   
//    'profile' => 'ProfileController@index',
//    'profile/edit' => 'ProfileController@edit',
//    'profile/orders' => 'ProfileController@ordersList',

//    'profile/orders/view/{id}' => 'ProfileController@ordersView',
//    'profile/orders/edit/{id}' => 'ProfileController@ordersEdit',
//    'profile/orders/delete/{id}' => 'ProfileController@ordersDelete',

   
//    //Главаня страница
//    'index.php' => 'HomeController@index',
//    '' => 'HomeController@index',
// ];

$router->get('', 'HomeController@index');
$router->get('api/shop', 'HomeController@getProducts');
$router->get('api/detail/{id}', 'HomeController@getProduct');
$router->get('api/check', 'AuthController@loggedCheck');
$router->post('api/cart', 'OrderController@cart');

$router->get('about', 'AboutController@index');
$router->get('contact', 'ContactController@index');
$router->get('guestbook', 'GuestbookController@index');

$router->get('blog', 'BlogController@index');
$router->get('blog/{slug}', 'BlogController@show');
$router->get('blog/page-{page}', 'BlogController@index');
$router->post('blog/search', 'BlogController@search');


$router->get('404', 'PagesController@notFound');


$router->get('admin', 'Admin\DashboardController@index');
$router->get('admin/products', 'Admin\ProductController@index');
$router->get('admin/products/create', 'Admin\ProductController@create');
$router->post('admin/products/save', 'Admin\ProductController@save');
$router->get('admin/products/edit/{id}', 'Admin\ProductController@edit');
$router->post('admin/products/edit/{id}', 'Admin\ProductController@edit');
$router->get('admin/products/delete/{id}', 'Admin\ProductController@delete');
$router->post('admin/products/delete/{id}', 'Admin\ProductController@delete');
$router->get('admin/products/show/{id}', 'Admin\ProductController@show');


$router->get('admin/categories', 'Admin\CategoryController@index');
$router->get('admin/categories/create', 'Admin\CategoryController@create');
$router->post('admin/categories/create', 'Admin\CategoryController@create');
$router->get('admin/categories/edit/{id}', 'Admin\CategoryController@edit');
$router->post('admin/categories/edit/{id}', 'Admin\CategoryController@edit');
$router->get('admin/categories/delete/{id}', 'Admin\CategoryController@delete');
$router->post('admin/categories/delete/{id}', 'Admin\CategoryController@delete');

$router->get('admin/posts', 'Admin\PostController@index');
$router->get('admin/posts/create', 'Admin\PostController@create');
$router->get('admin/posts/edit/{id}', 'Admin\PostController@edit');
$router->get('admin/posts/delete/{id}', 'Admin\PostController@delete');
$router->post('admin/posts/create', 'Admin\PostController@store');
$router->post('admin/posts/update/{id}', 'Admin\PostController@update');
$router->post('admin/posts/delete/{id}', 'Admin\PostController@delete');

$router->get('admin/roles', 'Admin\RoleController@index');
$router->get('admin/roles/create', 'Admin\RoleController@create');
$router->post('admin/roles/create', 'Admin\RoleController@save');

$router->get('admin/roles/edit/{id}', 'Admin\RoleController@edit');
$router->get('admin/roles/delete/{id}', 'Admin\RoleController@delete');

$router->post('admin/roles/edit/{id}', 'Admin\RoleController@edit');
$router->post('admin/roles/delete/{id}', 'Admin\RoleController@delete');

$router->get('admin/users', 'Admin\UserController@index');
$router->get('admin/users/create', 'Admin\UserController@create');
$router->post('admin/users/create', 'Admin\UserController@create');

$router->get('admin/users/edit/{id}', 'Admin\UserController@edit');
$router->post('admin/users/edit/{id}', 'Admin\UserController@edit');

$router->get('admin/users/delete/{id}', 'Admin\UserController@delete');
$router->post('admin/users/delete/{id}', 'Admin\UserController@delete');


$router->get('admin/orders', 'Admin\OrderController@index');

$router->get('admin/orders/create', 'Admin\OrderController@create');

$router->get('admin/orders/edit/{id}', 'Admin\OrderController@edit');
$router->post('admin/orders/edit/{id}', 'Admin\OrderController@update');

$router->get('admin/orders/delete/{id}', 'Admin\OrderController@delete');
$router->post('admin/orders/create', 'Admin\OrderController@create');

$router->post('admin/orders/delete/{id}', 'Admin\OrderController@delete');


$router->get('auth', 'AuthController@signup');
$router->post('register', 'AuthController@signup');

$router->get('login', 'AuthController@signin');
$router->post('login', 'AuthController@signin');
$router->get('logout', 'AuthController@logout');
$router->post('logout', 'AuthController@logout');

$router->get('profile', 'ProfileController@index');
$router->get('profile/edit', 'ProfileController@edit');
$router->post('profile/edit', 'ProfileController@edit');

$router->get('profile/orders', 'ProfileController@ordersList');

$router->get('profile/orders/view/{id}', 'ProfileController@ordersView');
$router->get('profile/orders/edit/{id}', 'ProfileController@ordersEdit');
$router->get('profile/orders/delete/{id}', 'ProfileController@ordersDelete');
