<?php

namespace App\Exceptions;

use Exception;
use Throwable;

class InvalidIdExceptins extends Exception
{
    protected $id;

    public function __construct($id, $message = "", $code = 400, Throwable $previous = null)
    {
        $this->id = $id;
        parent::__construct($message, $code, $previous);
    }

    public function getId()
    {
        return $this->id;
    }
}
