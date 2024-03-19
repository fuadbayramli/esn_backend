<?php

namespace App\Http\Requests;

/**
 * Class AllArticleRequest
 *
 * @author Fuad Bayramli <fuadbayramli94@gmail.com>
 */
class AllArticleRequest extends ApiFormRequest
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

