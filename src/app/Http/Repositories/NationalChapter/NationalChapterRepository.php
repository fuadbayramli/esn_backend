<?php

namespace App\Http\Repositories\NationalChapter;

use App\Http\Repositories\BaseRepository;
use App\Models\NationalChapter;

/**
 * Class NationalChapterRepository Repository
 *
 * @author Mahammad Mammadov <muhammed.mammadov.89@gmail.com>
 */
class NationalChapterRepository extends BaseRepository
{
    /**
     * NationalChapterRepository Constructor
     *
     * @param NationalChapter $model
     */
    public function __construct(NationalChapter $model)
    {
        parent::__construct($model);
    }

    /**
     * * Get all national chapters by filter
     *
     * @param  array  $params
     * @return mixed
     */
    public function all(array $params = []): mixed
    {
        $collection = $this->model::orderBy('name', "ASC");

        if (array_key_exists('name', $params)) {
            $collection = $collection->where('name', 'LIKE', "%{$params['name']}%");
        }

        $collection = $collection->get();

        if (!$collection) {
            return null;
        }

        return $collection;
    }

}
