<?php

namespace App\Exceptions;

use App\Http\Traits\ApiResponser;
use Exception;
use Illuminate\Http\JsonResponse;

/**
 * Class AlreadyDislikedTrueJsonException
 *
 * @author Fuad Bayramli <fuadbayramli94@gmail.com>
 */
class AlreadyDislikedTrueJsonException extends Exception
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
