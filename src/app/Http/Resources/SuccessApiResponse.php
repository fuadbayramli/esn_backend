<?php

namespace App\Http\Resources;

use Illuminate\Contracts\Support\Arrayable;

/**
 * Class SuccessApiResponse
 *
 * @author Mahammad Mammadov <muhammed.mammadov.89@gmail.com>
 */
class SuccessApiResponse extends ApiResponse implements Arrayable
{
    /**
     * @return array $response
     */
    public function toArray(): array
    {
        return [
            'message' => $this->message,
            'data' => $this->data
        ];
    }
}
