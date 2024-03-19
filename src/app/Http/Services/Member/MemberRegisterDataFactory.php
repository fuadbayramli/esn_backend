<?php

namespace App\Http\Services\Member;

use App\Http\Services\BaseDataFactory;

/**
 * Class MemberRegisterDataFactory
 *
 * @author Mahmmad Mammadov <<muhammed.mammadov.89@gmail.com>>
 */
class MemberRegisterDataFactory extends BaseDataFactory
{

    /**
     * @inheritDoc
     *
     * @return array
     */
    public function getData(): array
    {
        return [
            'first_name' => $this->data['first_name'],
            'last_name' => $this->data['last_name'],
            'nationality' => $this->data['nationality'],
            'nam_youth_email' => $this->data['nam_youth_email'] ?? null,
            'date_of_birth' => $this->data['date_of_birth'],
            'fb' => $this->data['fb'] ?? null,
            'linkedin' => $this->data['linkedin'] ?? null,
            'tw' => $this->data['tw'] ?? null,
            'ins' => $this->data['ins'] ?? null,
            'phone_number' => $this->data['phone_number'],
            'gender_id' => $this->data['gender_id'],
            'country' => $this->data['country'],
            'postal_code' => $this->data['postal_code'],
            'national_chapter' => $this->data['national_chapter'],
            'city' => $this->data['city'],
            'username' => $this->data['username'],
            'avatar' => $this->data['avatar'] ?? null,
            'email' => $this->data['email'],
            'status_id' => $this->data['status_id'],
            'password' => password_hash($this->data['password'], PASSWORD_BCRYPT)
        ];
    }
}
