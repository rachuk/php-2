<?php

function myAutoload($className)
{
    require __DIR__ . '/' . str_replace('\\', '/', $className) . '.php';
}

spl_autoload_register('myAutoload');