<?php

namespace App\Http\Requests;


use App\Http\Repositories\RepositoryInterface;

class AllMemberRequest extends ApiFormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules():array
    {
        return [
            'first_name' => 'between:2,30|alpha',
            'last_name' => 'between:2,30|alpha',
            'national_chapter_id' => 'integer',
            'role_id' =>'integer',
            'limit' => 'nullable|integer|max:' . RepositoryInterface::ALL_METHOD_LIMIT
        ];
    }
}
