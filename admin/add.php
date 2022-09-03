<?php

namespace App\Models;

require __DIR__ . '/../autoload.php';

if (!empty($_POST['title']) && !empty($_POST['content'])) {
    $article = new Article();
    $article->title = $_POST['title'];
    $article->content = $_POST['content'];
    $article->save();

    header('Location: list.php');
}

include __DIR__ . '/templates/add.php';