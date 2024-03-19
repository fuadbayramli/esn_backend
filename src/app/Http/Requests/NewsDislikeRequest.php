<?php

namespace App\Http\Requests;

/**
 * Class NewsDislikeRequest
 *
 * @author Fuad Bayramli <fuadbayramli94@gmail.com>
 */
class NewsDislikeRequest extends ApiFormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules():array
    {
        return [
            'news_id' => 'required|integer'
        ];
    }
}
