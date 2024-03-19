<?php

namespace App\Exports;

use App\Models\API\Subscriber;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class SubscribersExport implements FromCollection, WithHeadings, WithMapping
{
    /**
    * @return Collection
    */
    public function collection()
    {
        return Subscriber::get();
    }

    /**
     * @return string[]
     */
    public function headings(): array
    {
        return [
            'ID',
            'Email',
        ];
    }

    /**
     * @param mixed $subscriber
     * @return array
     */
    public function map($subscriber): array
    {
        return [
            $subscriber->id,
            $subscriber->email,
        ];
    }


}
