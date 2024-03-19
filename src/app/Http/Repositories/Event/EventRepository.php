<?php

namespace App\Http\Repositories\Event;

use App\Http\Repositories\BaseRepository;
use App\Models\Event;
use Illuminate\Database\Eloquent\Collection;

/**
 * Class EventRepository
 *
 * @author Mahammad Mammadov <muhammed.mammadov.89@gmail.com>
 */
class EventRepository extends BaseRepository
{
    /**
     * EventRepository Constructor
     *
     * @param Event $model
     */
    public function __construct(Event $model)
    {
        parent::__construct($model);
    }

    /**
     * * Get all events
     *
     * @param  array  $params
     * @return array|Collection|null
     */
    public function all(array $params = []): array|null|Collection
    {
        $collection = $this->model::with('category')->where('status',1)->get();

        if (!$collection) {
            return null;
        }

        return $collection;
    }
}
