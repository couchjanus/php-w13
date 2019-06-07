<?php

// regexp.preg.match.any.test.php

$routes = [
  'contact' => 'ContactController@index',
  'about' => 'AboutController@index',
  'blog' => 'BlogController@index',
  'guest' => 'GuestbookController@index',

  'admin' => 'Admin\DashboardController@index',
  'admin/categories' => 'Admin\CategoryController@index',
  'admin/categories/create' => 'Admin\CategoryController@create',

  'admin/categories/create/1' => 'Admin\CategoryController@create',

  'admin/products' => 'Admin\ProductController@index',
  'admin/products/create' => 'Admin\ProductController@create',
  //Главаня страница
  'index.php' => 'HomeController@index',
  '' => 'HomeController@index',
];

// Операторы [] и ()

// Оператор [] используется для группировки нескольких символов вместе.

// Текст: “Не могу перевести I dont know, помогите!”
// Надо получить весь английский текст.


// Тут мы собрали в группу (между символами []) все латинские буквы и пробел.

// RegExp: “/[A-Za-z\s]{2,}/”

// При помощи {} указали, что нас интересуют вхождения, где минимум 2 символа, чтобы исключить вхождения из пустых пробелов.

// Аналогично мы могли бы получить все русские слова, сделав инверсию: “[^A-Za-z\s]{2,}”.

$test = "Не могу перевести I dont know, помогите!";

if (preg_match("/[A-Za-z\s]{2,}/", $test, $match)) {
    echo "+ Найдено '{$match[0]}'\n";
} else {
    echo "- Ничего не найдено\n";
}

$regexp = "/р[а-яё]{3,}й/ui";

// строки, к которым мы будем по очереди применять регулярку
$lines = [
  'рыжий кот',
  'рыжий крот',
  'дикий кіт',
  'рудий кіт',
  'клята дзиґа',
  'blaha muha'
];

foreach ($lines as $line) {
    echo "Строка: $line\n";

    // сюда будет помещено первое
    // совпадение с шаблоном
    $match = [];
    if (preg_match($regexp, $line, $match)) {
        echo "+ Найдено слово '{$match[0]}'\n";
    } else {
        echo "- Ничего не найдено\n";
    }
}

$uri = 'admin/categories/create/12';

foreach ($routes as $key => $val) {
    $pattern = '%^[a-zA-Z\/]+/\d+$%';
    if (preg_match($pattern, $uri, $matches)){
      var_dump(
          $matches[0]
      );
      break;
    }
}

// В отличие от [], символы () собирают отмеченные выражения. Их иногда называют “захватом”.

// Они нужны для того, чтобы передать выбранный кусок (который, возможно, состоит из нескольких вхождений [] в результат выдачи).

// Текст: ‘Email you sent was ololo@example.com Is it correct?’
// Нам надо выбрать email.

// Мы выбираем все, что не пробел (потому что первая часть email может содержать любой набор символов), далее должен идти символ @, далее что угодно, кроме точки и пробела, далее точка, далее любой символ латиницы в нижнем регистре…

// выбираем все, что не пробел: “[^\s]+”
// выбираем знак @: “@”
// выбираем что угодно, кроме точки и пробела: “[^\s\.]+”
// выбираем точку: “\.” (обратный слеш нужен для экранирования метасимвола, так как знак точки описывает любой символ)
// выбираем любой символ латиницы в нижнем регистре: “[a-z]+”

// Результат работы preg_match:
$text = "Email you sent was ololo@example.com. Is it correct?";
$regexp = "/[^\s]+@[^\s\.]+\.[a-z]+/";
$result = preg_match_all($regexp, $text, $match);
var_dump(
    $result,
    $match
);

// если теперь надо по отдельности получить домен и имя по email? И как-то использовать дальше в коде?

// Вот тут нам поможет “захват”. Мы просто выбираем, что нам нужно, и оборачиваем знаками (), как в примере:

// Было:
// /[^\s]+@[^\s\.]+\.[a-z]+/

// Стало:
// /([^\s]+)@([^\s\.]+\.[a-z]+)/

$text = "Email you sent was ololo@example.com. Is it correct?";
$regexp = "/([^\s]+)@([^\s\.]+\.[a-z]+)/";
$result = preg_match_all($regexp, $text, $match);
var_dump(
    $result,
    $match
);
