<?php

require __DIR__ . '/autoload.php';

if (isset($_GET['id'])) {
    $id  = $_GET['id'];
} else {
    header('location: /php-2/index.php');
}

$view = new \App\View();

$view->article = \App\Models\Article::findById($id);
$view->display(__DIR__ . '/templates/article.php');
