<?php

require __DIR__ . '/../App/autoload.php';

$parts = explode('/', $_SERVER['REQUEST_URI']);
$ctrl1 = $parts[1] ? ucfirst($parts[1]) : 'Index';

if (isset($parts[2])) {
    $ctrl2 = ucfirst($parts[2]);
    $class = '\App\Controllers\\' . $ctrl2;
    $parts = explode('?', $parts[3]);
    $act = $parts[0] ?? 'action';
} else {
    $class = '\App\Controllers\\' . $ctrl1;
    $act = 'handle';
}

$ctrl = new $class;
$ctrl->action($act);

