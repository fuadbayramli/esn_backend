<?php

namespace App\Http\Repositories\Project;

use App\Http\Repositories\BaseRepository;
use App\Models\Project;

/**
 * Class ProjectRepository
 *
 * @author Mahammad Mammadov <muhammed.mammadov.89@gmail.com>
 */
class ProjectRepository extends BaseRepository
{
    /**
     * ProjectRepository Constructor
     *
     * @param Project $model
     */
    public function __construct(Project $model)
    {
        parent::__construct($model);
    }

    /**
     * * Get all projects by filter
     *
     * @param  array  $params
     * @return mixed
     */
    public function all(array $params = []): mixed
    {
        $collection = $this->model::orderBy('created_at', "DESC");

        if (array_key_exists('title', $params)) {
            $collection = $collection->where('title', 'LIKE', "%{$params['title']}%");
        }

        $collection = $collection->get();

        if (!$collection) {
            return null;
        }

        return $collection;
    }
}
