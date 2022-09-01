<?php

require __DIR__ . '/autoload.php';

$article = new \App\Models\Article();

$article->id = 39;
$article->title = 'Заголовок новости new 1001';
$article->content = 'Какой-то текст 33';

$article->delete();

$lastThree = \App\Models\Article::findLastThree();

include __DIR__ . '/templates/news.php';


