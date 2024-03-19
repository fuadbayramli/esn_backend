<?php

namespace App\Exceptions;

use Exception;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class AlreadyLikedTrueException
 *
 * @author Fuad Bayramli <fuadbayramli94@gmail.com>
 */
class AlreadyLikedTrueException extends Exception
{
    public function __construct()
    {
        parent::__construct(__('messages.already_liked_true'), Response::HTTP_OK);
    }
}
