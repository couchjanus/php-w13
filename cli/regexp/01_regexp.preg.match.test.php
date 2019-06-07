<?php

// 01_regexp.preg.match.test.php

// preg_match ( $pattern, $string, [$matches] ) - проверяет строку на соответствие регулярному выражению. Эта функция возвращает 1 в случае соответствия и 0 - если нет. В случае ошибки эта функция вернет false.

$str = "hello world";

$pattern = "/o/";
// Заметим, что эта функция требует, чтоб регулярное выражение записывалось вместе с разделителями. В качестве разделителей можно, например, использовать /.
$result = preg_match($pattern, $str);

var_dump(
    $result
);

// В этой функции можно указать третий аргумент $matches- массив, в который будут записаны найденные подстроки.

preg_match($pattern, $str, $matches);

// В данном случае в этот массив будут записанные все подстроки найденного совпадения, которые соответствуют сгруппированным частям регулярного выражения
print_r($matches);

var_dump(
    $result,
    $matches
);

// Заметим, что эта функция найдет лишь одно соответствие регулярному выражению. Для того, чтобы найти все соответствия в строке используется preg_match_all ( $pattern, $string, [$matches] )

// preg_match_all

// В PHP разница между preg_match и preg_match_all в том,
// что функция preg_match найдет только первый match и закончит поиск,
// в то время как функция preg_match_all вернет все вхождения.

$text = "hello world";
$regexp = "/o/";
$result = preg_match_all($regexp, $text, $match);

var_dump(
    $result,
    $match
);

$routes = [
  'contact' => 'ContactController@index',
  'about' => 'AboutController@index',
  'blog' => 'BlogController@index',
  'guest' => 'GuestbookController@index',

  'admin' => 'Admin\DashboardController@index',
  'admin/categories' => 'Admin\CategoryController@index',
  'admin/categories/create' => 'Admin\CategoryController@create',
  'admin/products' => 'Admin\ProductController@index',
  'admin/products/create' => 'Admin\ProductController@create',
  //Главаня страница
  'index.php' => 'HomeController@index',
  '' => 'HomeController@index',
];

$uri = 'admin';
// $uri = 'admin/categories';
// $uri = 'admin/categories/create';
// $uri = 'admin/categories/create/1';

// foreach ($routes as $key => $val) {
//     $pattern = '%'.$key.'%';
//     preg_match($pattern, $uri, $matches);
//     var_dump(
//         $matches
//     );
// }

if (array_key_exists($uri, $routes)) {
  var_dump(
      $routes[$uri]
  );
} else {
  foreach ($routes as $key => $val) {
      $pattern = '%'.$key.'%';
      preg_match($pattern, $uri, $matches);
      var_dump(
          $matches
      );
  }
}
