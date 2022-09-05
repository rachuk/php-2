<?php

require __DIR__ . '/../../App/autoload.php';

$parts = explode('/', $_SERVER['REQUEST_URI']);
$ctrl1 = $parts[1] ? ucfirst($parts[1]) : 'Admin';
$ctrl2 = $parts[2] ? ucfirst($parts[2]) : 'Index';

$class = '\App\Controllers\\' . $ctrl1 . '\\' . $ctrl2;

if (!empty($parts[3])) {
    $lparts = explode('?', $parts[3]);
}

$act = $lparts[0] ?? 'action';

$ctrl = new $class;
$ctrl->action($act);