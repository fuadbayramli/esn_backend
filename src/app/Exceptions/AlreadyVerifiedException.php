<?php

namespace App\Exceptions;

use Exception;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class AlreadyVerifiedException
 *
 * @author Fuad Bayramli <fuadbayramli94@gmail.com>
 */
class AlreadyVerifiedException extends Exception
{
    public function __construct()
    {
        parent::__construct(__('messages.already_verified'), Response::HTTP_BAD_REQUEST);
    }
}
