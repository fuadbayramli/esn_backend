<?php

namespace App\Exports;

use App\Models\API\Member;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class MembersExport implements FromCollection, WithHeadings, WithMapping
{
    /**
    * @return Collection
    */
    public function collection()
    {
        return Member::with('roles')->get();
    }

    /**
     * @return string[]
     */
    public function headings(): array
    {
        return [
            'ID',
            'First Name',
            'Email',
            'Email Verified At',
            'Created At',
            'Username',
            'Nam Youth Email',
            'Last Name',
            'Date Of Birth',
            'Nationality',
            'Phone Number',
            'Gender',
            'Country',
            'Postal Code',
            'City',
            'Fb',
            'Linkedin',
            'Tw',
            'Ins',
            'National chapter',
            'Roles',
            'Status',
        ];
    }

    /**
     * @param mixed $member
     * @return array
     */
    public function map($member): array
    {
        return [
            $member->id,
            $member->first_name,
            $member->email,
            $member->email_verified_at,
            $member->created_at,
            $member->username,
            $member->nam_youth_email,
            $member->last_name,
            $member->date_of_birth,
            $member->nationality,
            $member->phone_number,
            ($member->gender_id == 1) ? 'Male' : 'Female',
            implode(', ', $member->country()->pluck('name')->toArray()),
            $member->postal_code,
            $member->city,
            $member->fb,
            $member->linkedin,
            $member->tw,
            $member->ins,
            implode(', ', $member->chapter()->pluck('name')->toArray()),
            implode(', ', $member->roles()->pluck('name')->toArray()),
            implode(', ', $member->status()->pluck('name')->toArray()),
        ];
    }


}
