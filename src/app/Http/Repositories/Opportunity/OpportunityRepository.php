<?php

namespace App\Http\Repositories\Opportunity;

use App\Http\Repositories\BaseRepository;
use App\Models\Opportunity;

/**
 * Class OpportunityRepository
 *
 * @author Mahammad Mammadov <muhammed.mammadov.89@gmail.com>
 */
class OpportunityRepository extends BaseRepository
{
    /**
     * OpportunityRepository Constructor
     *
     * @param Opportunity $model
     */
    public function __construct(Opportunity $model)
    {
        parent::__construct($model);
    }

    /**
     * * Get all opportunities by filter
     *
     * @param  array  $params
     * @return mixed
     */
    public function all(array $params = []): mixed
    {
        $collection = $this->model::with('country')->orderBy('created_at', "DESC");

        if (array_key_exists('category_id', $params)) {
            $collection = $collection->where('category_id', $params['category_id']);
        }

        if (array_key_exists('country_id', $params)) {
            $collection = $collection->where('country_id', $params['country_id']);
        }

        if (array_key_exists('title', $params)) {
            $collection = $collection->where('title', 'LIKE', "%{$params['title']}%");
        }

        $collection = $collection->where('status',1)->get();

        if (!$collection) {
            return null;
        }

        return $collection;
    }
}
