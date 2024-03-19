<?php

namespace App\Http\Repositories\News;

use App\Http\Repositories\BaseRepository;
use App\Models\API\NewsDislike;

/**
 * Class NewsDislikeRepository
 *
 * @author Fuad Bayramli <fuadbayramli94@gmail.com>
 */
class NewsDislikeRepository extends BaseRepository
{
    /**
     * NewsDislikeRepository Constructor
     *
     * @param  NewsDislike  $model
     */
    public function __construct(NewsDislike $model)
    {
        parent::__construct($model);
    }

    /**
     * Find news dislike by params
     *
     * @param  array  $params
     * @return mixed|null
     */
    public function findByParams(array $params = []): mixed
    {
        $newsDislike = $this->model::orderBy('created_at', "DESC");

        $newsDislike = $newsDislike->where($params)->first();

        if (!$newsDislike) {
            return null;
        }

        return $newsDislike;
    }
}
