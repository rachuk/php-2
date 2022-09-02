<?php

require __DIR__ . '/autoload.php';

$aricle = new \App\Models\Article();
$view = new \App\View();

$view->set('news', $aricle::findAll());
$view->display(__DIR__ . '/templates/news.php');

//$article->id = 39;
//$article->title = 'Заголовок новости new 1001';
//$article->content = 'Какой-то текст 33';
//
//$article->delete();

//include __DIR__ . '/templates/news.php';


