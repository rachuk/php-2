<?php

namespace App\Controllers\Errors;

use App\View;

class SqlErrorController extends \Error
{
    protected $view;

    public function action()
    {
        $this->view = new View();
        $this->view->error = 'Неправильный sql запрос';
        $this->view->display(__DIR__ . '/../../../templates/error.php');
    }
}