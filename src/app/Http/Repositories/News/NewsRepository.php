<?php

namespace App\Http\Repositories\News;

use App\Http\Repositories\BaseRepository;
use App\Http\Repositories\RepositoryInterface;
use App\Models\News;

/**
 * Class News Repository
 *
 * @author Mahammad Mammadov <muhammed.mammadov.89@gmail.com>
 */
class NewsRepository extends BaseRepository
{
    /**
     * NewsRepository Constructor
     *
     * @param  News  $model
     */
    public function __construct(News $model)
    {
        parent::__construct($model);
    }

    /**
     * Get all News by filter
     *
     * @param  array  $params
     * @return mixed
     */
    public function all(array $params = []): mixed
    {
        $limit = $params['limit'] ?? RepositoryInterface::ALL_METHOD_LIMIT;
        $collection = $this->model::with(['likes', 'dislikes'])
            ->withCount([
                'likes' => function ($query) {
                        $query->where('active', 1);
                    }, 'dislikes' => function ($query) {
                        $query->where('active', 1);
                    }
            ])->orderBy('created_at', "DESC");

        if (array_key_exists('title', $params)) {
            $collection = $collection->where('title', 'LIKE', "%{$params['title']}%");
        }

        if (array_key_exists('year', $params)) {
            $collection = $collection->whereYear('created_at', '=', $params['year']);
        }

        if (array_key_exists('month', $params)) {
            $collection = $collection->whereMonth('created_at', '=', $params['month']);
        }

        if (array_key_exists('day', $params)) {
            $collection = $collection->whereDay('created_at', '=', $params['day']);
        }

        if (array_key_exists('main', $params)) {
            $collection = $collection->where('main', 1)->paginate($limit);
        } else {
            $collection = $collection->where('status', 1)->paginate($limit);
        }

        if (!$collection) {
            return null;
        }

        return $collection;
    }

    /**
     * Find news by ID
     *
     * @param int $id
     * @return mixed|null
     */
    public function findById(int $id): mixed
    {
        $news = $this->model->where('id', '=', $id)->first();

        if (!$news) {
            return null;
        }

        return $news;
    }
}
