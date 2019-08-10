<?php

namespace App\Exceptions;

use Exception;

class UserNotFoundException extends CustomException
{
    public static function show()
    {
        return view('exception.exception', ['message' => 'Brak użytkownika']);
    }
}
