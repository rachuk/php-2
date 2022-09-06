<?php

namespace App;

class Logger
{
    public string $fileName = '';

    public function __construct()
    {
        $this->fileName = __DIR__.'/../log.txt';
    }

    /**
     * @param \Throwable $ex Исключение
     */
    public function log(\Throwable $ex)
    {
        $content = $ex->getMessage() . PHP_EOL
            . 'Дата: ' . date("d . m . y") . PHP_EOL
            . 'Файл: ' . $ex->getFile() . PHP_EOL
            . 'Строка: ' . $ex->getLine() . PHP_EOL;

        file_put_contents($this->fileName, $content, FILE_APPEND);
    }
}