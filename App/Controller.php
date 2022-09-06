<?php

namespace App;

use SebastianBergmann\Timer\Timer;

abstract class Controller
{
    protected $view;
    protected Timer $timer;

    public function __construct()
    {
        $this->view = new View();
        $this->timer= new Timer();
        $this->timer->start();
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