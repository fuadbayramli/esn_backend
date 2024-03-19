<?php

namespace App\Http\Repositories\Timeline;

use App\Http\Repositories\BaseRepository;
use App\Models\Timeline;
use Illuminate\Database\Eloquent\Collection;

/**
 * Class TimelineRepository
 *
 * @author Mahammad Mammadov <muhammed.mammadov.89@gmail.com>
 */
class TimelineRepository extends BaseRepository
{
    /**
     * TimelineRepository Constructor
     *
     * @param Timeline $model
     */
    public function __construct(Timeline $model)
    {
        parent::__construct($model);
    }

    /**
     * * Get all testimonials
     *
     * @param  array  $params
     * @return array|Collection|null
     */
    public function all(array $params = []): array|null|Collection
    {
        $collection = $this->model::where('status',1)->orderBy('date', "DESC")->get();

        if (!$collection) {
            return null;
        }

        return $collection;
    }
}
