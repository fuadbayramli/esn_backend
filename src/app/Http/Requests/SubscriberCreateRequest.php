<?php

namespace App\Http\Requests;

/**
 * Class SubscriberCreateRequest
 *
 * @author Fuad Bayramli <fuadbayramli94@gmail.com>
 */
class SubscriberCreateRequest extends ApiFormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        return [
            'email' => 'required|email',
        ];
    }
}
