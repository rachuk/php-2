<?php

namespace App\Controllers\Errors;

use App\View;

class DbConnectionController extends \Exception
{
    protected $view;

    public function action()
    {
        $this->view = new View();
        $this->view->error = 'Нет подключения к базе';
        $this->view->display(__DIR__ . '/../../../templates/error.php');
    }
}