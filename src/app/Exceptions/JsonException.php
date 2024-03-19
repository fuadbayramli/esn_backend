<?php

namespace App\Exceptions;

use App\Http\Traits\ApiResponser;
use Exception;
use Illuminate\Http\JsonResponse;

/**
 * Class JsonException
 *
 * @author Mahammad Mammadov <muhammed.mammadov.89@gmail.com>
 */
class JsonException extends Exception
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
