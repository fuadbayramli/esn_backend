<?php

namespace App\Http\Requests;

use Carbon\Carbon;
use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Facades\Auth;

/**
 * Class MemberUpdateRequest
 *
 * @author Fuad Bayramli <fuadbayramli94@gmail.com>
 */
class MemberUpdateRequest extends ApiFormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'username' => 'sometimes|between:6,30|alpha|unique:members,username,'.Auth::user()->id,
            'email' => 'sometimes|email|unique:members,email,'.Auth::user()->id,
            'avatar' => 'sometimes|mimes:jpg,jpeg,png,svg,webp,gif,bmp|max:5000',
            'first_name' => 'sometimes|between:3,30|alpha',
            'last_name' => 'sometimes|between:3,30|alpha',
            'nam_youth_email' => 'email|unique:members',
            'date_of_birth' => 'sometimes|date||before:' . Carbon::now()->subYears(13)->format('Y-m-d').'|after:'. Carbon::now()->subYears(100)->format('Y-m-d'),
            'nationality' => 'sometimes|between:3,30|alpha',
            'phone_number' => 'sometimes|regex:/^([0-9\s\-\+\(\)]*)$/|min:9|max:20',
            'gender_id' => 'sometimes|in:0,1,2',
            'country' => 'sometimes|numeric|digits_between:1,300',
            'postal_code' => 'string|max:10',
            'city' => 'sometimes|between:3,30|alpha',
            'national_chapter' => 'sometimes|numeric|digits_between:1,200',
            'fb' => 'string|between:7,191',
            'linkedin' => 'string|between:7,191',
            'tw' => 'string|between:7,191',
            'ins' => 'string|between:7,191',
            'password' => 'nullable|required_with:old_password|confirmed|min:8',
            'old_password' => 'required_with:password',
        ];
    }
}
