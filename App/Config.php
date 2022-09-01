<?php

namespace App;

class Config
{
    public $data = [];
    private static $instance;

    private function __construct()
    {
        $this->data = (include __DIR__ . '/../config.php');
    }

    public static function getInstance()
    {
        if (static::$instance == null) {
            static::$instance = new Config();
        }

        return static::$instance;
    }
}