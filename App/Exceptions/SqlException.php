<?php

namespace App\Exceptions;

use Throwable;

class SqlException extends \Exception
{
    protected $query;

    public function __construct($query, string $message = "", int $code = 0, Throwable $previous = null)
    {
        $this->query = $query;
        parent:: __construct($message, $code, $previous);
    }

    public function getQuery()
    {
        return $this->query;
    }
}