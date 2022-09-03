<?php

require __DIR__ . '/autoload.php';

if (isset($_GET['id'])) {
    $id  = $_GET['id'];
} else {
    header('location: /php-2/index.php');
}

$view = new \App\View();
$article = new \App\Models\Article();

$view->set('article', $article::findById($id));
$view->display(__DIR__ . '/templates/article.php');



//$article = \App\Models\Article::findById($id);

//if (isset($article)) {
//    include __DIR__ . '/templates/article.php';
//}   else {
//    echo 'No news with such id';
//}