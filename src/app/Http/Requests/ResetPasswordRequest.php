<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Rule;

/**
 * Class ResetPasswordRequest
 *
 * @author Mahammad Mammadov <muhammed.mammadov.89@gmail.com>
 */
class ResetPasswordRequest extends ApiFormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:8|confirmed',
        ];
    }
}
