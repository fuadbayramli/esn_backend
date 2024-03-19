<?php

namespace App\Http\Repositories\News;

use App\Http\Repositories\BaseRepository;
use App\Models\API\NewsLike;

/**
 * Class NewsLikeRepository
 *
 * @author Fuad Bayramli <fuadbayramli94@gmail.com>
 */
class NewsLikeRepository extends BaseRepository
{
    /**
     * NewsLikeRepository Constructor
     *
     * @param  NewsLike  $model
     */
    public function __construct(NewsLike $model)
    {
        parent::__construct($model);
    }

    /**
     * Find news like by params
     *
     * @param  array  $params
     * @return mixed|null
     */
    public function findByParams(array $params = []): mixed
    {
        $newsLike = $this->model::orderBy('created_at', "DESC");

        $newsLike = $newsLike->where($params)->first();

        if (!$newsLike) {
            return null;
        }

        return $newsLike;
    }
}
