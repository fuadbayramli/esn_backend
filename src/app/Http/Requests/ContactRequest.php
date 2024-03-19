<?php

namespace App\Http\Requests;

/**
 * Class ContactRequest
 *
 * @author Mahammad Mammadov <muhammed.mammadov.89@gmail.com>
 */
class ContactRequest extends ApiFormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules():array
    {
        return [
         'name'=>'required|between:2,100|regex:/^[\pL\s]+$/u',
         'surname'=>'required||between:2,100|regex:/^[\pL\s]+$/u',
         'email'=>'required|email',
         'message'=>'required|between:5,2000',
        ];
    }
}
