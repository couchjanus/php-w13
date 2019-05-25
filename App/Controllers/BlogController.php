<?php

$posts = include_once MODELS.'Post.php';

// число элементов в массиве можно вычислить при помощи функции count():

// for ($i = 1; $i <= count($posts); $i++)
// {
//     var_dump($posts[$i]);
// }

$data = [
    'postCount' =>  count($posts),
    'posts' => $posts
];


require_once VIEWS.'blog/index.php';