<?php

namespace App\Http\Requests;

/**
 * Class BlogCreateRequest
 *
 * @author Mahammad Mammadov <muhammed.mammadov.89@gmail.com>
 */
class BlogCreateRequest extends ApiFormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules():array
    {
        return [
            'title'=>'required|string',
            'cover_image' => 'required|mimes:jpg,jpeg,png,svg,webp,gif,bmp|max:5000',
            'description'=>'required|string',
        ];
    }
}
