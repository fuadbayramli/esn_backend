<?php

namespace App\Exceptions;

use App\Http\Traits\ApiResponser;
use Exception;
use Illuminate\Http\JsonResponse;

/**
 * Class InvalidPasswordJsonException
 *
 * @author Mahammad Mammadov <muhammed.mammadov.89@gmail.com>
 */
class InvalidPasswordJsonException extends Exception
{
    use ApiResponser;

    /**
     * Render the exception into an HTTP response.
     *
     * @return JsonResponse
     */
    public function render(): JsonResponse
    {
        return $this->errorResponse($this->message, [], $this->code);
    }
}
