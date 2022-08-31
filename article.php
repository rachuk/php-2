<?php

require __DIR__ . '/autoload.php';

$id = $_GET['id'];

$article = \App\Models\Article::findById($id);

if (isset($article)) {
    include __DIR__ . '/templates/article.php';
}   else {
    echo 'No news with such id';
}