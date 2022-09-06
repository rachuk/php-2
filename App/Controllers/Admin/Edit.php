<?php

namespace App\Controllers\Admin;

use App\Controller;
use App\Models\Article;
use SebastianBergmann\Timer\ResourceUsageFormatter;

class Edit extends Controller
{
    public function action()
    {
        if (isset($_POST['title']) || isset($_POST['content'])) {
            $this->view->article = Article::findById($_POST['id']);
            $this->view->article->title = $_POST['title'];
            $this->view->article->content = $_POST['content'];
            $this->view->article->author_id= $_POST['author'];
            $this->view->article->save();

            header('Location: /admin/');
        } else {
            $this->view->article = Article::findById($_GET['id']);
        }

        $this->view->resourceUsageFormatter = new ResourceUsageFormatter();
        $this->view->timer = $this->timer;
        $this->view->display(__DIR__ . '/../../../templates/admin/edit.php');
    }
}