<?php

require __DIR__ . '/autoload.php';

$lastThree = \App\Models\Article::findLastThree();

$article = new \App\Models\Article();

$article->title = 'Заголовок новости';
$article->content = 'Какой-то текст';

$article->insert();

include __DIR__ . '/templates/news.php';


