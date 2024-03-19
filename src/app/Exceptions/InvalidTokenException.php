<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class InvalidTokenException
 *
 * @author Mahammad Mammadov <muhammed.mammadov.89@gmail.com>
 */
class InvalidTokenException extends Exception
{
    /**
     * InvalidTokenException constructor.
     */
    public function __construct()
    {
        parent::__construct(__('passwords.token'), Response::HTTP_BAD_REQUEST);
    }
}
