<?php

namespace App\Http\Requests;

/**
 * Class AllOpportunityRequest
 *
 * @author Mahammad Mammadov <muhammed.mammadov.89@gmail.com>
 */
class AllOpportunityRequest extends ApiFormRequest
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
            'country_id' =>'integer',
            'category_id' =>'integer',
        ];
    }
}

