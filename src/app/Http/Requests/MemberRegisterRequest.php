<?php

namespace App\Http\Requests;

use Carbon\Carbon;
use Illuminate\Validation\Rule;

/**
 * Class MemberRegisterRequest
 *
 * @author Mahammad Mammadov <muhammed.mammadov.89@gmail.com>
 */
class MemberRegisterRequest extends ApiFormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'username' => 'required|between:6,30|'.Rule::unique('members','username')->whereNull('deleted_at').'|alpha',
            'email' => 'required|email|'.Rule::unique('members','email')->whereNull('deleted_at'),
            'avatar' => 'required|mimes:jpg,jpeg,png,svg,webp,gif,bmp|max:5000',
            'first_name' => 'required|between:3,30|alpha',
            'last_name' => 'required|between:3,30|alpha',
            'nam_youth_email' => 'nullable|email|'.Rule::unique('members','nam_youth_email')->whereNull('deleted_at'),
            'date_of_birth' => 'required|date||before:' . Carbon::now()->subYears(13)->format('Y-m-d').'|after:'. Carbon::now()->subYears(100)->format('Y-m-d'),
            'nationality' => 'required|between:3,30|alpha',
            'phone_number' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:9|max:20',
            'gender_id' => 'required|in:0,1,2',
            'country' => 'required|integer|exists:countries,id',
            'postal_code' => 'string|max:10',
            'city' => 'required|between:3,30|regex:/^[\pL\s\-]+$/u',
            'national_chapter' => 'required|integer|exists:national_chapters,id',
            'fb' => 'nullable|string|between:7,191',
            'linkedin' => 'nullable|string|between:7,191',
            'tw' => 'nullable|string|between:7,191',
            'ins' => 'nullable|string|between:7,191',
            'password' => 'required|confirmed|min:8',
        ];
    }
}
