<?php

// regexp.routes.test.php

// В PHP можно именовать “захваты”, используя следующий синтаксис:

// /(?<mail>[^\s]+)@(?<domain>[^\s\.]+\.[a-z]+)/

// Тогда массив $match станет ассоциативным:

$text = "Email you sent was ololo@example.com. Is it correct?";
$regexp = "/(?<mail>[^\s]+)@(?<domain>[^\s\.]+\.[a-z]+)/";
$result = preg_match_all($regexp, $text, $match);
var_dump(
    $result,
    $match
);

// Парсим письмо в поисках нового пароля:

// Есть письмо с HTML-кодом, надо выдернуть из него новый пароль. Текст может быть либо на английском, либо на русском:

// Текст: “пароль: <b>f23f43tgt4</b>” или “password: <b>wh4k38f4</b>”
// RegExp: “(password|пароль):\s<b>([^<]+)<\/b>”

// Сначала мы говорим, что текст перед паролем может быть двух вариантов, использовав “или”.

// (password|пароль)

// Далее у нас знак двоеточия и один пробел:

// :\s

// Далее знак тега b:

// <b>

// А дальше нас интересует все, что не символ “<”, поскольку он будет свидетельствовать о том, что тег b закрывается:

// ([^<]+)

// Мы оборачиваем его в захват, потому что именно он нам и нужен.
// Далее мы пишем закрывающий тег b, проэкранировав символ “/”, так как это спецсимвол:

// <\/b>


// Парсим URL:

// В PHP есть функция, которая помогает работать с урлом, разбирая его на составные части:

$URL = "https://hello.world.ru/uri/starts/here?get_params=here#anchor";
$parsed = parse_url($URL);
var_dump($parsed);

// сделаем то же самое, только регуляркой

// Любой урл начинается со схемы. Для нас это протокол http/https. Можно было бы сделать логическое “или”:

// (http|https)

// Но можно схитрить и сделать вот так:

// http[s]?

// В данном случае символ “?” означает, что “s” может есть, может нет…

// Далее у нас идет “://”, но символ “/” нам придется экранировать (см. выше):

// “:\/\/”

// Далее у нас до знака “/” или до конца строки идет домен. Он может состоять из цифр, букв, знака подчеркивания, тире и точки:

// [\w\.-]+

// Тут мы собрали в единую группу метасимвол “\w”, точку ”\.” и тире ”-”.

// Далее идет URI. Тут все просто, мы берем все до вопросительного знака или конца строки:

// [^?$]+

// Теперь знак вопроса, который может быть, а может не быть:

// [?]?

// Далее все до конца строки или начала якоря (символ #) — не забываем о том, что этой части тоже может не быть:

// [^#$]+

// Далее может быть #, а может не быть:

// [#]?

// Дальше все до конца строки, если есть:

// [^$]+

// в итоге выглядит так:

// /(?<scheme>http[s]?):\/\/(?<domain>[\w\.-]+)(?<path>[^?$]+)?(?<query>[^#$]+)?[#]?(?<fragment>[^$]+)?/

$URL = "https://hello.world.ru/uri/starts/here?get_params=here#anchor";
$regexp = "/(?<scheme>http[s]?):\/\/(?<domain>[\w\.-]+)(?<path>[^?$]+)?(?<query>[^#$]+)?[#]?(?<fragment>[^$]+)?/";
$result = preg_match($regexp, $URL, $match);
var_dump(
    $result,
    $match
);


$key="edit/{id}";
// var_dump(preg_replace("/{([a-zA-Z]+)}/", "$0", $key));

// var_dump(preg_replace("/{([a-zA-Z]+)}/", "#$1#", $key));

// var_dump(preg_replace("/{([a-zA-Z]+)}/", "?#$1#", $key));

// var_dump(preg_replace("/{([a-zA-Z]+)}/", "(?#$1#)", $key));

// var_dump(preg_replace('/{([a-zA-Z]+)}/', "(?'$1'11)", $key));

// ================================
// $pattern = "@^" .preg_replace('/{([a-zA-Z]+)}/', "(?P<$1>11)", $key). "$@";
// var_dump($pattern);
// preg_match($pattern, 'edit/11', $matches);
// var_dump($matches);
// ================================
// $pattern = "@^" .preg_replace('/{([a-zA-Z]+)}/', '(?<$1>)', 'edit/{id}'). "$@";
// var_dump($pattern);
// preg_match($pattern, 'edit/', $matches);
// var_dump($matches);
// =========================================

// $uri = 'admin/categories/edit/11';
// $key = 'admin/categories/edit/{id}';

// $pattern = "@^" .preg_replace('/{([a-zA-Z]+)}/', '(?<$1>[0-9]+)', $key). "$@";
// var_dump($pattern);
// $result = preg_match($pattern, $uri, $matches);

// print_r("result: ".$result);
// print_r("\n\nmatches: ");
// var_dump($matches);

// =========================================
// $uri = 'admin/posts/edit/bala11';
// $key = 'admin/posts/edit/{id}';

// $pattern = "@^" .preg_replace('/{([a-zA-Z0-9\_\-]+)}/', '(?<$1>[a-zA-Z0-9\_\-]+)', $key). "$@";

// $result = preg_match($pattern, $uri, $matches);

// print_r("result: ".$result);
// print_r("\n\nmatches: ");
// var_dump($matches);

// $subject = "Email, you sent was - bla-ha__2018@muha.com! Is it correct?";
// var_dump($subject);

// Замена не алфавитных символов на разделитель
// var_dump(preg_replace('/[^\pL]+/u', '-', $subject));
// var_dump(preg_replace('/[^\p{L}]+/u', '-', $subject));

// Замена не алфавитно-цифровых символов на разделитель
// $subject = preg_replace('/[^\p{L}\p{Nd}]+/u', '-', $subject);
// var_dump($subject);

// Убираем дубли разделителей
// $subject = preg_replace('/(' . preg_quote('-', '/') . '){2,}/', '$1', $subject);
// var_dump($subject);
