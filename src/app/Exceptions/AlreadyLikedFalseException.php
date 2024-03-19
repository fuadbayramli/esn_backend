<?php

namespace App\Exceptions;

use Exception;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class AlreadyLikedFalseException
 *
 * @author Fuad Bayramli <fuadbayramli94@gmail.com>
 */
class AlreadyLikedFalseException extends Exception
{
    public function __construct()
    {
        parent::__construct(__('messages.already_liked_false'), Response::HTTP_CREATED);
    }
}
