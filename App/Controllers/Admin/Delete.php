<?php

namespace App\Controllers\Admin;

use App\Controller;
use App\Models\Article;

class Delete extends Controller
{
    public function action()
    {
        if (isset($_POST['id']) && is_numeric($_POST['id'])) {
            $article = Article::findById($_POST['id']);

            if (!empty($article)) {
                $article->delete();
            }
            header('Location: /admin/');
        }
    }
}