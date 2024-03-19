<?php

namespace App\Http\Requests;

use App\Http\Resources\ErrorApiResponse;
use Illuminate\Contracts\Validation\Rule;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Validation\ValidationException;
use Symfony\Component\HttpFoundation\Response;

/**
 * Abstract Class ApiFormRequest
 *
 * @author Mahammad Mammadov <muhammed.mammadov.89@gmail.com>
 */
abstract class ApiFormRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, Rule|array|string>
     */
    public function rules(): array
    {
        return [
            //
        ];
    }

    /**
     * Handle a failed validation attempt.
     *
     * @param Validator $validator
     * @return void
     */
    protected function failedValidation(Validator $validator): void
    {
        $errors = (new ValidationException($validator))->errors();
        $response = new ErrorApiResponse(__('messages.entered_information_incorrect'), $errors);

        throw new HttpResponseException(
            response()->json($response, Response::HTTP_UNPROCESSABLE_ENTITY)
        );
    }
}
