<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Rule;

/**
 * Class MemberAuthRequest
 *
 * @author Mahammad Mammadov <muhammed.mammadov.89@gmail.com>
 */
class MemberAuthRequest extends ApiFormRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'email' => 'required|email',
            'password' => 'required|min:6',
        ];
    }
}
