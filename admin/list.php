<?php

require __DIR__ . '/../autoload.php';

$article = new \App\Models\Article();
$view = new \App\View();

$view->set('news', $article::findAll());
$view->display(__DIR__ . '/templates/list.php');
