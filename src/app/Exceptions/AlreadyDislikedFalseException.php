<?php

namespace App\Exceptions;

use Exception;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class AlreadyDislikedFalseException
 *
 * @author Fuad Bayramli <fuadbayramli94@gmail.com>
 */
class AlreadyDislikedFalseException extends Exception
{
    public function __construct()
    {
        parent::__construct(__('messages.already_disliked_false'), Response::HTTP_CREATED);
    }
}
