<?php

namespace App\Exceptions;

use App\Exceptions\CustomException;

class NotAdminException extends CustomException
{
    public static function show()
    {
        return view('exception.exception', ['message' => 'Nie masz uprawnień administratora']);
    }
}
