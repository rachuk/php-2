<?php

namespace App;

use App\View;

abstract class Controller
{
    protected $view;

    public function __construct()
    {
        $this->view = new View();
    }

    protected function access(): bool
    {
        return true;
    }

    public function __invoke()
    {
        if ($this->access()) {
            $this->action();
        } else {
            die('Доступ закрыт');
        }
    }

    abstract protected function action();
}