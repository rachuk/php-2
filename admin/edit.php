<?php

use App\Models\Article;

require __DIR__ . '/../autoload.php';

//if (isset($_GET['id']) && is_numeric($_GET['id'])) {
//    $article = Article::findById($_GET['id']);
//    if (!empty($article)) {
//        include __DIR__ . '/templates/edit.php';
//    }
//} else {
//    include __DIR__ . '/templates/add.php';
//}

if (isset($_POST['title']) || isset($_POST['content'])) {
    $article = (Article::findById($_POST['id']));
    $article->title = $_POST['title'];
    $article->content = $_POST['content'];
    $article->save();

    header('Location: list.php');
} else {
    $article = (Article::findById($_GET['id']));

}



include __DIR__ . '/templates/edit.php';