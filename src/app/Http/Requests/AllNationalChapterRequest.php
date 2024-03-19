<?php

namespace App\Http\Requests;

/**
 * Class AllNationalChapterRequest
 *
 * @author Fuad Bayramli <fuadbayramli94@gmail.com>
 */
class AllNationalChapterRequest extends ApiFormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules():array
    {
        return [
            'name'=>'regex:/^[\pL\s\-]+$/u',
        ];
    }
}
