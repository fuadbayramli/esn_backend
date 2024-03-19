<?php

namespace App\Http\Resources\News;

use App\Http\Resources\ApiResourceCollection;
use Carbon\Carbon;
use Illuminate\Support\Collection;

/**
 * Class NewsResourceCollection
 *
 * @author Mahammad Mammadov <muhammed.mammadov.89@gmail.com>
 */
class NewsResourceCollection extends ApiResourceCollection
{
    /**
     * @inheritDoc
     */
    public function toArray($request): array
    {
        $this->additional(['message' => $this->message]);

        return [
            'news' => $this->collection,
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
