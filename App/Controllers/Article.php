<?php

namespace App\Controllers;

use App\Controller;

class Article extends Controller
{

//    protected function access(): bool
//    {
//        return isset($_GET['name']) && 'Vasya' == $_GET['name'];
//    }

    public function action()
    {
        if (isset($_GET['id'])) {
            $id  = $_GET['id'];
        } else {
            header('location: /php-2/index.php');
        }

        $this->view->article = \App\Models\Article::findById($id);
        $this->view->display(__DIR__ . '/../../templates/article.php');
    }
}