<?php

namespace App\Exceptions;

use Exception;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class AlreadyDislikedTrueException
 *
 * @author Fuad Bayramli <fuadbayramli94@gmail.com>
 */
class AlreadyDislikedTrueException extends Exception
{
    public function __construct()
    {
        parent::__construct(__('messages.already_disliked_true'), Response::HTTP_OK);
    }
}
