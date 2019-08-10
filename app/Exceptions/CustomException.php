<?php

namespace App\Exceptions;

use Exception;

abstract class CustomException extends Exception
{
    abstract protected static function show();
}
