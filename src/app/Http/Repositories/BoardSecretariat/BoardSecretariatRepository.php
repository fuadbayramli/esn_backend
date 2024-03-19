<?php

namespace App\Http\Repositories\BoardSecretariat;

use App\Http\Repositories\BaseRepository;
use App\Models\BoardSecretariat;

/**
 * Class BoardSecretariatRepository
 *
 * @author Mahammad Mammadov <muhammed.mammadov.89@gmail.com>
 */
class BoardSecretariatRepository extends BaseRepository
{
    /**
     * BoardSecretariatRepository Constructor
     *
     * @param BoardSecretariat $model
     */
    public function __construct(BoardSecretariat $model)
    {
        parent::__construct($model);
    }

    /**
     * * Get all BoardSecretariats by filter
     *
     * @param  array  $params
     * @return mixed
     */
    public function all(array $params = []): mixed
    {
        $collection = $this->model::with('country')->orderBy('created_at', "DESC");

        if (array_key_exists('country_id', $params)) {
            $collection = $collection->where('country_id', $params['country_id']);
        }

        if (array_key_exists('type', $params)) {
            $collection = $collection->where('type', $params['type']);
        }

        if (array_key_exists('main', $params)) {
            $collection = $collection->where('main', $params['main']);
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
