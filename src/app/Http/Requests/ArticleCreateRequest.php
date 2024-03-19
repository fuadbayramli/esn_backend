<?php

namespace App\Http\Requests;

/**
 * Class ArticleCreateRequest
 *
 * @author Mahammad Mammadov <muhammed.mammadov.89@gmail.com>
 */
class ArticleCreateRequest extends ApiFormRequest
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
            'pdf_file' => 'required|mimes:pdf|max:10000',
            'description'=>'required|string',
        ];
    }
}
