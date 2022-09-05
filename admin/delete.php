<?php

use App\Models\Article;

require __DIR__ . '/../autoload.php';

if (isset($_POST['id']) && is_numeric($_POST['id'])) {
    $article = Article::findById($_POST['id']);

    if (!empty($article)) {
        $article->delete();
    }
    header('Location: list.php');
    exit;
} else {
    echo 'Статьи не существует!';
}