<?php

use App\Controllers\Errors\DbConnectionController;
use App\Controllers\Errors\NotFoundController;
use App\Controllers\Errors\SqlErrorController;
use App\Exceptions\DbConnectionException;
use App\Exceptions\NotFoundException;
use App\Exceptions\SqlException;

require __DIR__ . '/../App/autoload.php';

$parts = explode('/', $_SERVER['REQUEST_URI']);
$ctrl1 = $parts[1] ? ucfirst($parts[1]) : 'Index';

if (isset($parts[2])) {
    $ctrl2 = ucfirst($parts[2]);
    $class = '\App\Controllers\\' . $ctrl2;
} else {
    $class = '\App\Controllers\\' . $ctrl1;
}

$logger = new \App\Logger();
try {
    $ctrl = new $class;
    $ctrl();
} catch (SqlException | \PDOException $e) {
    $logger->log($e);
    $errorController = new SqlErrorController();
    $errorController->action();
} catch (NotFoundException $e) {
    $logger->log($e);
    $errorController = new NotFoundController();
    $errorController->action();
} catch (DbConnectionException $e) {
    $logger->log($e);
    $errorController = new DbConnectionController();
    $errorController->action();
}


