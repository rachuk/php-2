<?php

namespace App\Controllers\Admin;

use App\Controller;
use SebastianBergmann\Timer\ResourceUsageFormatter;

class Index extends Controller
{
    public function action()
    {
        $this->view->news = \App\Models\Article::findAll();
        $this->view->resourceUsageFormatter = new ResourceUsageFormatter();
        $this->view->timer = $this->timer;
        $this->view->display(__DIR__ . '/../../../templates/admin/list.php');
    }
}