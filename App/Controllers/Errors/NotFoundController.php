<?php

namespace App\Controllers\Errors;

use App\View;
use JetBrains\PhpStorm\Internal\LanguageLevelTypeAware;

class NotFoundController extends \Exception
{
    protected $view;

    public function action()
    {
        $this->view = new View();
        $this->view->error = 'Ошибка 404 - не найдено';
        $this->view->display(__DIR__ . '/../../../Templates/error.php');
    }
}