<?php

namespace App\Exceptions;

use Exception;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class InvalidPasswordException
 *
 * @author Mahammad Mammadov <muhammed.mammadov.89@gmail.com>
 */
class InvalidPasswordException extends Exception
{
    /**
     * InvalidPasswordException constructor.
     */
    public function __construct()
    {
        parent::__construct(__('auth.failed'), Response::HTTP_BAD_REQUEST);
    }
}
