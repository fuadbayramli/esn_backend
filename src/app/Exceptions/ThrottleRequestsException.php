<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Throwable;

/***
 * Class ThrottleRequestsException
 *
 * @author Mahammad Mammadov <muhammed.mammadov.89@gmail.com>
 */
class ThrottleRequestsException extends Exception
{
    public function __construct()
    {
        parent::__construct(__('passwords.throttled'), Response::HTTP_TOO_MANY_REQUESTS);
    }

}
