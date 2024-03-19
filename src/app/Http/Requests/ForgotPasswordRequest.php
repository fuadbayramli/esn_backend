<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Rule;


/**
 * Class ForgotPasswordRequest
 *
 * @author Mahammad Mammadov <muhammed.mammadov.89@gmail.com>
 */
class ForgotPasswordRequest extends ApiFormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'email' => 'required|email'
        ];
    }
}
