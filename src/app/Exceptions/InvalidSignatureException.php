<?php

namespace App\Exceptions;

use Exception;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class InvalidSignatureException
 *
 * @author Fuad Bayramli <fuadbayramli94@gmail.com>
 */
class InvalidSignatureException extends Exception
{
    /**
     * InvalidSignatureException constructor.
     */
    public function __construct()
    {
        parent::__construct(__('http.invalid_signature'), Response::HTTP_FORBIDDEN);
    }
}
