<?php

namespace App\Http\Requests;

/**
 * Class AllProjectRequest
 *
 * @author Mahammad Mammadov <muhammed.mammadov.89@gmail.com>
 */
class AllProjectRequest extends ApiFormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules():array
    {
        return [
            'title' => 'regex:/^[a-zA-Z0-9 ]+$/',
        ];
    }
}

