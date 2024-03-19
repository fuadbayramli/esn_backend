<?php

namespace App\Http\Requests;

use App\Http\Repositories\RepositoryInterface;

/**
 * Class AllNewsRequest
 *
 * @author Mahammad Mammadov <muhammed.mammadov.89@gmail.com>
 */
class AllNewsRequest extends ApiFormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules():array
    {
        return [
            'title'=>'regex:/^[\pL\s\-]+$/u',
            'year' => 'numeric',
            'month' => 'numeric',
            'day' => 'numeric',
            'main' =>'numeric',
            'limit' => 'nullable|integer|max:' . RepositoryInterface::ALL_METHOD_LIMIT
        ];
    }
}
