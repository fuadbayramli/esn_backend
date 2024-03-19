<?php

namespace App\Http\Resources\Member;

use App\Http\Resources\ApiResourceCollection;

/**
 * Class MemberResourceCollection
 *
 * @author Mahammad Mammadov <muhammed.mammadov.89@gmail.com>
 */
class MemberResourceCollection extends ApiResourceCollection
{
    /**
     * @inheritDoc
     */
    public function toArray($request): array
    {
        $this->additional(['message' => $this->message]);

        return [
            'member' => $this->collection,
            'pagination' => [
                'total' => $this->total(),
                'count' => $this->count(),
                'per_page' => $this->perPage(),
                'current_page' => $this->currentPage(),
                'total_pages' => $this->lastPage()
            ],
        ];
    }
}
