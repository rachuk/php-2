<?php

namespace App\Controllers\Admin;

use App\Controller;


class Add extends Controller
{
    public function action()
    {
        if (!empty($_POST['title']) && !empty($_POST['content'])) {
            $this->view->article = new \App\Models\Article();
            $this->view->article->title = $_POST['title'];
            $this->view->article->content = $_POST['content'];
            $this->view->article->author_id = $_POST['author_id'];
            $this->view->article->save();

            header('Location: /admin/');
        }

        $this->view->display(__DIR__ . '/../../../templates/admin/add.php');
    }
}