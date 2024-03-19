<?php

namespace App\Http\Repositories\Article;

use App\Http\Repositories\BaseRepository;
use App\Models\API\Article;
use Illuminate\Database\Eloquent\Collection;

/**
 * Class Article Repository
 *
 * @author Mahammad Mammadov <muhammed.mammadov.89@gmail.com>
 */
class ArticleRepository  extends BaseRepository
{
    /**
     * ArticleRepository Constructor
     *
     * @param Article $model
     */
    public function __construct(Article $model)
    {
        parent::__construct($model);
    }

    /**
     * Get article by id
     *
     * @param int $id
     * @return mixed
     */
    public function show(int $id): mixed
    {
        $collection = $this->model::with('member')->where('status_id',2)->findOrFail($id);

        if (!$collection) {
            return null;
        }

        return $collection;
    }

    /**
     * * Get all articles
     *
     * @param  array  $params
     * @return array|Collection|null
     */
    public function all(array $params = []): array|null|Collection
    {
        $collection = $this->model::with('member')->where('status_id',2)->orderBy('created_at', "DESC");

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
