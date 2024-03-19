<?php

namespace App\Http\Resources;

use Illuminate\Contracts\Support\Arrayable;

/**
 * Class ErrorApiResponse
 *
 * @author Mahammad Mammadov <muhammed.mammadov.89@gmail.com>
 */
class ErrorApiResponse extends ApiResponse implements Arrayable
{
    /**
     * @return array $response
     */
    public function toArray(): array
    {
        return [
            'error' => $this->message,
            'data' => $this->data,
        ];
    }
}
