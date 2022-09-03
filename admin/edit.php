<?php

use App\Models\Article;

require __DIR__ . '/../autoload.php';

if (isset($_POST['title']) || isset($_POST['content']) || isset($_POST['author'])) {
    $article = Article::findById($_POST['id']);
    $article->title = $_POST['title'];
    $article->content = $_POST['content'];
    $article->author->name = $_POST['author'];
    $article->save();

    header('Location: list.php');
} else {
    $article = Article::findById($_GET['id']);
}

include __DIR__ . '/templates/edit.php';