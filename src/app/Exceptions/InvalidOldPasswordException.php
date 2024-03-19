<?php

namespace App\Exceptions;

use Exception;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class InvalidPasswordException
 *
 * @author Fuad Bayramli <fuadbayramli94@gmail.com>
 */
class InvalidOldPasswordException extends Exception
{
    /**
     * InvalidOldPasswordException constructor.
     */
    public function __construct()
    {
        parent::__construct(__('passwords.invalid_old_password'), Response::HTTP_BAD_REQUEST);
    }
}
