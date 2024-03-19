<?php

namespace App\Http\Requests;

/**
 * Class FileRequest
 *
 * @author Mahammad Mammadov <muhammed.mammadov.89@gmail.com>
 */
class FileRequest  extends ApiFormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules():array
    {
        return [
            'file' => 'required|mimes:jpg,jpeg,png,svg,webp,gif,bmp|max:5000',
        ];
    }
}
